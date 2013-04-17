<?php
    $con = mysql_connect("localhost", "awkwardt", "Gx61JXuJpaU@");
    if (!$con)
        die('Could not connect: ' . mysql_error());

    mysql_select_db("awkwardt_schema", $con);
    //echo "hello\n";
    $cookie = $_COOKIE["user"];
    $tok = strtok($cookie, "/");
    //echo "user: " . $tok . " whole thing: " . $cookie;
    if ($tok !== false)
    {
      $user = $tok;
      $pwd = strtok("/");
      //echo "user: " . $user . " pwd: " . $pwd;

      $tempPwd = mysql_query("SELECT password from USERS WHERE email = '$user'"); 
      
      $fetchUser = mysql_fetch_row($tempPwd);
      //echo "fetched: " . $fetchUser[0] . " entered user: " . $pwd;
      if ($fetchUser[0] != $pwd || $cookie == "")
      {
        mysql_close($con);
        header("Location: /home.php");
      }
    }
    else
    {
      header("Location: /home.php");
    }
    mysql_close($con);
?>