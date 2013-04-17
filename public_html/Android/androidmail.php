<?php

	$con = mysql_connect("localhost","awkwardt","Gx61JXuJpaU@");
    	if (!$con)
    	{
        	die('Could not connect: ' . mysql_error());
    	}
    	mysql_select_db("awkwardt_schema", $con);

	$to = $_POST['myRecipient'];
	$subject = $_POST['Fsubject'];
	$text = $_POST['meat'];
/*
	$currInfo = $_COOKIE["user"];
	$currEmail = strtok($currInfo, "/");
*/
	
	$email = $_POST['currEmail']; 

	$currRes = mysql_query("SELECT * FROM USERS WHERE email = " . "'" . $email . "'");
        $row = mysql_fetch_array($currRes);
        $first = $row["fname"];
        $last = $row["lname"];
	if (filter_var($to, FILTER_VALIDATE_EMAIL)){
		mail ($to, $subject, $text, "From: $first $last <$email>", "-f '$email'");
		//mail("bhushan1@illinois.edu", "subject", "body", "From: Jonathan Perlin <jperlin18@gmail.com>", "-fjperlin18@gmail.com");//$to, $subject, $text, $currEmail);	

print("SENT");
	}
	else{
print("FAIL");	
//	echo "I am sorry that was not a valid email address, please return to the matches page.";
	}
?>
