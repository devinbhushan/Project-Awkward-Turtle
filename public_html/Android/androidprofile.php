<?php
    $con = mysql_connect("localhost", "awkwardt", "Gx61JXuJpaU@");
    if (!$con)
        die('Could not connect: ' . mysql_error());

    mysql_select_db("awkwardt_schema", $con);

    //$myQuery = "";

    if ($myQuery === false)
    	die('Query failed');


//$myemail = = $_POST["UserName"];
$myemail = "android@gmail.com";
$holder = mysql_query("SELECT * FROM USERS WHERE email = '".$_POST["UserName"]."'");
//$holder = mysql_query("SELECT * FROM USERS WHERE email = '$myemail'");
$fetchUser = mysql_fetch_row($holder);

$size = 29;
for($q=0; $q < $size; $q++)
{
print( json_encode($fetchUser[$q]));
}


	

//$printer = json_encode($fetchUser);
//echo $printer;
//print($printer);
    mysql_close($con);
?>