<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Colaborador;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Registrador extends Controller
{
    public function cliente(Request $request): RedirectResponse
    {
        $user = new User();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));

        $cliente = new Cliente();
        $cliente->domicilio = $request->input('domicilio');

        try {
            $user->saveOrFail();
            $cliente->user()->associate($user);
            $cliente->saveOrFail();

            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
     
                return redirect()->intended('inicio');
            }

            return back()->withErrors([
                'email' => 'Error en las credenciales',
            ])->onlyInput('email');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }

    }

    public function colaborador(Request $request): RedirectResponse
    {
        $user = new User();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));

        $colaborador = new Colaborador();

        try {
            $user->saveOrFail();
            $colaborador->user()->associate($user);
            $colaborador->saveOrFail();

            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
     
                return redirect()->intended('servicios');
            }

            return back()->withErrors([
                'email' => 'Error en las credenciales',
            ])->onlyInput('email');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }

    }

    public function servicios(){
        return view('servicios');
    }

    public function registro(Request $request, $id){

        $user = User::find($id);
        $colaborador = Colaborador::where('user_id','=',$user->id)->get();
        $colaboradores = $colaborador->first();

        $x = Colaborador::find($colaboradores->id);

        $x->servicios()->attach($request->input('servicios'));

        return redirect('/etiquetas');
    }

    public function etiquetas(){
        return view('etiquetas');
    }

    public function registro_etiquetas(Request $request, $id){
        $user = User::find($id);
        $colaborador = Colaborador::where('user_id','=',$user->id)->get();
        $colaboradores = $colaborador->first();

        $x = Colaborador::find($colaboradores->id);

        $x->etiquetas()->attach($request->input('etiquetas'));

        return redirect('/inicio');
    }
}
