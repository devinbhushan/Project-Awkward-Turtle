<?php
  session_start();

  $_SESSION['updatePage'] = 1;
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/basic.css" />
<title>Edit Profile</title>
</head>

<body>
<div class="bigdiv">

<script type="text/javascript" src="jQuery/jquery-1.7.1.js"></script>

<?php
  include("Subpages/Profilespages/profNavbar.php");
?>

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
  $myQuery = mysql_query("SELECT * FROM USERS WHERE email = " . "'" . $email . "'"); // entire row of data from database
  $fetchUser = mysql_fetch_row($myQuery);

  //($fetchUser);

  mysql_close($con);
?>


<div class="secondary">
<img class="logo" src="Images/Turtle.gif"></img>
<ul class="nav nav-list">
  <li class="nav-header">
    Edit Something You Input Earlier
  </li>
  <li class="active">
    <a href="Profiles.php">Basic Information</a>
  </li>
  <li>
    <a href="Subpages/Profilespages/Editmoreinfo.php"></img>About You</a>
  </li>
  <li>
    <a href='Subpages/Profilespages/Editpriorities.php'></img>Your Priorities</a>
  </li>
  <li>
    <a href='Subpages/Profilespages/Delete.php'>Delete Your Profile</a>
  </li>
 </ul>
</div>

<div class = "signup">
<form action="/updateProfile.php" method="post">
  <div class="progress progress-danger progress-striped active">
    <div class="bar" style="width: 25%;"></div>
  </div>

  <div class="signup-body">
  <input type="text" class="input-medium" placeholder="<?php echo $fetchUser[2] ?>" name = "user_first"></input>
  <span class="help-inline">Enter Your First Name</span>
  </div>

  <div class="signup-body">
  <input type="text" class="input-medium" placeholder="<?php echo $fetchUser[3] ?>" name = "user_last"></input>
  <span class="help-inline">Enter Your Last Name</span>
  </div>

  <div class= "signup-body">
  <input type="email" class="input-medium" placeholder="<?php echo $fetchUser[0] ?>" name = "user_email"></input>
  <span class="help-inline">Enter A Valid E-mail Address</span>
  </div>

  <div class = "signup-body">
  <input type="password" class="input-medium" placeholder="Password" name = "pwd"></input>
  <span class="help-inline">Enter Your New Password</span>
  </div>

  <div class="signup-body">
  <input type="password" class="input-medium" placeholder="Confirm Password" name = "pwd"></input>
  <span class="help-inline">Re-enter Your New Password</span>
  </div>


  <div class="signup-body">
    <div class="controls">
      <select id="select03" name = "birthyear">
        <option selected="selected"><?php echo $fetchUser[6] ?></option>
        <option>1994</option>
        <option>1993</option>
        <option>1992</option>
        <option>1991</option>
        <option>1990</option>
        <option>1989</option>
        <option>1988</option>
        <option>1987</option>
        <option>1986</option>
        <option>1985</option>
      </select>
      <span class="help-inline">Select Your Year of Birth</span>
    </div>
  </div>

  <div class="signup-body">
    <div class="controls">
      <select id="select01" name = "birthmonth">
        <option selected="selected"><?php echo $fetchUser[4] ?></option>
        <option>01</option>
        <option>02</option>
        <option>03</option>
        <option>04</option>
        <option>05</option>
        <option>06</option>
        <option>07</option>
        <option>08</option>
        <option>09</option>
        <option>10</option>
        <option>11</option>
        <option>12</option>
      </select>
      <span class="help-inline">Select The Month</span>
    </div>
  </div>

  <div class="signup-body">
    <div class="controls">
      <select id="select02" name = "birthday">
        <option selected="selected"><?php echo $fetchUser[5] ?></option>
        <option>01</option>
        <option>02</option>
        <option>03</option>
        <option>04</option>
        <option>05</option>
        <option>06</option>
        <option>07</option>
        <option>08</option>
        <option>09</option>
        <option>10</option>
        <option>11</option>
        <option>12</option>
        <option>13</option>
        <option>14</option>
        <option>15</option>
        <option>16</option>
        <option>17</option>
        <option>18</option>
        <option>19</option>
        <option>20</option>
        <option>21</option>
        <option>22</option>
        <option>23</option>
        <option>24</option>
        <option>25</option>
        <option>26</option>
        <option>27</option>
        <option>28</option>
        <option>29</option>
        <option>30</option>
        <option>31</option>
      </select>
      <span class="help-inline">Select The Day</span>
    </div>

    <div class="continue_only">
      <input type="submit" value = "Continue" class="btn btn-small btn-primary">
    </div>
  </div>

</form>
</div>
</div>
</body>