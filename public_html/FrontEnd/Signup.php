<?php
  session_start();
  $_SESSION['page'] = 1;
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/basic.css" />
<title>Sign Up</title>
</head>

<body>
<div class="bigdiv">

<script type="text/javascript" src="jQuery/jquery-1.7.1.js"></script>


<?php
  include("signupNavbar.php");
?>

<div class = "origSignup">
<form action="/registration.php" method="post">
  <div class="progress progress-danger progress-striped active">
    <div class="bar" style="width: 25%;"></div>
  </div>

  <div class="signup-body">
  <input type="text" class="input-medium" placeholder="First Name" name = "user_first"></input>
  <span class="help-inline">Enter Your First Name</span>
  </div>

  <div class="signup-body">
  <input type="text" class="input-medium" placeholder="Last Name" name = "user_last"></input>
  <span class="help-inline">Enter Your Last Name</span>
  </div>

  <div class= "signup-body">
  <input type="email" class="input-medium" placeholder="Email" name = "user_email"></input>
  <span class="help-inline">Enter A Valid E-mail Address</span>
  </div>

  <div class = "signup-body">
  <input type="password" id = "pass" class="input-medium" placeholder="Password" name = "pwd"></input>
  <span class="help-inline">Enter Your Password</span>
  </div>

  <div class="signup-body">
  <input type="password" id="confirmPass" class="input-medium" placeholder="Confirm Password" name = "pwd"></input>
  <span class="help-inline">Re-enter Your Password</span>
  </div>

  <script>
      window.setInterval(checkPassword, 1000);
      function checkPassword() {
          if($("#confirmPass").val() != $("#pass").val()){
            //alert("values do not match");
            document.getElementById("continueButton").disabled = true;
          }
          else {
            document.getElementById("continueButton").disabled = false;
          }
      }
  </script>

  <div class="signup-body">
    <div class="controls">
      <select id="selectGender" name = "gender">
        <option>M</option>
        <option>F</option>
      </select>
      <span class="help-inline">Select Your Gender</span>
    </div>
  </div>

  <div class="signup-body">
    <div class="controls">
      <select id="select03" name = "birthyear">
        <option>1997</option>
        <option>1996</option>
        <option>1995</option>
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
        <option>1984</option>
        <option>1983</option>
        <option>1982</option>
        <option>1981</option>
        
      </select>
      <span class="help-inline">Select Your Year of Birth</span>
    </div>
  </div>

  <div class="signup-body">
    <div class="controls">
      <select id="select01" name = "birthmonth">
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
      <input type="submit" id = "continueButton" value = "Continue" class="btn btn-small btn-primary">
    </div>
  </div>

</form>
</div>
</div>
</body>