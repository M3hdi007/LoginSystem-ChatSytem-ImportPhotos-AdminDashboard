<?php

if (!isset($_POST['username']) && !isset($_POST['password'])) {
	header('location:loginpage.php?bothunset=true');
}
else if (!isset($_POST['username']) || trim($_POST['username'])=="") {
	header('location:loginpage.php?usetunset=true');
}
else if (!isset($_POST['password'])|| trim($_POST['password'])=="") {
	header('location:loginpage.php?psdunset=true');
}
else{
	include 'connection.php';

	$usr=$_POST['username'];
	$psd=$_POST['password'];

	$sql="SELECT count(*) as total FROM `users` WHERE (Email ='".$usr."' AND Password = '".$psd."') OR (Username = '".$usr."' AND Password = '".$psd."');";

	$result=mysqli_query($conn,$sql);

    $data=mysqli_fetch_assoc($result);

    if ($data['total']==0) {
          // $sql="SELECT count(*) as mdp FROM `users` WHERE Email ='".$usr." or Username ='".$usr."';";
     $sql="SELECT count(*) as mdp FROM `users` WHERE Email ='".$usr."';";

	$result=mysqli_query($conn,$sql);

    $data=mysqli_fetch_assoc($result);

    $emailcounter=$data['mdp'];

    $sql="SELECT count(*) as usr FROM `users` WHERE Username ='".$usr."';";

	$result=mysqli_query($conn,$sql);

    $data=mysqli_fetch_assoc($result);

    $usercounter=$data['usr'];

    if ($usercounter==0 && $emailcounter==0) {
      header('location:loginpage.php?loginfailed=true');    
    }
    else{

    	header('location:loginpage.php?loginfailed=true');
    }

    	
    }
    else{
    	session_start();
    	$_SESSION['name']=$usr;
    	header('location:accueil.php?Fromlogin=true');

    }
}