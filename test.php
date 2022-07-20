<!doctype HTML>
<html>
<head>
    <title>Geolocation</title>
    <style>
        #form {
            display: none;
        }
    </style>
</head>

<body>

<p>Click on the button to obtain GPS coordinates.</p>

<button onclick="getLocation()">Get coordinates</button>

<p id="display_coordinates"></p>

<div id="form">
    <form method="POST" action="">
        <input type="hidden" name="latitude" id="latitude" value="" />
        <input type="hidden" name="longitude" id="longitude" value="" />
        <br/>
        <button type="submit" name="submit">Update coordinates to DB</button>
    </form>
</div>

<script>
    var output_paragraph = document.getElementById("display_coordinates");

    var latitude_input = document.getElementById("latitude");
    var longitude_input = document.getElementById("longitude");

    var form_division = document.getElementById("form");

    function getLocation() {
        if (navigator.geolocation) {
            output_paragraph.innerHTML = "Obtaining location. Please wait";
            let coordinates_response;
            try {
                coordinates_response = navigator.geolocation.getCurrentPosition(showPosition);
                // console.log(coordinates_response);
                // alert(coordinates_response.latitude);
            } catch(error) {
                // alert("");
                output_paragraph.innerHTML = "You need to enable location services in your settings and allow your browser to make use of location services.";
            }

        } else {
            output_paragraph.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
        output_paragraph.innerHTML = "Latitude: " + position.coords.latitude + "<br/>Longitude: " + position.coords.longitude;
        latitude_input.value = position.coords.latitude;
        longitude_input.value = position.coords.longitude;

        form_division.style.display = 'block';
    }
</script>

</body>
</html>

<?php

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con, 'system_geolocation');

if(isset($_POST['submit'])){
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    $coordinates_insert = "INSERT INTO `coordinates` (`latitude`, `longitude`) VALUES ('$latitude','$longitude')";

    $rs = mysqli_query($con, $coordinates_insert); ?>

    <script>
        alert("Record successfully added. <?= $coordinates_insert ?>");
        location = 'index.php';
    </script>
<?php } ?>

