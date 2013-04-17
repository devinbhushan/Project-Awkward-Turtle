<?php include("/home/cs/awkwardt/public_html/password_protect.php"); ?>
<html>
    <head>
        <title>Welcome to the admin page!</title>
    </head>
    <style type="text/css">
        #tableHeads {
		font-family: Helvectica;
		font-size: 17px;
		font-weight: bolder;
        }
        div {
            text-shadow: 1px 1px 3px #666666;
            border-radius: 11px;
            padding: 4px 4px 4px 30px;
        }
        .even {
            background-color:#ACD1E9;
        }
        .odd {
            background-color:#a2cd64;
        }
        body {
            background-color:whiteSmoke;
        }
        #current {
            background-color:#999;
            width:100%;
        }
        td {
            padding-right: 50px;
            padding-bottom:10px;
        }
    </style>
    <body>
        <h1> Welcome 
        <?php
            $con = mysql_connect("localhost", "awkwardt", "Gx61JXuJpaU@");
            mysql_select_db("awkwardt_schema", $con);
            $info = $_COOKIE["user"];
            $user = strtok ($info, "/");
            $pwd = strtok('/');
            $tempPwd2 = mysql_query("SELECT password from USERS WHERE email = '$user'");
            if($tempPwd2 === FALSE) {
                die(mysql_error()); // TODO: better error handling
            }
            //if ($tempPwd)
            $fetchUsr2 = mysql_fetch_row($tempPwd2);
            if ($fetchUsr2[0] == $pwd)
            {
                //Get first name
                $temp2 = mysql_query("SELECT fname from USERS WHERE email = '$user'");
                $fetchName2 = mysql_fetch_row($temp2);
                $fetchName2[0] = ucfirst($fetchName2[0]);
                echo $fetchName2[0];
            }
            else{
                //they hacked the cookie!
                mysql_error();
            }
            mysql_close($con);
        ?>
        </h1>
        <div class="odd">
            <h1>
                Insert Row
            </h1>
            <p id="subText">
                Enter following data to insert a row into the database
            </p>
            <form method="post" action="insert.php">
                Start Time <input type="text" name="time" />
                Location <input type="text" name="location" />
                Event Name <input type="text" name="event" />
                Event Creator <input type="text" name = "admin" />
                Location Type <input type="text" name="type" />
                <input type="submit" value="Submit" />
            </form>
        </div>
        <div class="even">
            <h1>
                Update Row
            </h1>
            <p id="subText">
                Enter any data you would like to update, any empty fields will remain unchanged
            </p>
            <form method="post" action="updateMe.php">
                <h2>
                    Current Values to Identify Data Entry
                </h2>
                Current Start Time <input type="text" name="currTime" />
                Current Event Creator <input type="text" name="currCreator" />
                <br />
                <h2>
                    Values to Update:
                </h2>
                Start Time <input type="text" name="updateTime" />
                Location <input type="text" name="updateLoc" />
                Event Name <input type="text" name="updateEvent" />
                Event Creator <input type="text" name="updateCreator" />
                Location Type <input type="text" name="updateType" />
                <input type="submit" value="Update" />
            </form>
        </div>
        <div class="odd">
            <h1>
                Remove Row
            </h1>
            <p id="subText">
                Enter the Start Time and Event Creator of the event you would like to remove from the database. Feel free to use the table below as a reference.
            </p>
            <form method="post" action="remove.php">
                Start Time <input type="text" name="removeKey1" />
                Event Creator <input type="text" name="removeKey2" />
                <input type="submit" value="Remove" />
            </form>
        </div>
        <div id = "current">
            <h1>
                Current Table
            </h1>
        <?php
                $con = mysql_connect("localhost", "awkwardt", "Gx61JXuJpaU@");
                if (!$con)
                    die('Could not connect: ' . mysq_error());

                mysql_select_db("awkwardt_schema", $con);
        
                $result = mysql_query("SELECT * FROM Events");
                if (mysql_num_rows($result) == 0)
                {
                    echo "<tr>";
                    echo "<td>" . "No data is currently in the table" . "</td>";
                    echo "</tr>";
                }
                else
                {
        ?>
        <table>
            <tr id="tableHeads">
                <td>Start Time</td>
                <td>Location</td>
                <td>Event Name</td>
                <td>Event Creator</td>
                <td>Location Type</td>
            </tr>
	<?php
                    while ($row = mysql_fetch_array($result))
                    {
                        echo "<tr>";
                        echo "<td>" . $row['Time_Held'] . "</td>" . "<td>" . $row['Location'] . "</td>" . "<td>" . $row['Event_Name'] . "</td>" . "<td>" . $row['Event_Creator'] . "</td>" . "<td>" . $row['Location_Name'] . "</td>";
                        echo "</tr>";
                    }
                }
        ?>
            </table>
        </div>
    </body>
    <a href="password_protect.php?logout=1">Logout</a>
</html>