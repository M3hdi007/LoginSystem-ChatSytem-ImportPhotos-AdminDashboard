<?php
session_start();
echo $_POST['comment'];
echo $_SESSION['name'];
include_once 'connection.php';

$sql1="SELECT id FROM `users` WHERE Username='".$_SESSION['name']."'";
$resultt=mysqli_query($conn,$sql1);

    $dataz=mysqli_fetch_row($resultt);

    $id=$dataz[0];

$sql2="INSERT INTO `chat`(`id`, `Comment`) VALUES ('".$id."','".$_POST['comment']."')";
$resultti=mysqli_query($conn,$sql2);

    if (isset($resultti)) {
    	header('location:accueil.php?Fromlogin=true');
    }