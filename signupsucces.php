<?php
session_start();
        	if (!isset($_SESSION['user'])) {
        		header('location:loginpage.php?fromsignsucc=true');
        	}
else {
	$_SESSION['name']=$_SESSION['user'];
	header('location:accueil.php?Fromlogin=true');
}