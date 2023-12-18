import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'compusistel-azul': '#003DA6'
            },
            borderRadius: {
                'xxl' : '0.8rem',
                'uxl' : '2rem',
            },
            fontWeight: {
                estadistica: '1000',
            },
            scale: {
                '110': '1,10',
            }
        },
    },

    plugins: [forms, typography],
};
