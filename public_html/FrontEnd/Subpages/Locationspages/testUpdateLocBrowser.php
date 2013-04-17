<?php
	$con = mysql_connect("localhost", "awkwardt", "Gx61JXuJpaU@");

	if (!$con)
		die('Could not connect: ' . mysql_error());

	mysql_select_db("awkwardt_schema", $con);

	if ($myQuery === false)
		die('Query failed, try refreshing the page please');

	//loc is the new location
	$loc = $_POST['currLoc'];
	$userCookie = $_COOKIE["user"];
	$tok = strtok($userCookie, "/");
	
	//oldLoc shows which variable you are coming from
	$oldLoc = mysql_fetch_row(mysql_query("SELECT checkin FROM USERS WHERE email = '$tok'"));
	if ($oldLoc[0] != NULL)
	{
		$query1 = "SELECT count(*) as locExist FROM Location WHERE Name = '$loc'";//oldLoc[0]'";

		$exists = mysql_fetch_assoc(mysql_query($query1));
		$query2 = "SELECT Count AS ct FROM Location WHERE name = '$oldLoc[0]'";

		//oldCount is the number of people at the old location BEFORE you leave
		$oldCount = mysql_fetch_assoc(mysql_query($query2));
		if($oldCount==False || $oldCount===False)
		{
			$oldCount['ct']=1;
		}
		//existBool becomes 0 if the new place does exist, 1 if it does NOT
		if ($exists['locExist'] != "0")
		{
			$existBool = "0";
		}
		else
		{
			$existBool = "1";
		}
		//If the new location does exist
		if ($existBool == "0")
		{
			if ($oldCount['ct'] > 0 || $oldCount==False)
				$decrement = mysql_query("UPDATE Location SET Count = Count - 1 WHERE Name = '$oldLoc[0]'");

			$increment = mysql_query("UPDATE Location SET Count = Count + 1 WHERE Name = '$loc'");

		}
		else
		{
			if ($oldCount['ct'] > 0 || $oldCount==False)
				$decrement = mysql_query("UPDATE Location SET Count = Count - 1 WHERE Name = '$oldLoc[0]'");
			$insert = mysql_query("INSERT INTO Location (Name, Count) VALUES ('$loc', '1')");
		}
	}
	else
	{
		$query1 = "SELECT count(*) as locExist FROM Location WHERE Name = '$loc'";//oldLoc[0]'";
		$exists = mysql_fetch_assoc(mysql_query($query1));
		if ($exists['locExist'] != "0")
		{
			$existBool = "0";
		}
		else
		{
			$existBool = "1";
		}
		
		if ($existBool == "0")
		{
			$increment = mysql_query("UPDATE Location SET Count = Count + 1 WHERE Name = '$loc'");
		}
		else
		{
			$insert = mysql_query("INSERT INTO Location (Name, Count) VALUES ('$loc', '1')");
		}
	}

	$sql2 = mysql_query("UPDATE USERS
			SET checkin = '$loc'
			WHERE email = '$tok'");
	
	header("Location: ../Profilespages/Matches.php");
    mysql_close($con);
?>