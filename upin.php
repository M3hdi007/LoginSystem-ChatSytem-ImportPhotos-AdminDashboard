<?php
session_start();
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
?>
<!DOCTYPE html>
<html>
<head>
	<title>Photo Upload</title>
	<link rel="stylesheet" type="text/css" href="ciso.css">
</head>
<body>
	<form method="POST" action="upin.php" enctype="multipart/form-data">
		
		<div>
			<input type="file" name="image">
		</div>

		<div>
			<textarea name="text" placeholder="say something"></textarea>
		</div>
           
         <div>
         	<input type="submit" name="upload">
         </div>
	</form>
	<div class="content">
		<?php
		$db=mysqli_connect("localhost","root","","photos");
		$sql="SELECT * FROM IMAGES";
		$result=mysqli_query($db,$sql);
		while ($row=mysqli_fetch_array($result)) {
			echo "<div class='dv'>";
			echo "<img src='images/".$row['image']."' style='height:200px; width:100px;'>";
			echo "<p>".$row['text']."</p>";
			echo "</div>";
			header('location:accueil.php?Fromlogin=true');
			
		}
		?>
	</div>

</body>
</html>