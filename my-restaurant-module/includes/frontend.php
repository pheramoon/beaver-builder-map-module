<?php $apikey = $settings->my_api_key_field; ?>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=<?php echo $apikey; ?>&callback=initMap">
</script>

<h1 class="fl-my-heading"><?php echo $settings->my_map_heading_field;?></h1>

<script>
let map;

function initMap() {
    let j=0;
    var infowindow;
    map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: 42.30418434856217, lng: -83.02863931221528 }, //Windsor Ontario
        zoom: 14,
    });

    <?php
    for ( $i = 0; $i < count( $settings->item_locations ); $i++ ) :
        if ( empty( $settings->item_locations[$i] ) ) {
            continue;
        }
    ?>
        jQuery.getJSON('https://maps.googleapis.com/maps/api/geocode/json?address=<?php echo addslashes($settings->item_locations[$i]->address_location); ?>&key=<?php echo $apikey; ?>', function(data) {
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(data.results[0].geometry.location),
                map: map
            });
            <?php
            

            $current_address = htmlspecialchars($settings->item_locations[$i]->address_location, ENT_QUOTES);
            $current_info = str_replace("\n","</br>",str_replace("'"," ",str_replace("\""," ",$settings->item_locations[$i]->infowindow_location)));
            $contentString = "<h3>".$current_address."</h3>";
            $contentString .= "<p>".$current_info."</p>";
            ?>
            infowindow = new google.maps.InfoWindow();
            google.maps.event.addListener(marker, 'click', (function(marker, j) {
                return function() {
                    infowindow.setContent("<?=$contentString ?>");
                    infowindow.open(map, marker);
                }
			})(marker, j));
            j++;
        });
    <?php
    endfor; 
    ?>  
}
</script>

<hr>
<br>
<div id="map"></div>