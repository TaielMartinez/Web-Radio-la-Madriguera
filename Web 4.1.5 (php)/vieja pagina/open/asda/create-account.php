<!doctype html>
<html lang="en">
  <head>
    <title>Creando cuenta</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  </head>
<body>

	<div class="container">

		<?php

			$checkEmail = "SELECT * FROM users WHERE Email = '$_POST[email]' ";

			$result = $conn-> query($checkEmail);

			$count = mysqli_num_rows($result);

			if ($count == 1) {
			echo "el email esta en uso";
			} else {	
			
			$name = $_POST['name'];
			$email = $_POST['email'];
			$pass = $_POST['password'];
			
			$passHash = password_hash($pass, PASSWORD_DEFAULT);
			
			$query = "INSERT INTO users (Name, Email, Password) VALUES ('$name', '$email', '$pass')";

			if (mysqli_query($conn, $query)) {
				echo "cuenta creada!";		
				} else {
					echo "Error: " . $query . "<br>" . mysqli_error($conn);
				}	
			}	
			mysqli_close($conn);

		?>
	</div>
  </body>
</html>