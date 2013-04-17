<?php
  include("../../../validate.php");
?>

<style>
  th {
    width:20%;
    height:65px;
  }
  td {
    height:65px;
    text-align:center;
  }
  #matchHeading{
    text-align: center;
    vertical-align: middle;
    margin-bottom: -35px;
    padding-top: 40px;
  }
</style>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../../css/basic.css" />
<title>See Your Matches</title>
</head>

<body>
<div class="bigdiv">

<?php
  include("matchNavbar.php");
?>

<div class="secondary">
<img class="logo" src="../../Images/Turtle.gif"></img>
<ul class="nav nav-list">
  <li class="nav-header">
    Profiles Navigation
  </li>
  <li class="active">
    <a href='Matches.html'><img class="otherpics" src="../../img/otherpics_white/user_add_white.png"></img>Matches</a>
  </li>
</ul>
</div>
<div class="signup">
  <table id="matchResults">
    <?php
    	include("matching.php");
	$con = mysql_connect("localhost","awkwardt","Gx61JXuJpaU@");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());			
	}
	mysql_select_db("awkwardt_schema", $con);
	
	$cookie = $_COOKIE["user"];
	$user = strtok($cookie, "/");
	
	$tempPwd = mysql_query("SELECT checkin from USERS WHERE email = '$user'");
	$fetchUser = mysql_fetch_row($tempPwd);
	
	if ($fetchUser[0] == "")
	{
            echo "<script type=\"text/javascript\">window.alert(\"You need to check-in first! Click below to continue to the Check-in page\");window.location.href='http://awkwardturtle.projects.cs.illinois.edu/FrontEnd/Subpages/Locationspages/Checkin.php';</script>";
	}
    ?>
  </table>
</div>

</body>
</html>