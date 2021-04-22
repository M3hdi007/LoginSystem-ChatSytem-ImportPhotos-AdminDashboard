<?php


include_once 'connection.php';

$sql="delete from users where id=".$_GET['Id'];
$resultat=mysqli_query($conn,$sql);

if ($resultat) {
	header('location:adminchecker.php');
}