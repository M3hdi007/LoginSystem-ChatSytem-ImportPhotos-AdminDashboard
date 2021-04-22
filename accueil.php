<?php
if (!isset($_GET['Fromlogin'])) {
	header('location:loginpage.php');
}


include_once 'header.php';
session_start();
if (!isset($_SESSION['name'])) {
	header('location:loginchecker.php');
	}
include_once 'connection.php';

$cssFile = "Accs.css";
echo "<link rel='stylesheet' href='" . $cssFile . "'>";


if (isset($_POST['upload'])) {
	$target="images/".basename($_FILES['image']['name']);
	$db=mysqli_connect("localhost","root","","photos");

	$image=$_FILES['image']['name'];
	$text=$_POST['text'];
	$sql="INSERT INTO images (image,text) VALUES ('$image','$text')";
	mysqli_query($db,$sql);

   	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) { 
		$msg="uploaded susccesfuly";
	}
	else{
		$msg=" not uploaded susccesfuly";
	}

}


$sql="SELECT Username from users where Username = '".$_SESSION['name']."' or Email = '".$_SESSION['name']."';";
$resultat=mysqli_query($conn,$sql);

$data=mysqli_fetch_assoc($resultat);

echo "<div class='Containerz'>";
echo "<div class='Part1'>";
echo "<div class='insidePart1'>";
echo "User : <a>".$data['Username']."</a>";
echo "</br><a href='loginpage.php'>"."Deconnexion"."</a>";

$sql5="SELECT id FROM users WHERE Username='".$data['Username']."'";
//$sql4="SELECT count(*) FROM `admin`";
$resulton=mysqli_query($conn,$sql5);
 $data3=mysqli_fetch_assoc($resulton);

//$sql4="SELECT count(*) as total FROM `admin` a INNER JOIN 'users' u ON a.id=u.Id WHERE u.Username='".$_SESSION['name']."'";
$io=$data3['id'];
$sql4="SELECT count(*) as total FROM admin WHERE id='".$io."'";
//$sql4="SELECT count(*) FROM `admin`";
$resulto=mysqli_query($conn,$sql4);
 $data2=mysqli_fetch_assoc($resulto);


if ($data2['total']!=0) {
	echo "</br><a href='adminchecker.php'>Go to admin portal </a>";
}

echo "</div>";
echo "</div>";
echo "<div class='Part2'>";
echo'<link rel="stylesheet" type="text/css" href="ciso.css">
 </head><body>	<form method="POST" action="upin.php" enctype="multipart/form-data">
		<div class="choose"><input type="file" name="image"></div><div><textarea name="text" placeholder="say something about your photo"></textarea></div>           
         <div><input type="submit" name="upload"></div></form><div class="content">';
		
		$db=mysqli_connect("localhost","root","","photos");
		$sql="SELECT * FROM IMAGES";
		$result=mysqli_query($db,$sql);
		while ($row=mysqli_fetch_array($result)) {
			echo "<div class='dv'>";
			echo "<img src='images/".$row['image']."' style='height:200px; width:100px;'>";
			echo "<p>".$row['text']."</p>";
			echo "</div>";
		}
$_SESSION['name']=$data['Username'];

echo "</div>";
echo "</div>";
echo "<div class='Part3'>";
echo '<form method="POST" action="commentinsert.php"><input type="text" name="comment" placeholder="Chat here"><input type="submit" name="confirm" value="comment"></form>';

echo "<div>";

$db=mysqli_connect("localhost","root","","login2");
		$sql="SELECT u.Username,c.Comment FROM `chat` as c INNER join users u on c.id=u.Id";
		$result=mysqli_query($db,$sql);
		while ($row=mysqli_fetch_array($result)) {
			echo "<div >";
			echo "<p>".$row['Username'].":".$row['Comment']."</p>";
			echo "</div>";
		}

echo "</div>";

echo "</div>";

include_once 'footer.php';


