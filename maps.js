// Global map variable
var map;

// Checking if Geolocation is supported by the browser
if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(function(position) {
    var pos = {
      lat: position.coords.latitude,
      lng: position.coords.longitude
    };
    initMap(pos);
  }, function() {
    // handleLocationError function can handle errors here
  });
} else {
  // handleLocationError function can handle errors here if Browser doesn't support Geolocation
}

// Function to initialize the map
function initMap(pos) {
  map = new google.maps.Map(document.getElementById('map'), {
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

// Callback function to handle the result from PlacesService
function callback(results, status) {
  if (status === google.maps.places.PlacesServiceStatus.OK) {
    var placesList = document.getElementById('places');

    for (var i = 0; i < results.length; i++) {
      var place = results[i];
      var li = document.createElement('li');
      li.textContent = place.name + ' - ' + place.vicinity;
      placesList.appendChild(li);

      // Adding marker to the map for each place
      new google.maps.Marker({
        position: place.geometry.location,
        map: map,
        title: place.name
      });
    }
  }
}
