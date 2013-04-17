<?php include("/home/cs/awkwardt/public_html/password_protect.php"); ?>
<?php
    $con = mysql_connect("localhost", "awkwardt", "Gx61JXuJpaU@");
    if (!$con)
        die('Could not connect: ' . mysq_error());

    mysql_select_db("awkwardt_schema", $con);

    $result = mysql_query("SELECT * FROM Events");

    echo "<table>";

    while ($row = mysql_fetch_array($result))
    {
        echo "<tr>";
        echo "<td>" . $row['Time_Held'] . "</td>" . "<td>" . $row['Location'] . "</td>";
        echo "<tr>";
    }
    echo "</table>";
?>