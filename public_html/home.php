<?php
    session_start();

    $con = mysql_connect("localhost", "awkwardt", "Gx61JXuJpaU@");
    if (!$con)
        die('Could not connect: ' . mysql_error());

    mysql_select_db("awkwardt_schema", $con);

    if ($_COOKIE["user"])
    {
       header("Location: /FrontEnd/HomePage.php");
    }
    mysql_close($con);
?>
<html>
  <head>
  <link rel="stylesheet" type="text/css" href="basic.css" />
  <title>Log In</title>
  </head>
  <body>
    <div class="logindiv">

      <div class="otherdiv">
      	<img class="logo" src="/FrontEnd/Images/Turtle.gif"></img>
      </div>
        <div class="logininput">
          <form method="post" action="login.php">
            <h3>Please log in to proceed</h3>
            <font color="red"></font><br />
            Email:<br />
            <input type="text" name="username" />
            <br />Password:<br />
            <input type="password" name="pwd" />
            <p></p>
            <input type="submit" name="Submit" value="Submit" class = "btn btn-small btn-primary"/>
          </form>

          <h3>Not a Member Yet? Sign Up Now!</h3>
          <br />
          <form method="link" action="/FrontEnd/Signup.php">
            <input type="submit" value = "Sign Up" class="btn btn-small btn-primary" />
          </form>
        </div>
    </div>
  </body>
</html>