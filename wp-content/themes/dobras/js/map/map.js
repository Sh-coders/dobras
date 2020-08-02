/*добавляем карту*/
jQuery(document).ready(function () {
    let map = new L.map( 'map');
    // Creating a Layer object
    let layer = new L.TileLayer( 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png' );
    // Adding layer to the map
    map.addLayer( layer );
    // Creating a marker
    let marker = L.marker( [ 48.9249306, 24.7108016 ] );

    // Adding marker to the map
    marker.addTo( map );
    function mapCenter(){
        const width = jQuery( window ).width();
        let center = [ 48.9249306, 24.7128116 ];
        let zoom = 18;
        if( width < 890 && width > 485 ){
            center = [ 48.9249306, 24.7109081 ];
        } else if( width <= 485 ) {
            zoom = 17;
            center = [ 48.9249306, 24.7108081 ];
        }

        map.setView( center, zoom );
    }

    jQuery( window ).on( 'load resize', mapCenter );
});