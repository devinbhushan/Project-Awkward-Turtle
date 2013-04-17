<?php
  session_start();
  $_SESSION['updatePage'] = 2;
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
  <li class="active">
    <a href="/FrontEnd/Subpages/Profilespages/Editmoreinfo.php">About You</a>
  </li>
  <li>
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
  $myQuery = mysql_query("SELECT * FROM USERS WHERE email = " . "'" . $email . "'");
  $fetchUser = mysql_fetch_array($myQuery); // entire row of data from database

  //$fetchUser = mysql_fetch_array($myQuery);

  $movie1 = $fetchUser["Movies1"];
  $movie2 = $fetchUser["Movies2"];
  $movie3 = $fetchUser["Movies3"];

  $music1 = $fetchUser["Music1"];
  $music2 = $fetchUser["Music2"];
  $music3 = $fetchUser["Music3"];

  $sport1 = $fetchUser["Sports1"];
  $sport2 = $fetchUser["Sports2"];
  $sport3 = $fetchUser["Sports3"];

  $major = $fetchUser["Major"];
  $college = $fetchUser["MajorSchool"];

  $hobby1 = $fetchUser["Hobbies1"];
  $hobby2 = $fetchUser["Hobbies2"];
  $hobby3 = $fetchUser["Hobbies3"];

  $book1 = $fetchUser["Book1"];
  $book2 = $fetchUser["Book2"];
  $book3 = $fetchUser["Book3"];

  $homeState = $fetchUser["HomeState"];
  $homeCity = $fetchUser["HomeCity"];

  //var_dump($fetchUser);

  mysql_close($con);
?>

<div class="signup">
<form action="/updateProfile.php" method="post">

  <div class="progress progress-danger progress-striped active">
    <div class="bar" style="width: 50%;"></div>
  </div>

  <div class="signup-body">
  <div class="signup-body">
  <input type="text" class="input-large" name = "user_state" placeholder="<?php echo $homeState ?>"></input>
  <span class="help-inline">Enter Your Home State</span>
  </div>
  <div class="signup-body">
  <input type="text" class="input-large" name = "user_city" placeholder="<?php echo $homeCity ?>"></input>
  <span class="help-inline">Enter Your Home City</span>
  </div>
  </div>

  <div class="signup-body">
    <div class="controls">
     
      <span class="help-inline">What Are Your Favorite Types of Movie/TV Show? Select up to 3 genres using Ctrl + left click</span>
      
      <span class="help-inline">Your current selections are: <?php echo $movie1 . ", " . $movie2 . ", and " . $movie3 . ". "?>
      </span>
      <div class="signup-body">
        <select multiple = "multiple" name="movieSelect[]">
          <option value="Action/Adventure">Action/Adventure</option>
          <option value="Thriller">Thriller</option>
          <option value="Scary/Horror">Scary/Horror</option>
          <option value="Romance">Romance</option>
          <option value="Comedy">Comedy</option>
          <option value="Sci/Fi Fantasy">SciFi/Fantasy</option>
          <option value="Drama">Drama</option>
        </select>
        <!--<span class="help-inline">What Are Your Favorite Types of Movie/TV Show? Enter up to 3, Separated by Commas, in the Above Box. Ex. Action/Adventure, Thriller, Comedy.</span>-->
      </div>
    </div>
  </div>

  <div class="signup-body">
    <div class="controls">
      
      <span class="help-inline">What Are Your Favorite Types of Music? Select up to 3 genres using Ctrl + left click</span>
      <span class="help-inline">Your current selections are: <?php echo $music1 . ", " . $music2 . ", and " . $music3 . ". "?>
      </span>   
      <div class="signup-body">
        <select multiple = "multiple" name="musicSelect[]">
          <option>Oldies</option>
          <option>80's/90's</option>
          <option>Country</option>
          <option>Hip-Hop/Rap</option>
          <option>R&B</option>
          <option>Pop</option>
          <option>Alternative</option>
          <option>Rock</option>
          <option>Metal</option>
        </select>
      </div>
    </div>
  </div>

  <div class="signup-body">
    <div class="controls">

      <span class="help-inline">What Are Your Favorite Sports? Select up to 3 genres using Ctrl + left click</span>
      
      <span class="help-inline">Your current selections are: <?php echo $sport1 . ", " . $sport2 . ", and " . $sport3 . ". "?>
      </span>
      <div class="signup-body">
        <select multiple = "multiple" name="sportSelect[]">
          <option>Baseball</option>
          <option>Basketball</option>
          <option>Football</option>
          <option>Golf</option>
          <option>Soccer</option>
          <option>Swim</option>
          <option>Tennis</option>
          <option>Track/Field</option>
          <option>Voleyball</option>
        </select>
      </div>
    </div>
  </div>

  <div class="signup-body">
     <div class="controls">
        <span class="help-inline">Enter Your Major, then Your Major's college. Ex: Computer Science, Engineering.</span>
        <br />
        <input type="text" class="input-large" placeholder="<?php echo $major ?>" name = "mymajor"></input>
        <input type="text" class="input-large" placeholder="<?php echo $college ?>" name = "mycollege"></input>
      </div>
  </div>



  <div class="signup-body">
    <div class="controls">

      <span class="help-inline">What are Some of Your Hobbies? Select up to 3 genres using Ctrl + left click</span>
      
      <span class="help-inline">Your current selections are: <?php echo $hobby1 . ", " . $hobby2 . ", and " . $hobby3 . ". "?>
      </span>
      <div class="signup-body">
        <select multiple = "multiple" name="hobbySelect[]">
          <option>Sports</option>
          <option>Exercise</option>
          <option>Video Games</option>
          <option>Friends</option>
          <option>TV/Movies</option>
          <option>Music</option>
          <option>Clubs/Organizations</option>
        </select>
      </div>
    </div>
  </div>


  <div class="signup-body">
    <div class="controls">

      <span class="help-inline">What Type of Books do You Like? Select up to 3 genres using Ctrl + left click <br /></span>
      <span class="help-inline">Your current selections are: <?php echo $book1 . ", " . $book2 . ", and " . $book3 . ". "?>
      </span>
      <div class="signup-body">
        <select multiple = "multiple" name="bookSelect[]">
          <option>Action/Adventure</option>
          <option>Thriller</option>
          <option>Scary/Horror</option>
          <option>Romance</option>
          <option>Comedy</option>
          <option>SciFi/Fantasy</option>
          <option>Drama</option>
        </select>
      </div>
    </div>

    <div class="continue_only">
      <input type="submit" value = "Continue" class="btn btn-small btn-primary">
    </div>

  </div>

  </div>

</form>
</div>
</body>
