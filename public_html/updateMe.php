<?php include("/home/cs/awkwardt/public_html/password_protect.php"); ?>
<?php
    $con = mysql_connect("localhost", "awkwardt", "Gx61JXuJpaU@");
    if (!$con)
        die('Could not connect: ' . mysql_error());

    mysql_select_db("awkwardt_schema", $con);

    $key1 = $_POST["currTime"];
    $key2 = $_POST["currCreator"];

    $currRes = mysql_query("SELECT * FROM Events WHERE Time_Held = '$key1' AND Event_Creator = '$key2'");
    $row = mysql_fetch_array($currRes);

    $upTime = $_POST["updateTime"];
    if ($upTime == "")
        $upTime = $row["Time_Held"];
    $upLoc = $_POST["updateLoc"];
    if ($upLoc == "")
        $upLoc = $row["Location"];
    $upEvent = $_POST["updateEvent"];
    if ($upEvent == "")
        $upEvent = $row["Event_Name"];
    $upCreator = $_POST["updateCreator"];
    if ($upCreator == "")
        $upCreator = $row["Event_Creator"];
    $upType = $_POST["updateType"];
    if ($upType == "")
        $upType = $row["Location_Name"];

    $result = "UPDATE Events SET Time_Held = '$upTime', Location = '$upLoc', Event_Name = '$upEvent', Event_Creator = '$upCreator', Location_Name = '$upType' WHERE (Time_Held = '$key1' AND Event_Creator = '$key2')";

    if (!mysql_query($result, $con))
        die('Error: ' . mysql_error());

    mysql_close($con);
    header("Location: /admin.php");
?>