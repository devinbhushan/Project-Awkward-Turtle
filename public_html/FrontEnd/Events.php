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
      			<li>
      				<a href="Locations.html" class="">Locations</a>
      			</li>
  	  			<li class="active">
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
    Events Navigation
  </li>
  <li class="active">
    <a href="Events.html"><i class="icon-book icon-white"></i>Events Home</a>
  </li>

  <li>
    <a href='Subpages/Eventspages/Browseevents.html'><img class="otherpics" src="img/otherpics_black/search_black.png"></img>Browse Events</a>
  </li>
  <li>
    <a href='Subpages/Eventspages/Pastevents.html'><img class="otherpics" src="img/otherpics_black/calendar_black.png"></img>Past Events</a>
  </li>
  <li class="nav-header">
    Manage Events
  </li>
  <li>
    <a href='Subpages/Eventspages/Makeevent.html'><img class="otherpics" src="img/otherpics_black/plus_black.png"></img>Make an Event Page</a>
  </li>
  <li>
    <a href="Subpages/Eventspages/Myevents.html"><img class="otherpics" src="img/otherpics_black/group_black.png"></img>My Events</a>
  </li>
</ul>
</div>

</div>
</body>
</html>
