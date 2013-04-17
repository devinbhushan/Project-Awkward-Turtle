<?php
include("../../../validate.php");
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../../css/basic.css" />
<script src="/FrontEnd/jQuery/jquery-1.7.1.js"></script>
<title>The Map</title>



</head>

<body>
<div class="bigdiv">

<div class="navbar navbar-fixed-top">
  	<div class="navbar-inner">
   	 	<div class="container">
   	 		<a class="brand" href="HomePage.html">
  				Awkward Turtle
			</a>
      		<ul class="nav">
  	 			<li>
       				<a href="../../HomePage.html" class="">Home</a>
      			</li>
      			<li class = "active">
      				<a href="../../Locations.html" class="">Locations</a>
      			</li>
  	  			<li>
  	  				<a href="../../Events.html" class="">Events</a>
  	  			</li>
  	  			<li>
  	  				<a href="../../Profiles.html" class="">Profile</a>
  	  			</li>
  	  			<form class="navbar-search pull-left">
  					<input type="text" class="search-query" placeholder="Search">
				</form>
    		</ul>
       	</div>
  	</div>
</div>


<div class="secondary">
<img class="logo" src="../../Images/Turtle.gif"></img>
<ul class="nav nav-list">
  <li class="nav-header">
    Locations Navigation
  </li>
  <li>
    <a href="../../Locations.html"><img class="otherpics" src="../../img/otherpics_black/direction_black.png"></img>Locations Home</a>
  </li>
  <li>
    <a href="Checkin.html"><img class="otherpics" src="../../img/otherpics_black/map_marker_black.png"></img>Check-in Somewhere</a>
  </li>
  <li class="nav-header">
     Search Locations
  </li>
  <li>
    <a href='Browselocations.html'><img class="otherpics" src="../../img/otherpics_black/search_black.png"></img>Browse Locations</a>
  </li>
  <li class="active">
    <a href='Map.html'><img class="otherpics" src="../../img/otherpics_white/compass_white.png"></img>See the Map</a>
  </li>
</ul>
</div>

<style>
  #placeFinder {
    padding-bottom:30px;
  }
</style>
<div id="placeFinder" class="signup">
  <script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"
    type="text/javascript"></script>

  <style type="text/css">
    body {
      font-family: sans-serif;
      font-size: 14px;
    }
    #map_canvas {
      height: 400px;
      width: 600px;
      margin-top: 0.6em;
      margin-left:30px;
      border-style: solid;
      border-radius: 5px;
      border-width: 7px;
      border-color: #8B5A00;
    }
    #search {
      width:100%;
      padding-left:200px;
      padding-bottom:20px;
      padding-top:20px;
    }
    #searchTextField {
      float:left;
      margin-left:-45px;
      border-radius: 8px;
      border: 1px solid black;
    }
    .radioSearch {
      padding-left:5px;
      float:left;
    }
    #check-in-button {
      margin-left:25px;
    }
    label {
      float:left;
    }
  </style>

  <script type="text/javascript">
    function initialize() {
      var mapOptions = {
        center: new google.maps.LatLng(40.110244,-88.227258),
        zoom: 13,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      };
      var map = new google.maps.Map(document.getElementById('map_canvas'),
        mapOptions);

      var input = document.getElementById('searchTextField');
      var autocomplete = new google.maps.places.Autocomplete(input);

      autocomplete.bindTo('bounds', map);

      var infowindow = new google.maps.InfoWindow();
      var marker = new google.maps.Marker({
        map: map
      });

      google.maps.event.addListener(autocomplete, 'place_changed', function() {
        infowindow.close();
        var place = autocomplete.getPlace();
        if (place.geometry.viewport) {
          map.fitBounds(place.geometry.viewport);
        } else {
          map.setCenter(place.geometry.location);
          map.setZoom(17);  // Why 17? Because I said so. Bitch.
        }

        var image = new google.maps.MarkerImage(
            place.icon,
            new google.maps.Size(71, 71),
            new google.maps.Point(0, 0),
            new google.maps.Point(17, 34),
            new google.maps.Size(35, 35));
        marker.setIcon(image);
        marker.setPosition(place.geometry.location);

        var address = '';
        if (place.address_components) {
          address = [(place.address_components[0] &&
                      place.address_components[0].short_name || ''),
                     (place.address_components[1] &&
                      place.address_components[1].short_name || ''),
                     (place.address_components[2] &&
                      place.address_components[2].short_name || '')
                    ].join(' ');
        }

        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
        infowindow.open(map, marker);
      });

      // Sets a listener on a radio button to change the filter type on Places
      // Autocomplete.
      /*function setupClickListener(id, types) {
        var radioButton = document.getElementById(id);
        google.maps.event.addDomListener(radioButton, 'click', function() {
          autocomplete.setTypes(types);
        });
      }

      setupClickListener('changetype-all', []);
      setupClickListener('changetype-establishment', ['establishment']);
      setupClickListener('changetype-geocode', ['geocode']);*/
    }
    google.maps.event.addDomListener(window, 'load', initialize);
  </script>
  <div id = "search">
  <form name="checkIn" method="POST" id="formCheckIn" action = "updateLocBrowser.php" > <!-- Fill in the action field -->
    <input name="currLoc" id="searchTextField" type="text" onchange="countDown = 10" size="50" />
    <input id="check-in-button" type="submit" disabled="disabled" value="Check In Here" />
    <!-- THIS IS TO DISABLE/ENABLE THE BUTTON-->
    <script>

      var countDown = 0;
      $(document).ready(function () {

        $("form").bind("keypress", function(e) {
          if (e.keyCode == 13) return false;
        });
        
        /*function searchTimer() {
          console.log("hey");
          if (countDown == 1)
          {
            console.log("hey" + $("searchTextField").val());
            $("#check-in-button").attr("disabled", "");
          }
          else
          {
            console.log("countdown is");
            console.log(countDown);
            if (countDown > 0)
            {
              console.log("hey im inside the countdown second if");
              countDown--;
            }
          }
        }*/
        window.setInterval(updateButton, 1000);
        function updateButton () {
          var searchField = $("#searchTextField");
          console.log(searchField.val());
          if(searchField.val().length > 0 && (searchField.val()).indexOf(", ") > 0)
          {
            $("#check-in-button").removeAttr("disabled");
          }
          else
            $("#check-in-button").attr("disabled", "disabled");

        }
      });
    </script>
  <!--  <input class="radioSearch" type="radio" name="type" id="changetype-all" checked="checked">
    <label for="changetype-all">All</label>

    <input class="radioSearch" type="radio" name="type" id="changetype-establishment">
    <label for="changetype-establishment">Establishments</label>

    <input class="radioSearch" type="radio" name="type" id="changetype-geocode">
    <label for="changetype-geocode">Geocodes</label>-->
  </form>
  </div>
      <div id="map_canvas"></div>
  </div>
  </body>
</html>
