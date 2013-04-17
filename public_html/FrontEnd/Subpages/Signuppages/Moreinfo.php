<?php
  session_start();
  $_SESSION['page'] = 2;
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../../css/basic.css" />
<title>Sign Up</title>
</head>

<body>
<div class="bigdiv">

<script type="text/javascript" src="jQuery/jquery-1.7.1.js"></script>

<?php
  include("../../signupNavbar.php");
?>

<div class="origSignup">
<form action="/registration.php" method="post">

  <div class="progress progress-danger progress-striped active">
    <div class="bar" style="width: 50%;"></div>
  </div>

  <div class="signup-body">
  <div class="signup-body">
  <input type="text" class="input-large" name = "user_state" placeholder="Home State"></input>
  <span class="help-inline">Enter Your Home State</span>
  </div>
  <div class="signup-body">
  <input type="text" class="input-large" name = "user_city" placeholder="Home City"></input>
  <span class="help-inline">Enter Your Home City</span>
  </div>
  </div>

  <div class="signup-body">
    <div class="controls">
     
      <span class="help-inline">What Are Your Favorite Types of Movie/TV Show? Select up to 3 genres using Ctrl + left click</span>
      <div class="signup-body">
        <select multiple = "multiple" name="movieSelect[]">
          <option value="Action/Adventure">Action/Adventure</option>
          <option value="Thriller">Thriller</option>
          <option value="Scary/Horror">Scary/Horror</option>
          <option value="Romance">Romance</option>
          <option value="Comedy">Comedy</option>
          <option value="Sci/Fi Fantasy">SciFi/Fantasy</option>
          <option value="Drama">Drama</option>
          <option value="Documentary">Documentary</option>
        </select>
        <!--<span class="help-inline">What Are Your Favorite Types of Movie/TV Show? Enter up to 3, Separated by Commas, in the Above Box. Ex. Action/Adventure, Thriller, Comedy.</span>-->
      </div>
    </div>
  </div>

  <div class="signup-body">
    <div class="controls">
      
      <span class="help-inline">What Are Your Favorite Types of Music? Select up to 3 genres using Ctrl + left click</span>     
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
          <option>Volleyball</option>
        </select>
      </div>
    </div>
  </div>

  <div class="signup-body">
     <div class="signup-body">
        <span class="help-inline">Enter Your Major, then Your Major's college. Ex: Computer Science, Engineering.</span>
        <br />
        <input type="text" class="input-large" placeholder="Your Major" name = "mymajor"></input>
        <input type="text" class="input-large" placeholder="Your College" name = "mycollege"></input>
      </div>
  </div>



  <div class="signup-body">
    <div class="controls">

      <span class="help-inline">What are Some of Your Hobbies? Select up to 3 genres using Ctrl + left click</span>
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

      <span class="help-inline">What Type of Books do You Like? Select up to 3 genres using Ctrl + left click</span>
      <div class="signup-body">
        <select multiple = "multiple" name="bookSelect[]">
          <option>Action/Adventure</option>
          <option>Thriller</option>
          <option>Scary/Horror</option>
          <option>Romance</option>
          <option>Comedy</option>
          <option>SciFi/Fantasy</option>
          <option>Drama</option>
          <option>Non-Fiction</option>

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