<?php
include("../validate.php");
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/basic.css" />
<title>Locations Home</title>
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
       				<a href="HomePage.html" class="">Home</a>
      			</li>
      			<li class = "active">
      				<a href="Locations.html" class="">Locations</a>
      			</li>
  	  			<li>
  	  				<a href="Events.html" class="">Events</a>
  	  			</li>
  	  			<li>
  	  				<a href="Profiles.html" class="">Profile</a>
  	  			</li>
  	  			<form class="navbar-search pull-left">
  					<input type="text" class="search-query" placeholder="Search">
				</form>
    		</ul>
       	</div>
  	</div>
</div>



<div class="secondary">
<img class="logo" src="Images/Turtle.gif"></img>
<ul class="nav nav-list">
  <li class="nav-header">
    Locations Navigation
  </li>
  <li class="active">
    <a href="Locations.html">
      <img class="otherpics" src="img/otherpics_white/marker_white.png"></img>Locations Home</a>
  </li>
  <li>
    <a href="Subpages/Locationspages/Checkin.html"><img class="otherpics" src="img/otherpics_black/map_marker_black.png"></img>Check-in Somewhere</a>
  </li>
	<li class="nav-header">
	Search Locations
	</li>
  <li>
    <a href='Subpages/Locationspages/Browselocations.html'><img class="otherpics" src="img/otherpics_black/search_black.png"></img>Browse Locations</a>
  </li>
  <li>
    <a href='Subpages/Locationspages/Map.html'><img class="otherpics" src="img/otherpics_black/compass_black.png"></img>See the Map</a>
  </li>
</ul>
</div>

</div>
</body>
</html>
