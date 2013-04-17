<?php
  session_start();
  $_SESSION['page'] = 3;
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

<form action="/registration.php" method="post">
<div class= "origSignup">

<div class="progress progress-danger progress-striped active">
  <div class="bar" style="width: 75%;"></div></div>

<div class="signup-body">
  <div class="controls">
    <select id="select02" name = "hometownpri">
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
