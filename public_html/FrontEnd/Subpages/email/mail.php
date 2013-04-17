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
</style>

<html>
<head>
<link rel="stylesheet" type="text/css" href="../../css/basic.css" />
<script src="/FrontEnd/jQuery/jquery-1.7.1.js"></script>
<title>Contact Them!</title>

</head>

<body>
<div class="bigdiv">

<?php
  include("../Profilespages/matchNavbar.php");
?>

<div class="secondary">
<img class="logo" src="../../Images/Turtle.gif"></img>
<ul class="nav nav-list">
  <li class="nav-header">
    Profiles Navigation
  </li>
  <li class="active">
    <a href='/FrontEnd/Subpages/Profilespages/Matches.php'><img class="otherpics" src="/FrontEnd/img/otherpics_white/user_add_white.png"></img>Matches</a>
  </li>
</ul>
</div>

<div class="signup">
  <h1>Send them an e-mail!</h1>
  <h5>Remember this reveals your identity to them but you will only find out who they are if they choose to reply, keep an eye on your inbox! (If you leave subject empty, it may go to a spam folder)</h5>
  <form id = "email" method="post" action="sendEmail.php">
    <div class="subjectDiv">
    <h3 id ="subject">Subject:</h3>
    <input type="text" size="30" maxlength="30" name="Fsubject">
    </div>
    <div class="bodyDiv">
    <h3 id="body">Body:</h3>
    <TEXTAREA id="bodyField" rows="10" cols="50" name="meat"></TEXTAREA>
    </div>
    <input type="hidden" value="<?php echo $_POST['recipient']; ?>" name="myRecipient" />
    <input type = "submit" />
  </form>
</div
</div>
</body>
</html>