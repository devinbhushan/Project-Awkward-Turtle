<?php
	foreach ($_COOKIE as $name => $value) {
	    setcookie("user", "", 1);
	}
	//var_dump($_COOKIE);
	header("Location: /home.php");
?>