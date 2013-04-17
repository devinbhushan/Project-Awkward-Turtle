<?php
  include("../validate.php");
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/basic.css" />
<title>Home Page</title>


</head>

<body>
<div class="bigdiv">
<script type="text/javascript" src="jQuery/jquery-1.7.1.js"></script>

<?php
  include("navbar.php");

  //find first name for side bar
  $con = mysql_connect("localhost", "awkwardt", "Gx61JXuJpaU@");
  if (!$con)
      die('Could not connect: ' . mysql_error());

  mysql_select_db("awkwardt_schema", $con);
  $cookie = $_COOKIE["user"];
  $tok = strtok($cookie, "/");
  $sql = "SELECT fname FROM USERS WHERE email = '$tok'";
  $fname = "NoNameEntered";
  $initQuery = mysql_query($sql);
  if ($initQuery)
  {
    $fetched = mysql_fetch_row($initQuery);
    $first = $fetched[0];
  }
  mysql_close($con);
?>

<div class="secondary">
<img class="logo" src="Images/Turtle.gif"></img>
<ul class="nav nav-list">
  <li class="nav-header">
    <?php echo $first;?>'s Home Page
  </li>
  <li class="active">
    <a href="HomePage.php"><i class="icon-home icon-white"></i>Home</a>
  </li>
  <li>
    <a href="Profiles.php"><img class="otherpics" src="img/otherpics_black/user_black.png"></img>User's Profile</a>
  </li>
  <!--<li>
    <a href='Subpages/Eventspages/Myevents.html'><img class="otherpics" src="img/otherpics_black/calendar_black.png"></img>User's Events</a>
  </li>-->
  <li>
    <a href='Subpages/Profilespages/Matches.php'><img class="otherpics" src="img/otherpics_black/user_add_black.png"></img>Matches</a>
  </li>
  <li>
    <a href='Subpages/Locationspages/Checkin.php'><img class="otherpics" src="img/otherpics_black/map_marker_black.png"></img>Check-in</a>
  </li>
  <li>
    <a href='Subpages/Locationspages/geoIP.php'><img class="otherpics" src="img/otherpics_black/compass_black.png"></img>Browse Locations</a>
  </li>
  <li>
    <a href='Subpages/chatroom/index.php'><img class="otherpics" src="/FrontEnd/img/otherpics_black/chat_black.png"></img>Chat Rooms</a>
  </li>
</ul>
</div>
<style>
  #homeText {
    padding:15px 15px;
    border-radius:15px;
    background:#FFF8DC;
    margin-bottom:100px;
  }
  #minorPad{
    padding-top:20px;
  }
  #homeHolder {

  }
  #homeHolder #heading {
    padding-top:80px;
    text-align:center;
    margin-bottom:-30px;
  }
</style>

  <div id="homeHolder">
    <h1 id="heading"> Where do you go from here? </h1>
    <div class="signup" id="homeText">
    	<h2 id="minorPad">Check in somewhere, via the check-in tab to the left</h2>
    	<p id="minorPad">Once you check-in, you will be able to see if there are people there whom you may be interested in meeting. If you are, there's a link next to their picture through which you can easily contact them!</p>
      <h2 id="minorPad">Not big on emailing people?</h2>
      <p id="minorPad">That's alright, check out the Chat Room feature on the left. Feel free to talk to a group of people at popular campus locations- study group? Party? Event? No problem, this is perfect for mass communication!</p>
    	<h2 id="minorPad">Not sure where you want to go?</h2>
    	<p id="minorPad">Through the 'Browse Locations' tab on the left, you'll find a list of locations that are close to you.</p>
    	<h2 id="minorPad">Regretting part of what you put in when you signed up and want to change it?</h2>
    	<p id="minorPad">Not a problem, click the link to your profile on the left and edit anything you would like to change!</p>
    	<h2 id="minorPad">On the go often?</h2>
    	<p id="minorPad">Awkward Turtle for Android provides all of these functionalities when you're out and about, search for us on Google Play!</p>
      <h2 id="minorPad">Finally, keep us informed!</h2>
      <p id="minorPad">If you have any feedback for us we would love to hear from you! Send us an email using the Contact Us feature on your Nav Bar.</p>
    </div>
  </div>
</body>
</html>