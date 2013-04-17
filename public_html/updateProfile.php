<?php
    session_start();
    $con = mysql_connect("localhost","awkwardt","Gx61JXuJpaU@");
    if (!$con)
    {
        die('Could not connect: ' . mysql_error());
    }
    mysql_select_db("awkwardt_schema", $con);

    //echo "SDFSDF" . $_SESSION['page'];
    if ($_SESSION['updatePage'] == 1)
    {
        $currInfo = $_COOKIE["user"];
        $currEmail = strtok($currInfo, "/");
        $currPwd = strtok("/");

        $currRes = mysql_query("SELECT * FROM USERS WHERE email = " . "'" . $currEmail . "'");
        $row = mysql_fetch_array($currRes);
        //var_dump($row);
        $first = $_POST["user_first"];
        if ($first == "")
            $first = $row["fname"];
        $last = $_POST["user_last"];
        if ($last == "")
            $last = $row["lname"];
        $email = $_POST["user_email"];
        if ($email == "")
            $email = $currEmail;

        $newpwd = $_POST["pwd"];
        if ($newpwd == "")
            $newpwd = $currPwd;
        else
        {
            $newpwd = md5($_POST["pwd"]);
            $expire = time() + 60*60*24;
            $value = "/" . $enteredUsr . "/" . $newpwd . "/";
            setcookie("user", "", 1); // delete old cookie
            setcookie("user", $value, $expire); //set new cookie
        }

        $byear = $_POST["birthyear"];
        if ($byear == "")
            $byear = $row["bYear"];
        $bMonth = $_POST["birthmonth"];
        if ($bmonth == "")
            $bmonth = $row["bMonth"];
        $bDay = $_POST["birthday"];
        if ($bday == "")
            $bday = $row["bDay"];

        $result = "UPDATE USERS SET email = '$email', password = '$newpwd', fname = '$first', lname = '$last', bMonth = '$bMonth', bDay = '$bDay', bYear = '$byear' WHERE (email = '$currEmail')";

        if (!mysql_query($result))
        {
            die('Error: ' . mysql_error());
        }
        //var_dump($result);
        header("Location: /FrontEnd/Subpages/Profilespages/Editmoreinfo.php");
    }
    else if ($_SESSION['updatePage'] == 2)
    {
        $currInfo = $_COOKIE["user"];
        $currEmail = strtok($currInfo, "/");
        $currPwd = strtok("/");

        $currRes = mysql_query("SELECT * FROM USERS WHERE email = " . "'" . $currEmail . "'");
        $row = mysql_fetch_array($currRes);

        $movies = $_POST[movieSelect];
        if (count($movies) == 0)
        {
            $movies = array($row["Movies1"], $row["Movies2"], $row["Movies3"]);
        }
        $movie1 = $movies[0];
        $movie2 = $movies[1];
        $movie3 = $movies[2];

        $music = $_POST[musicSelect];
        if (count($music) == 0)
        {
            $music = array($row["Music1"], $row["Music2"], $row["Music3"]);
        }
        $music1 = $music[0];
        $music2 = $music[1];
        $music3 = $music[2];

        $sports = $_POST[sportSelect];
        if (count($sports) == 0)
        {
            $sports = array($row["Sports1"], $row["Sports2"], $row["Sports3"]);
        }
        $sport1 = $sports[0];
        $sport2 = $sports[1];
        $sport3 = $sports[2];

        $major = $_POST[mymajor];
        if ($major == "")
            $major = $row["Major"];

        $college = $_POST[mycollege];
        if ($college == "")
            $college = $row["MajorSchool"];

        $hobbies = $_POST[hobbySelect];
        if (count($hobbies) == 0)
        {
            $hobbies = array($row["Hobbies1"], $row["Hobbies2"], $row["Hobbies3"]);
        }
        $hobby1 = $hobbies[0];
        $hobby2 = $hobbies[1];
        $hobby3 = $hobbies[2];

        $books = $_POST[bookSelect];
        if (count($books) == 0)
        {
            $books = array($row["Book1"], $row["Book2"], $row["Book3"]);
        }
        $book1 = $books[0];
        $book2 = $books[1];
        $book3 = $books[2];

        $state = $_POST[user_state];
        if ($state == "")
            $state = $row["HomeState"];

        $city = $_POST[user_city];
        if ($city == "")
            $city = $row["HomeCity"];

        $sql = "UPDATE USERS SET HomeState = '$state', HomeCity = '$city', Movies1 = '$movie1', Movies2 = '$movie2', Movies3 = '$movie3', Music1 = '$music1', Music2 = '$music2', Music3 = '$music3', Sports1 = '$sport1', Sports2 = '$sport2', Sports3 = '$sport3', Major = '$major', MajorSchool = '$college', Hobbies1 = '$hobby1', Hobbies2 = '$hobby2', Hobbies3 = '$hobby3', Book1 = '$book1', Book2 = '$book2', Book3 = '$book3' WHERE email = '$currEmail'";
        //var_dump($sql);
        if (!mysql_query($sql,$con))
        {
            die('Error: ' . mysql_error());
        }
        header("Location: /FrontEnd/Subpages/Profilespages/Editpriorities.php");
    }
    else if ($_SESSION['updatePage'] == 3)
    {
        $currInfo = $_COOKIE["user"];
        $currEmail = strtok($currInfo, "/");
        $currPwd = strtok("/");

        $currRes = mysql_query("SELECT * FROM Rankings WHERE email = " . "'" . $currEmail . "'");
        $fetchUser = mysql_fetch_array($currRes);
          
        $htpri = $_POST[hometownpri];
        if ($htpri == "")  
            $htpri = $fetchUser["HomeTownPri"];

        $mopri = $_POST[moviespri];
        if($mopri == "")
            $mopri = $fetchUser["MoviePri"];

        $mupri = $_POST[musicpri];
        if ($mupri == "")
            $mupri = $fetchUser["MusicPri"];

        $spri = $_POST[sportspri];
        if ($spri == "")
            $spri = $fetchUser["SportPri"];
        
        $mapri = $_POST[mapri];
        if ($mapri == "")
            $mapri = $fetchUser["MajorPri"];
        
        $hpri = $_POST[hobbiespri];
        if ($hpri == "")
            $hpri = $fetchUser["HobbyPri"];
        
        $bpri = $_POST[bookspri];
        if ($bpri == "")
            $bpri = $fetchUser["BookPri"];

        $sql = "UPDATE Rankings SET HomeTownPri = '$htpri', MoviePri = '$mopri', MusicPri = '$mupri', SportPri = '$spri', MajorPri = '$mapri', HobbyPri = '$hpri', BookPri = '$bpri' WHERE email = '$currEmail'";

        //var_dump($sql);

        if (!mysql_query($sql,$con))
        {
            die('Error: ' . mysql_error());
        }

        header("Location: /FrontEnd/HomePage.php"); ///FrontEnd/Subpages/Profilespages/Editpicture.php");
    }
    else
    {
        echo "You have definitely caused an error, please try again here:";
        echo "<a href='/FrontEnd/HomePage.php'>Back to Home</a>";
        session_destroy();
    }
    mysql_close($con);
?>