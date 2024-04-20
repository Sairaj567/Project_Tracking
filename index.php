<?php
//error: Google Maps JavaScript API error: ApiNotActivatedMapError
//solution: click "APIs and services" Link
//			click "Enable APIs and services" button
//			Select "Maps JavaScript API" then click on enable

require 'config.php';

$sql = "SELECT * FROM tbl_gps WHERE 1";
$result = $db->query($sql);
if (!$result) {
  { echo "Error: " . $sql . "<br>" . $db->error; }
}

$rows = $result -> fetch_all(MYSQLI_ASSOC);

//print_r($row);

//header('Content-Type: application/json');
//echo json_encode($rows);


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map with Markers</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        #map-layer {
            height: 400px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Map with Markers</h1>
    </header>
    <div class="container">
        <div id="map-layer"></div>
    </div>
    <footer style="text-align: center; margin-top: 20px;">
        Powered by Google Maps API
    </footer>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhh7J6GBtinephlq5jJgKD2MN_ifj2e0k&callback=initMap" async defer></script>
    <script>
        var map;
        function initMap() {
            var mapLayer = document.getElementById("map-layer");
            var centerCoordinates = new google.maps.LatLng(-33.890541, 151.274857);
            var defaultOptions = { center: centerCoordinates, zoom: 10 }
            map = new google.maps.Map(mapLayer, defaultOptions);

            <?php foreach($rows as $location){ ?>
                var location = new google.maps.LatLng(<?php echo $location['lat']; ?>, <?php echo $location['lng']; ?>);
                var marker = new google.maps.Marker({
                    position: location,
                    map: map
                });
            <?php } ?>
        }
    </script>
</body>
</html>
