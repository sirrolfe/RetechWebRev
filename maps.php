<?php
    session_start(); 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "testing_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $userid = $_SESSION['ID'];

    // SQL to get the sum of points for the logged in user
    $sql = "SELECT COALESCE(SUM(Points), 0) as TotalPoints FROM UserEWaste WHERE UserID=$userid";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $totalPoints = $row['TotalPoints'];

    $conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="donatestyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Recycle Centers and Electronic Stores</title>
</head>
<body>
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="dashboard.php">Home</a>
    <a href="services.php">Services</a>
    <a href="profile.php">Profile</a>
    <a href="aboutus.php">About Us</a>
    <a href="logout.php" class="logout">Logout</a> 
</div>

<div class="topnav">
    <div class="left">
        <a href="javascript:void(0);" class="icon" onclick="openNav()">
            <i class="fa fa-bars"></i>
        </a>
        <img src="img\screenshot--72--removebg-2-1@2x.png" class="logo" alt="Company Logo"> 
        <div class="company-name">ReTech</div>
        <div class="user-points">
        Points: <?php echo $totalPoints; ?>
        </div>
    </div>
</div>

<div id="myOverlay" class="overlay"></div>

<div class="donate-form">
    <h1>Nearby Recycling Centers and Electronic Stores</h1>
    <div id="map"></div>
    <ul id="places"></ul>
</div>

<script src="dashboard.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdkYRty6_7dLuKxa6dCH1j14DtGvBJCUY&libraries=places&callback=initMap" async defer></script>


<script>
if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(function(position) {
    var pos = {
      lat: position.coords.latitude,
      lng: position.coords.longitude
    };
    initMap(pos);
  });
}

function initMap(pos) {
  var map = new google.maps.Map(document.getElementById('map'), {
    center: pos,
    zoom: 15
  });

  var request = {
    location: pos,
    radius: '5000',
    type: ['store'],
    keyword: ['electronics', 'recycle']
  };

  var service = new google.maps.places.PlacesService(map);
  service.nearbySearch(request, callback);
}

function callback(results, status) {
  if (status == google.maps.places.PlacesServiceStatus.OK) {
    var placesList = document.getElementById('places');

    for (var i = 0; i < results.length; i++) {
      var place = results[i];
      var li = document.createElement('li');
      li.innerHTML = `
        <h3>${place.name}</h3>
        <p>${place.vicinity}</p>
        <div class="reviews">
          <!-- You can replace the stars and review content with your own data -->
          <div class="stars">⭐⭐⭐⭐⭐</div>
          <p>This is a placeholder review. Replace with real review content.</p>
        </div>
      `;
      placesList.appendChild(li);

      new google.maps.Marker({
        position: place.geometry.location,
        map: map,
        title: place.name
      });
    }
  }
}
</script>
</body>
</html>
