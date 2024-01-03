<x-app-layout>
    <div class="py-8">
        <input id="autocomplete" style="width: 100%" placeholder="Ingresa un lugar" type="text">
        <input id="lat" type="text" readonly>
        <input id="lng" type="text" readonly>
        <input id="direccion" type="text" readonly>
        <div id="map" style="height: 300px; width: 100%;"></div>
        <script>
            let autocomplete;
            let map;
            function initMap(){
                autocomplete = new google.maps.places.Autocomplete(
                    document.getElementById('autocomplete'),
                    {
                        componentRestrictions: {'country': ['PE']},
                    }
                )

                map = new google.maps.Map(document.getElementById('map'), {
                    center: { lat: -12.0464, lng: -77.0428 },
                    zoom: 12,
                });

                autocomplete.addListener('place_changed', function() {
                    const place = autocomplete.getPlace();
                    console.log(place);

                    if (!place.geometry) {
                        console.log("No se encontraron detalles del lugar:", place);
                        return;
                    }

                    const latitude = place.geometry.location.lat();
                    const longitude = place.geometry.location.lng();
                    const direccion = place.formatted_address;

                    map.setCenter({ lat: latitude, lng: longitude });

                    new google.maps.Marker({
                        position: { lat: latitude, lng: longitude },
                        map: map,
                        title: place.name,
                    });

                    console.log("Latitud:", latitude);
                    console.log("Longitud:", longitude);
                    console.log("Direccion:", direccion);

                    document.getElementById('lat').value = latitude;
                    document.getElementById('lng').value = longitude;
                    document.getElementById('direccion').value = direccion;
                });
            }

            document.addEventListener('click', function (event) {
                const targetElement = event.target;

                if (!targetElement.matches('#autocomplete')) {

                    if (autocomplete && !autocomplete.getPlace().geometry) {
                        console.log("No se ha seleccionado un lugar válido");
                    }
                }
            });

        </script>
        <script async
        src="https://maps.googleapis.com/maps/api/js?key=&libraries=places&callback=initMap">
    </script>
    </div>
</x-app-layout>
