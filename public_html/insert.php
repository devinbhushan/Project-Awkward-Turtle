<?php include("/home/cs/awkwardt/public_html/password_protect.php"); ?>
<?php
    $con = mysql_connect("localhost", "awkwardt", "Gx61JXuJpaU@");
    if (!$con)
        die('Could not connect: ' . mysql_error());

    mysql_select_db("awkwardt_schema", $con);

    $sql = "INSERT INTO Events (Time_Held, Location, Event_Name, Event_Creator, Location_Name)
    VALUES
    ('$_POST[time]','$_POST[location]', '$_POST[event]', '$_POST[admin]', '$_POST[type]')";
    
    if (!mysql_query($sql, $con))
    {
        die('Error: ' . mysql_error());
    }
    mysql_close($con);
    header ("Location: /admin.php");
?>