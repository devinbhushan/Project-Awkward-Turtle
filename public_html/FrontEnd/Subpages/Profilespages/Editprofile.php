<?php
  include("../../../validate.php");
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../../css/basic.css" />
<title>Edit Profile</title>
</head>

<body>
<div class="bigdiv">

<div class="navbar navbar-fixed-top">
  	<div class="navbar-inner">
   	 	<div class="container">
   	 		<a class="brand" href="/FrontEnd/HomePage.html">
  				Awkward Turtle
			  </a>
      		<ul class="nav">
  	 			<li>
       				<a href="../../HomePage.html" class="">Home</a>
      			</li>
      			<li>
      				<a href="../../Locations.html" class="">Locations</a>
      			</li>
      			<li>
  	  				<a href="../../Events.html" class="">Events</a>
  	  			</li>
      			<li class="active">
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
    Profiles Navigation
  </li>
  <li>
    <a href="../../Profiles.html"><img class="otherpics" src="../../img/otherpics_black/user_black.png"></i>Your Profile</a>
  </li>
  <li class="active">
    <a href='Editprofile.html'><img class="otherpics" src="../../img/otherpics_white/settings_white.png"></img>Edit it</a>
  </li>
  <li class="nav-header">
    Notifications
  </li>
  <li>
    <a href='Matches.html'><img class="otherpics" src="../../img/otherpics_black/user_add_black.png"></img>Matches</a>
  </li>
  <li>
    <a href='Messages.html'><img class="otherpics" src="../../img/otherpics_black/chat_black.png"></img>Messages</a>
  </li>
</ul>
</div>

</div>
</body>
</html>
