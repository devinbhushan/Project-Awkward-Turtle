<html>
<head>
<link rel="stylesheet" type="text/css" href="/FrontEnd/css/basic.css" />
<title>Chat Rooms</title>


</head>

<body>
<div class="bigdiv">
<script type="text/javascript" src="jQuery/jquery-1.7.1.js"></script>

<?php
  include("chatNavbar.php");

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
<img class="logo" src="/FrontEnd/Images/Turtle.gif"></img>
<ul class="nav nav-list">
  <li class="nav-header">
    <?php echo $first;?>'s Home Page
  </li>
  <li>
    <a href="/FrontEnd/HomePage.php"><i class="icon-home icon-white"></i>Home</a>
  </li>
  <li>
    <a href="/Profiles.php"><img class="otherpics" src="/FrontEnd/img/otherpics_black/user_black.png"></img>User's Profile</a>
  </li>
  <!--<li>
    <a href='Subpages/Eventspages/Myevents.html'><img class="otherpics" src="img/otherpics_black/calendar_black.png"></img>User's Events</a>
  </li>-->
  <li>
    <a href='/FrontEnd/Subpages/Profilespages/Matches.php'><img class="otherpics" src="/FrontEnd/img/otherpics_black/user_add_black.png"></img>Matches</a>
  </li>
  <li>
    <a href='/FrontEnd/Subpages/Locationspages/Checkin.php'><img class="otherpics" src="/FrontEnd/img/otherpics_black/map_marker_black.png"></img>Check-in</a>
  </li>
  <li>
    <a href='/FrontEnd/Subpages/Locationspages/geoIP.php'><img class="otherpics" src="/FrontEnd/img/otherpics_black/compass_black.png"></img>Browse Locations</a>
  </li>
  <li class="active">
    <a href='/FrontEnd/Subpages/chatroom/index.php'><img class="otherpics" src="/FrontEnd/img/otherpics_white/chat_white.png"></img>Chat Rooms</a>
  </li>
</ul>
</div>
<style>
#chatHolder {
  padding:15px 15px;
  border-radius:15px;
  background:#FFF8DC;
  margin-bottom:100px;
  text-align:left;
}
.chatLink {
  margin-top:20px;
  font-size:20px;
}
#bigContainer #heading{
  padding-top:70px;
  text-align:center;
  margin-bottom:-30px;
}

</style>
<div id="bigContainer">
  <h1 id="heading">Chat Rooms</h1>
  <div class="signup" id="chatHolder">
    <a href="/FrontEnd/Subpages/chatroom/BrothersIndex.php" class="chatLink">Brothers Bar and Grill &raquo;</a><br />
    <a href="/FrontEnd/Subpages/chatroom/ClysIndex.php" class="chatLink">Clybourne &raquo;</a><br />
    <a href="/FrontEnd/Subpages/chatroom/GraingeIndex.php" class="chatLink">Grainger Library &raquo;</a><br />
    <a href="/FrontEnd/Subpages/chatroom/hausIndex.php" class="chatLink">Firehaus &raquo;</a><br />
    <a href="/FrontEnd/Subpages/chatroom/JoesIndex.php" class="chatLink">Joe's Brewery and Restaurant &raquo;</a><br />
    <a href="/FrontEnd/Subpages/chatroom/Kamsindex.php" class="chatLink">Kam's &raquo;</a><br />
    <a href="/FrontEnd/Subpages/chatroom/legendsIndex.php" class="chatLink">Legend's Bar and Grill &raquo;</a><br />
    <a href="/FrontEnd/Subpages/chatroom/lionIndex.php" class="chatLink">Red Lion &raquo;</a><br />
    <a href="/FrontEnd/Subpages/chatroom/MurphsIndex.php" class="chatLink">Murphy's Pub &raquo;</a><br />
    <a href="/FrontEnd/Subpages/chatroom/Siebelindex.php" class="chatLink">Siebel Center &raquo;</a><br />
    <a href="/FrontEnd/Subpages/chatroom/uglIndex.php" class="chatLink">Undergrad Library &raquo;</a><br />
    <a href="/FrontEnd/Subpages/chatroom/morrowIndex.php" class="chatLink">Other Locations &raquo;</a><br />
  </div>
</div>
</div>

</body>
</html>