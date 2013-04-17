<?php
  session_start();
  include("contactNavbar.php");
  $cookie = $_COOKIE["user"];
  $user = strtok($cookie, "/");
  $_SESSION['contact'] = 1;
?>
<style type="text/css">
  #subject {
    text-align:left;
  }
  #body {
    text-align: left;
  }
  #bodyDiv {
    width:40%;
    height:30%;
  }
  .subjectDiv {
    padding-bottom:50px;
  }
  .bodyDiv {
    padding-bottom: 50px;
  }
  #email {
    padding-top:30px;
  }
  #pageHeader {
    margin-left:0;
    font-size:25px;
  }
</style>

<html>
<head>
<link rel="stylesheet" type="text/css" href="css/basic.css" />
<script src="/FrontEnd/jQuery/jquery-1.7.1.js"></script>
<title>Contact Us!</title>

</head>

<body>
<div class="bigdiv">

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
<div class="signup">
  <h1 id="pageHeader">Do you have feedback for us? We would love to hear from you!</h1>
  <h5>Feel free to enter any questions or comments you may have below and we will make sure to respond to you as soon as possible.</h5>
  <form id = "email" method="post" action="Subpages/email/sendEmail.php">
    <div class="subjectDiv">
    <h3 id ="subject">Subject:</h3>
    <input type="text" size="30" maxlength="30" name="Fsubject">
    </div>
    <div class="bodyDiv">
    <h3 id="body">Body:</h3>
    <TEXTAREA id="bodyField" rows="10" cols="50" name="meat"></TEXTAREA>
    </div>
    <input type="hidden" value="<?php echo $user ?>" name="myRecipient" />
    <input type = "submit" />
  </form>
</div
</div>
</body>
</html>