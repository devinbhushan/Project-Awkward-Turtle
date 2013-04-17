<?php
  session_start();
  $_SESSION['updatePage'] = 3;
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../../css/basic.css" />
<title>Edit Profile</title>
</head>

<body>
<div class="bigdiv">

<script type="text/javascript" src="jQuery/jquery-1.7.1.js"></script>


<?php
  include("profNavbar.php");
?>

<div class="secondary">

<img class="logo" src="../../Images/Turtle.gif"></img>
<ul class="nav nav-list">
  <li class="nav-header">
    Edit Something You Input Earlier
  </li>
  <li>
    <a href="/FrontEnd/Profiles.php">Basic Information</a>
  </li>
  <li>
    <a href="/FrontEnd/Subpages/Profilespages/Editmoreinfo.php">About You</a>
  </li>
  <li class="active">
    <a href='Editpriorities.php'>Your Priorities</a>
  </li>
  <li>
    <a href='Delete.php'>Delete Your Profile</a>
  </li>
  <!--<li>
    <a href='Picture.php'>Upload a Picture</a>
  </li>-->
</ul>
</div>

<?php
  $con = mysql_connect("localhost", "awkwardt", "Gx61JXuJpaU@");
  if (!$con)
      die('Could not connect: ' . mysql_error());

  mysql_select_db("awkwardt_schema", $con);

  $currInfo = $_COOKIE["user"];
  //echo "this is the cookie:";
  //echo $currInfo;
  $email = strtok($currInfo, "/");
  $pwd = strtok("/");
  //echo $email;
  $myQuery = mysql_query("SELECT * FROM Rankings WHERE email = " . "'" . $email . "'");
  $fetchUser = mysql_fetch_array($myQuery); // entire row of data from database

  $htpri = $fetchUser["HomeTownPri"];
  $mopri = $fetchUser["MoviePri"];
  $mupri = $fetchUser["MusicPri"];
  $spri = $fetchUser["SportPri"];
  $mapri = $fetchUser["MajorPri"];
  $hpri = $fetchUser["HobbyPri"];
  $bpri = $fetchUser["BookPri"];

  //var_dump($fetchUser);

  mysql_close($con);
?>

<form action="/updateProfile.php" method="post">
<div class= "signup">

<div class="progress progress-danger progress-striped active">
  <div class="bar" style="width: 75%;"></div></div>

<div class="signup-body">
  <div class="controls">
    <select id="select02" name = "hometownpri">
      <option selected="selected"><?php echo $htpri ?></option>
      <option>1 (Not Important at All)</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5 (It Matters, but Not Much)</option>
      <option>6</option>
      <option>7</option>
      <option>8</option>
      <option>9</option>
      <option>10 (Very Important to Me)</option>
    </select>
  <span class="help-inline">How Important is it to Meet Someone From Your Hometown?</span>
    </div>
  </div>

<div class="signup-body">
  <div class="controls">
    <select id="select02" name = "moviespri">
      <option selected="selected"><?php echo $mopri ?></option>
      <option>1 (Not Important at All)</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5 (It Matters, but Not Much)</option>
      <option>6</option>
      <option>7</option>
      <option>8</option>
      <option>9</option>
      <option>10 (Very Important to Me)</option>
    </select>
  <span class="help-inline">How Important is it to Meet Someone With the Same Taste in Movies/TV?</span>
    </div>
  </div>

<div class="signup-body">
  <div class="controls">
    <select id="select02" name = "musicpri">
      <option selected="selected"><?php echo $mupri ?></option>
      <option>1 (Not Important at All)</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5 (It Matters, but Not Much)</option>
      <option>6</option>
      <option>7</option>
      <option>8</option>
      <option>9</option>
      <option>10 (Very Important to Me)</option>
    </select>
  <span class="help-inline">How Important is it to Meet Someone With the Same Taste in Music?</span>
    </div>
  </div>

<div class="signup-body">
  <div class="controls">
    <select id="select02" name = "sportspri">
      <option selected="selected"><?php echo $spri ?></option>
      <option>1 (Not Important at All)</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5 (It Matters, but Not Much)</option>
      <option>6</option>
      <option>7</option>
      <option>8</option>
      <option>9</option>
      <option>10 (Very Important to Me)</option>
    </select>
  <span class="help-inline">How Important is it to Meet Someone Whose Likes Your Favorite Sports?</span>
    </div>
  </div>

<div class="signup-body">
  <div class="controls">
    <select id="select02" name = "majorpri">
      <option selected="selected"><?php echo $mapri ?></option>
      <option>1 (Not Important at All)</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5 (It Matters, but Not Much)</option>
      <option>6</option>
      <option>7</option>
      <option>8</option>
      <option>9</option>
      <option>10 (Very Important to Me)</option>
    </select>
  <span class="help-inline">How Important is it to Meet Someone with the Same Major as You?</span>
    </div>
  </div>

<div class="signup-body">
  <div class="controls">
    <select id="select02" name = "hobbiespri">
      <option selected="selected"><?php echo $hpri ?></option>
      <option>1 (Not Important at All)</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5 (It Matters, but Not Much)</option>
      <option>6</option>
      <option>7</option>
      <option>8</option>
      <option>9</option>
      <option>10 (Very Important to Me)</option>
    </select>
  <span class="help-inline">How Important is it to Meet Someone with the same Hobbies as you?</span>
    </div>
  </div>


  <div class="signup-body">
  <div class="controls">
    <select id="select02" name = "bookspri">
      <option selected="selected"><?php echo $bpri ?></option>
      <option>1 (Not Important at All)</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5 (It Matters, but Not Much)</option>
      <option>6</option>
      <option>7</option>
      <option>8</option>
      <option>9</option>
      <option>10 (Very Important to Me)</option>
    </select>
  <span class="help-inline">How Important is it to Meet Someone With the same Favorite Book Genre as You?</span>
    </div>
  </div>

  <div class="continue_only">
    <input type="submit" value = "Continue" class="btn btn-small btn-primary">
  </div>

</div>
</form>
</div>
</div>
</body>
