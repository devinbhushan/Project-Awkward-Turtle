<?php
    $con = mysql_connect("localhost", "awkwardt", "Gx61JXuJpaU@");
    if (!$con)
        die('Could not connect: ' . mysql_error());

    mysql_select_db("awkwardt_schema", $con);

    //$myQuery = "";

    if ($myQuery === false)
    	die('Query failed');

    $tempPwd = mysql_query("SELECT password from USERS WHERE email = '".$_POST["UserName"]."'");
    $row=mysql_fetch_row($tempPwd);
    $salt = "barrybonds";
    $toComp = md5($_POST["Password"] . $salt);
    
    if ($row[0] == "")
    	print("FALSE");
    else if($row[0] == $toComp)
    	print("TRUE");
    else
    	print("FALSE");

	//$output = array(1 => $tempPwd);//=$enteredUsr;
	//$output[]=$tempPwd;
	
	//print(json_encode($row));
    mysql_close($con);
?>