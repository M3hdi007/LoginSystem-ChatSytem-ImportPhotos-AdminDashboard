<?php

include_once 'connection.php';

$query='select * from users';
$resultat=mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="admincss.css">
	<title>Admin Page</title>
</head>
<body>

	<table>
		<thead>
			<th>Id</th>
            <th>Username</th>
            <th>Email</th>
		</thead>
		<?php
                 while ($row=mysqli_fetch_array($resultat)) {
                 		?>
                	<tr>
                		<td><?php echo $row['Id']; ?></td>
                		<td><?php echo $row['Username']; ?></td>
                		<td><?php echo $row['Email']; ?></td>
                		<td><a href="delete.php?Id=<?php echo $row['Id'];?>">Delete</a></td>

                	</tr>
                	<?php
                           }
                           ?>
	</table>

	<a href="accueil.php?Fromlogin=true">Go back</a>

</body>
</html>



