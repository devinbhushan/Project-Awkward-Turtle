<?php
	$con = mysql_connect("localhost", "awkwardt", "Gx61JXuJpaU@");
	if (!$con)
		die('Could not connect: ' . mysql_error());

	mysql_select_db("awkwardt_schema", $con);

    //$myQuery = "";

	if ($myQuery === false)
		die('Query failed');

	$loc = $_POST['LocationName'];
	$email = $_POST['user'];
//	$loc = "checkedIn";
//	$email = "test@gmail.com";	
	
			
	$sql = "UPDATE USERS SET checkin = " . "\"$loc\"" . "WHERE email = " . "\"$email\"";

	if (!mysql_query($sql, $con)){
		die('Error: ' . mysql_error());
	}
//    $tempLoc = mysql_query("SELECT Location from Users where Location = '".$_POST["LocationName"]."'");
//    $row=mysql_fetch_assoc($tempPwd);

	//$output = array(1 => $tempPwd);//=$enteredUsr;
	//$output[]=$tempPwd;
	
//	print(json_encode($row));
    mysql_close($con);
?>