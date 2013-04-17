<?php
include("../../../validate.php");
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../../css/basic.css" />
<script src="/FrontEnd/jQuery/jquery-1.7.1.js"></script>
<title>Check-In</title>

<style>
  #resultTable
  {
    background: cornsilk;
    border-radius: 15px;
/*    margin:auto;
    width: 50%;
    margin-top:30%;*/
  }
  h4 {
  }
  th
  {
    margin: auto;
    padding-right:5px;
  }
  #loc
  {
    height: 50px;
    text-align: center;
  }
  #count
  {
    height: 50px;
    text-align: center;
  }
</style>

</head>

<body>
<div class="bigdiv">

<?php
  include("locNavbar.php");
?>

<div class="secondary">
<img class="logo" src="../../Images/Turtle.gif"></img>
<ul class="nav nav-list">
  <li class="nav-header">
    Locations Navigation
  </li>
  <li class="active">
    <a id="checkSel" href="Checkin.php"><img class="otherpics" src="../../img/otherpics_black/map_marker_black.png"></img>Check-in Somewhere</a>
  </li>
  <li>
    <a id="browseSel" href='geoIP.php'><img class="otherpics" src="../../img/otherpics_black/search_black.png"></img>Browse Locations</a>
  </li>
  <!--<li>
    <a href='Map.html'><img class="otherpics" src="../../img/otherpics_white/compass_white.png"></img>See the Map</a>
  </li>-->
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
    #newHead {
      text-align:center;
    	padding-right:100px;
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
  <h3 id="newHead">Select an option from the drop-down list of results after you type a location</h3>
  <h5 id="newHead">Popular Locations are listed under the map</h5>
  <div id = "search">
    <!--<h3>Please be sure to select an option from the drop-down list of results after you start typing a location</h3>-->
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
    <?php
    $con = mysql_connect("localhost", "awkwardt", "Gx61JXuJpaU@");

    if (!$con)
      die('Could not connect: ' . mysql_error());

    mysql_select_db("awkwardt_schema", $con);

    if ($myQuery === false)
      die('Query failed, try refreshing the page please');

$result = mysql_query("SELECT * FROM Location ORDER BY Count DESC LIMIT 5");

?>
<div style="display:block">
<table id="resultTable">
  <tr>
    <th id="Type">
      Name of Location
    </th>
    <th id="Name">
      Number of People Checked-In
    </th>
  <tr>
  <br />
<?php
while($row = mysql_fetch_array($result))
  {
    echo "<tr>" . "<td id='loc'>" . $row['Name'] . "</td>" . "<td id= 'count'>" . $row['Count'] . "</td>" . "</tr>";
  }

    $initRes = mysql_fetch_assoc(mysql_query("SELECT * FROM Location ORDER BY Count DESC LIMIT 5"));

    //var_dump($initRes);

  ?>
</table>
  </div>
  </div>
</div>
  </div>
  </body>
</html>