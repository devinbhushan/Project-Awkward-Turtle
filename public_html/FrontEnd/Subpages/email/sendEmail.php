<?php
	session_start();
	$con = mysql_connect("localhost","awkwardt","Gx61JXuJpaU@");
    	if (!$con)
    	{
        	die('Could not connect: ' . mysql_error());
    	}
    	mysql_select_db("awkwardt_schema", $con);

	$subject = $_POST['Fsubject'];
	$text = $_POST['meat'];
	$currInfo = $_COOKIE["user"];
	$currEmail = strtok($currInfo, "/");
	$currRes = mysql_query("SELECT * FROM USERS WHERE email = " . "'" . $currEmail . "'");
	$row = mysql_fetch_array($currRes);
	$first = $row["fname"];
	$last = $row["lname"];

	if ($_SESSION['contact'] == 1)
	{
		$to = "projectawkwardturtle@gmail.com";
		if (filter_var($to, FILTER_VALIDATE_EMAIL))
		{
			mail ($to, $subject, $text, "From: $first $last <$currEmail>", "-f '$currEmail'");
            echo "<script type=\"text/javascript\">window.alert(\"Thanks for your feedback! Click below to return to Awkward Turtle\");window.location.href='http://awkwardturtle.projects.cs.illinois.edu/FrontEnd/HomePage.php';</script>";
		}
		else{
            echo "<script type=\"text/javascript\">window.alert(\"Sorry about that, something went wrong. Click below to try again\");window.location.href='http://awkwardturtle.projects.cs.illinois.edu/FrontEnd/contactUs.php';</script>";
		}
	}
	else {
		$to = $_POST['myRecipient'];
		if (filter_var($to, FILTER_VALIDATE_EMAIL)){
			mail ($to, $subject, $text, "From: $first $last <$currEmail>", "-f '$currEmail'");
            echo "<script type=\"text/javascript\">window.alert(\"Your email has been sent! Click below to return to Awkward Turtle\");window.location.href='http://awkwardturtle.projects.cs.illinois.edu/FrontEnd/Subpages/Profilespages/Matches.php';</script>";		}
		else{
			header("Location: /FrontEnd/Subpages/Profilespages/Matches.php");
			echo "I am sorry that was not a valid email address, please wait while we return you to the matches page.";
		}	
	}
?>