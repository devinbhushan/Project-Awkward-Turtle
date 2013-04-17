<?php
$con = mysql_connect("localhost","awkwardt","Gx61JXuJpaU@");
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("awkwardt_schema", $con);


define ("MAX_SIZE","60"); 

if ($_SESSION[user] == "")
{
	echo "<script type=\"text/javascript\">window.alert(\"First you need to complete basic info!\");window.location.href='http://awkwardturtle.projects.cs.illinois.edu/FrontEnd/Signup.php';</script>";
}


function getExtension($str) 
{
	$i = strrpos($str,".");
	if (!$i) 
	{ 
		return ""; 
	}
	$l = strlen($str) - $i;
	$ext = substr($str,$i+1,$l);
	return $ext;
}

$errors=0;

if(isset($_POST['Submit'])) 
{
	$image=$_FILES['image']['name'];

	if ($image) 
	{

		$filename = stripslashes($_FILES['image']['name']);

		$extension = getExtension($filename);
		$extension = strtolower($extension);

		if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png"))	
		{

			echo '<h1>Unknown extension, please use a .jpg, .jpeg, or .png</h1>';
			$errors=1;
		}
		else
		{

			$size=filesize($_FILES['image']['tmp_name']);

			if ($size > MAX_SIZE*1024)
			{
				echo '<h1>Your file is too large, please use a smaller picture</h1>';
				$errors=1;
			}

			//Makes the image name unique, the time.extension
			$image_name=time().'.'.$extension;

			//THIS IS THE URL THAT SHOULD GO INTO THE TABLE!!!!!!
			$newname="images/".$image_name;

			$copied = copy($_FILES['image']['tmp_name'], $newname);

			if (!$copied) 
			{	
				echo '<h1>Weird stuff happened, please try again</h1>';
				$errors=1;
			}

			$sql = "UPDATE USERS SET pic_url = '$newname' WHERE email = '$_SESSION[user]'";

			if (!mysql_query($sql))
	        {
	            die('Error: ' . mysql_error());
	        }
		}
	}
}

if (isset($_POST['Submit']))
{
	$currUser = $_SESSION[user];
	$sql = "SELECT * FROM USERS WHERE email = '$currUser'";
	$currRes = mysql_query($sql);
	$row = mysql_fetch_array($currRes);
	//var_dump($row);

	if ($row["email"] == "")
	{
		echo "<script type=\"text/javascript\">window.alert(\"You need to finish the basic info section first!\");window.location.href='http://awkwardturtle.projects.cs.illinois.edu/FrontEnd/Signup.php';</script>";
	}
}

if(isset($_POST['Submit']) && !$errors) 
{
	echo "<h1>File Uploaded Successfully</h1>";
	echo "<script type=\"text/javascript\">window.alert(\"You have successfully finished your profile, go to the Home Page!\");window.location.href='http://awkwardturtle.projects.cs.illinois.edu/FrontEnd/HomePage.php';</script>";
	//header("Location: /FrontEnd/HomePage.php");
}

?>

<form name="newad" method="post" enctype="multipart/form-data" action="">
	<table>
		<tr>
			<td>
				<input type="file" name="image">
			</td>
		</tr>
		<tr>
			<td>
				<input name="Submit" type="submit" value="Upload image">
			</td>
		</tr>
	</table>
</form>

<form method="link" action="/FrontEnd/HomePage.php">
	<input type="submit" value="Skip upload and get started!" />
</form>
