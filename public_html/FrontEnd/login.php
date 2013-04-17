<?php
    $con = mysql_connect("localhost", "awkwardt", "Gx61JXuJpaU@");
    if (!$con)
        die('Could not connect: ' . mysql_error());

    mysql_select_db("awkwardt_schema", $con);

    $enteredUsr = $_POST['username'];
    $enteredPwd = $_POST['pwd'];
    echo $enteredPwd;
    $salt = "barrybonds";
    $toComp = md5($enteredPwd . $salt);
    $tempPwd = mysql_query("SELECT password from USERS WHERE email = '$enteredUsr'");
    $fetchUsr = mysql_fetch_row($tempPwd);
    //var_dump($fetchUsr);
    //var_dump($toComp);
    if ($fetchUsr[0] == "")
    {
        //invalid user break here
        header("Location: /home.php");
    }
    else if ($enteredPwd == "")
    {
        //empty string pwd
        header("Location: /home.php");
    }
    else if ($fetchUsr[0] == $toComp)
    {
        //forward to main page or wherever
        $expire = time() + 60*60*24;
        $value = "/" . $enteredUsr . "/" . $toComp . "/";
        setcookie("user", $value, $expire);
        mysql_close($con);
        header ("Location: /FrontEnd/HomePage.php");
    }
    else {
        header("Location: /home.php");
    }
    mysql_close($con);
?>