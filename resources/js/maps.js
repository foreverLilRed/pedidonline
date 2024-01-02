let autocomplete;
let map;
function initMap(){
    autocomplete = new google.maps.places.Autocomplete(
        document.getElementById('autocomplete'),
        {
            types: ['address'],
            componentRestrictions: {'country': ['PE']},
        }
    )

    map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: -6.7713700, lng: -79.8408800 },
        zoom: 12,
    });

    map.setOptions({
        mapTypeControl: false
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
