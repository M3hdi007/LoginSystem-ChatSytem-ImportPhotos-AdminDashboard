<?php
include_once 'connection.php';

if (trim($_POST['Susername'])=="" || trim($_POST['Semail'])=="" ||trim($_POST['Spassword'])==""||trim($_POST['Spassword2'])=="") {
	header('location:loginpage.php?uncompletedata=true');
}
else 
{
	 if (trim($_POST['Spassword'])!=trim($_POST['Spassword2'])) {
	 	header('location:loginpage.php?differentpasswords=true');
	 }
	 else{


	$sql="SELECT count(*) as total FROM `users` WHERE Email = '".$_POST['Semail']."';";
	$result = mysqli_query($conn,$sql);
	$data = mysqli_fetch_assoc($result);

	$emailcounter=$data['total'];

	$sql2="SELECT count(*) as total FROM `users` WHERE Username = '".$_POST['Susername']."';";
	$result2 = mysqli_query($conn,$sql2);
	$data2 = mysqli_fetch_assoc($result2);

	$usernamecounter=$data2['total'];
	
	if ($emailcounter!=0) {
		header('location:loginpage.php?emailindatabase=true');
	}
	else if ($usernamecounter!=0){
         header('location:loginpage.php?userindatabase=true');
	}
	else {

        $sql="INSERT INTO `users`(`Username`, `Email`, `Password`) VALUES ('".$_POST['Susername']."','".$_POST['Semail']."','".$_POST['Spassword']."')";
        if (mysqli_query($conn,$sql)) {
        	session_start();
        	$_SESSION['user']=$_POST['Susername'];

        	header('location:signupsucces.php');
        }


		
	}

 		 }

	
}