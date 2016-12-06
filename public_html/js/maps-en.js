function initMap(lat, lng) {
  // Google map stuff
  var map;
  var markers = {};
  var infoWindow = new google.maps.InfoWindow();
  var servcorpMainUrl = 'http://www.servcorp.co.jp';
  var lang = '/en'

  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: lat, lng: lng},
    zoom: 7
  });

  // gives the regions inside the obj tokyo, osaka, etc...
  var regions = Object.getOwnPropertyNames(locInfo);

  // start plotting markers, loop through regions
  $(regions).each(function(p, region){
      var regionArr = locInfo[region];
      markers[region] = markers[region] || [];

      for(var i = 0; i < regionArr.length; i++){
        var location = regionArr[i];
        var myLatLng = { lat: Number(location.Latitude), lng: Number(location.Longitude) }
        var servcorpLogo = { 
          url: "http://virtualoffice.servcorp.co.jp/images/map-marker.png"
        }
        
        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          icon: servcorpLogo,
          
        });

        var mouseOverListenerFn = markerMouseOverFunction(i, region, myLatLng, location);
        marker.addListener('mouseover', mouseOverListenerFn);
        map.addListener('click', function(){
          infoWindow.close();
        });
        markers[region].push(myLatLng);
      }

      // Show Info window on location mouseover
      function markerMouseOverFunction(i, region, latlng, location) {
          return function() {
              /* Info Window */
            if(servcorpMainUrl + location.thumbnailUrl){
              var content = "<p class='map-popup'><img src='" + servcorpMainUrl + location.thumbnailUrl + 
                  "' alt='" + location.thumbnailAlias + "' width='70' /><span>" + 
                  location.address + "<br><a target='_blank' href='" + 
                  servcorpMainUrl + lang + '/virtual-offices/locations' + '/' + region + '/' + location.url + 
                  "'> " + location.name + " &raquo;</a></span></p>";

                infoWindow.setContent(content);                    
                infoWindow.setPosition(latlng);
                infoWindow.open(map);
            };
          }

      };

  });

  // Add marker latLng data to bounds
  function addPointsToBounds(bounds, points){
    for ( var p = 0; p < points.length; p++ ) {
        bounds.extend(new google.maps.LatLng(points[p].lat, points[p].lng));
    }      
  }

  // Show all of Japan
  function resetAllBounds(theMap){
    var latlngbounds = new google.maps.LatLngBounds( );
    $(regions).each(function(i, region){
      addPointsToBounds(latlngbounds, markers[region]);
    }); 
    theMap.fitBounds(latlngbounds);    
  }

  // Focus function for region
  function resetRegionBounds(theMap, region){
    var latlngbounds = new google.maps.LatLngBounds( );
    addPointsToBounds(latlngbounds, region); 
    theMap.fitBounds(latlngbounds); 
  }

  // Add click listeners for region buttons
  $('.map-button').click(function(){
    var regionName = $(this).data('region');
    resetRegionBounds(map, markers[regionName]);
  });

  // Show the whole map
  resetAllBounds(map);
}

function initialize() {
  // Ajax info from server
  $.getJSON('http://virtualoffice.servcorp.co.jp/assets/locations.json', function(data){
    // data to be used for general information gps, addresses, etc
    locInfo = data;
    // start google map with json data

    initMap(Number(locInfo.tokyo[0].Latitude), Number(locInfo.tokyo[0].Longitude));
  }); 
}

initialize();
 