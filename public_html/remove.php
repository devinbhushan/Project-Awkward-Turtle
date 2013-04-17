<?php include("/home/cs/awkwardt/public_html/password_protect.php"); ?>
<?php
    $con = mysql_connect("localhost", "awkwardt", "Gx61JXuJpaU@");
    if (!$con)
       die('Could not connect: ' . mysql_error());
    mysql_select_db("awkwardt_schema", $con);
    $key1 = $_POST["removeKey1"];
    $key2 = $_POST["removeKey2"];

    $sql = "DELETE FROM Events 
    WHERE Time_Held = '$key1' AND Event_Creator = '$key2'";
                                       
    if (!mysql_query($sql, $con))
    {   
      die('Error: ' . mysql_error());
    }
    mysql_close($con);
    header ("Location: /admin.php");
?>