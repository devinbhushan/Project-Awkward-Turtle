<?php
    session_start();
    $con = mysql_connect("localhost","awkwardt","Gx61JXuJpaU@");
    if (!$con)
    {
        die('Could not connect: ' . mysql_error());
    }
    mysql_select_db("awkwardt_schema", $con);

    //echo "SDFSDF" . $_SESSION['page'];
    if ($_SESSION['page'] == 1)
    {
        if ($_POST[user_email] == "")
        {
            echo "<script type=\"text/javascript\">window.alert(\"This email is not valid, please try again\");window.location.href='http://awkwardturtle.projects.cs.illinois.edu/FrontEnd/Signup.php';</script>";
        }
        else if ($_POST[pwd] == "")
        {
            echo "<script type=\"text/javascript\">window.alert(\"This password is not valid, please try again\");window.location.href='http://awkwardturtle.projects.cs.illinois.edu/FrontEnd/Signup.php';</script>";
        }
        else
        {
            $salt = "barrybonds";
            $toHash = $_POST['pwd'] . $salt;
            $toComp = md5($_POST['pwd'] . $salt);
            $sql= "INSERT INTO USERS (email, password, fname, lname, bMonth, bDay, bYear, gender)
            VALUES
            ('$_POST[user_email]','$toComp','$_POST[user_first]','$_POST[user_last]','$_POST[birthmonth]','$_POST[birthday]','$_POST[birthyear]', '$_POST[gender]')";
	
            $_SESSION[user] = $_POST[user_email];
            $_SESSION[pwd] = $toComp;

            if (!mysql_query($sql,$con))
            {
                echo "<script type=\"text/javascript\">window.alert(\"This email is already used, please try again\");window.location.href='http://awkwardturtle.projects.cs.illinois.edu/FrontEnd/Signup.php';</script>";
            }
	    else 
	    {
        	 $checkin = "Insert Into Checkins(Email, Count) VALUES ('$_POST[user_email]', '0')";
           	 mysql_query($checkin);
           	 header("Location: /FrontEnd/Subpages/Signuppages/Moreinfo.php");   
            }
        }
    }
    else if ($_SESSION['page'] == 2)
    {
        $movies = $_POST[movieSelect];
        $movie1 = $movies[0];
        $movie2 = $movies[1];
        $movie3 = $movies[2];

        $music = $_POST[musicSelect];
        $music1 = $music[0];
        $music2 = $music[1];
        $music3 = $music[2];

        $sports = $_POST[sportSelect];
        $sport1 = $sports[0];
        $sport2 = $sports[1];
        $sport3 = $sports[2];

        $major = $_POST[mymajor];
        $college = $_POST[mycollege];

        $hobbies = $_POST[hobbySelect];
        $hobby1 = $hobbies[0];
        $hobby2 = $hobbies[1];
        $hobby3 = $hobbies[2];

        $books = $_POST[bookSelect];
        $book1 = $books[0];
        $book2 = $books[1];
        $book3 = $books[2];

        $sql = "UPDATE USERS SET HomeState = '$_POST[user_state]', HomeCity = '$_POST[user_city]', Movies1 = '$movie1', Movies2 = '$movie2', Movies3 = '$movie3', Music1 = '$music1', Music2 = '$music2', Music3 = '$music3', Sports1 = '$sport1', Sports2 = '$sport2', Sports3 = '$sport3', Major = '$major', MajorSchool = '$college', Hobbies1 = '$hobby1', Hobbies2 = '$hobby2', Hobbies3 = '$hobby3', Book1 = '$book1', Book2 = '$book2', Book3 = '$book3' WHERE email = '$_SESSION[user]'";
        if (!mysql_query($sql,$con))
        {
            die('Error: ' . mysql_error());
        }
        header("Location: /FrontEnd/Subpages/Signuppages/Priorities.php");
    }
    else if ($_SESSION['page'] == 3)
    {
        $sql = "INSERT INTO Rankings (email, HomeTownPri, MusicPri, SportPri, MajorPri, HobbyPri, BookPri, MoviePri) VALUES ('$_SESSION[user]', '$_POST[hometownpri]', '$_POST[musicpri]', '$_POST[sportspri]', '$_POST[majorpri]', '$_POST[hobbiespri]', '$_POST[bookspri]', '$_POST[moviespri]')";

        //echo $sql;

        if (!mysql_query($sql,$con))
        {
            die('Error: ' . mysql_error());
        }

        $expire = time() + 60*60*24;
        $value = "/" . $_SESSION[user] . "/" . $_SESSION[pwd] . "/";
        //echo $value;
        setcookie("user", $value, $expire);
        //die("youdied!");
        header("Location: /FrontEnd/Subpages/Signuppages/Picture.php");
    }
    else
    {
        echo "You have definitely caused an error, please try again here:";
        echo "<a href='/FrontEnd/HomePage.php'>Back to Home</a>";
        session_destroy();
    }
    mysql_close($con);
?>