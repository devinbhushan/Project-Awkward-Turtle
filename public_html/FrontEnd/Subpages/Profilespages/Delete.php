<?php

  $con = mysql_connect("localhost", "awkwardt", "Gx61JXuJpaU@");
  if (!$con)
      die('Could not connect: ' . mysql_error());

  mysql_select_db("awkwardt_schema", $con);

  $currInfo = $_COOKIE["user"];
  //echo "this is the cookie:";
  //echo $currInfo;
  $email = strtok($currInfo, "/");

  $deleteUser = mysql_query("DELETE FROM USERS WHERE email = '$email'");
  $deleteRank = mysql_query("DELETE FROM Rankings WHERE email='$email'");
  $deleteCheckins = mysql_query("DELETE FROM Checkins WHERE email = '$email'");

  header("Location: /signout.php");
?>