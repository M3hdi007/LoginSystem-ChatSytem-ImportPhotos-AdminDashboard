<?php
include_once 'header.php';
$loginerreur="";
$loginerreur2="";
?>

<link rel="stylesheet" type="text/css" href="logincss.css">

<div class="Forms">
	<div class="form1">
		<h2>Login</h2>
		<form method="POST" action="loginchecker.php">
	         <input type="text" name="username" placeholder="username / Email .... ">
	         <input type="password" name="password" placeholder="Password">
	         <button type="submit">Log in !</button>
		</form>
		<div class="ErrorHandler" style="max-height: 10px;">
			<?php
						if (isset($_GET['bothunset'])||isset($_GET['usetunset'])||isset($_GET['psdunset'])) {

							if (isset($_GET['usetunset'])&&$_GET['usetunset']=="true") {
							$loginerreur="Merci d'entrer votre nom d'utulisateur correctement"; 
							}
							else if ($_GET['psdunset']=="true")	{
								$loginerreur="Merci d'entrer votre mot de passe correctement";
							}
                                 
			}
                  if (isset($_GET['loginfailed']) && $_GET['loginfailed']=="true") {
								$loginerreur="Mot depasse ou not utulisteur incorrect";
							}
							if (isset($_GET['Userunfound']) && $_GET['Userunfound']=="true" ) {
								$loginerreur="Cet utulisatuer n'est pas inscris";
							}
					
			echo '<p class="loginerreur" style="color:red; font-size="20px" max-height="50px";>'.$loginerreur.'</p>';
			?>
		</div>
	</div>

		<div class="form2">
			<h2>Sign Up</h2>
		<form method="POST" action="signupchecker.php">
		   <input type="text" name="Susername" placeholder="Username">
			<input type="text" name="Semail" placeholder="Email123@gmail.com">
			<input type="password" name="Spassword" placeholder="Password">
			<input type="password" name="Spassword2" placeholder="Re-Type Password ...">
			<button type="submit">Sign UP !</button>
		</form>
		<div class="ErrorHandler" style="max-height: 5px;">
		 <?php
		 if (isset($_GET['uncompletedata'])&&isset($_GET['uncompletedata'])=="true") {
		 	$loginerreur2="Please fill all the Signup Form";
		 }
		 if (isset($_GET['differentpasswords'])&&isset($_GET['differentpasswords'])=="true") {
		 	$loginerreur2="passwords non identical";
		 }
		  if (isset($_GET['emailindatabase'])&&isset($_GET['emailindatabase'])=="true") {
		 	$loginerreur2="Email deja inscris , Merci de changer l'email";
		 }
         if (isset($_GET['userindatabase'])&&isset($_GET['userindatabase'])=="true") {
		 	$loginerreur2="Username deja inscris , Merci de le changer";
		 }


		 echo '<p class="loginerreur" style="color:red; font-size="20px" max-height="50px";>'.$loginerreur2.'</p>';
		 ?>
		</div>
	</div>
</div>

<?php
include_once 'footer.php';
?>