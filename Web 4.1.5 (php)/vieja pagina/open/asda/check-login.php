<?php
session_start();
?>

<!doctype html>
<html lang="en">
	<head>
		<title>Check Login and create session</title>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
		
			<?php
			// Connection info. file
			include 'conn.php';	
			
			// Connection variables
			$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

			// Check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			


			$email = $_POST['email']; 
			$password = $_POST['password'];
			
			$result = mysqli_query($conn, "SELECT Email, Password, Name FROM users WHERE Email = '$email'");
			
			$row = mysqli_fetch_assoc($result);
		
			if ($_POST['password'] === $row['Password']) {	
				
				$_SESSION['loggedin'] = true;
				$_SESSION['name'] = $row['Name'];
				$_SESSION['start'] = time();					
				
				echo true;	
			
			} else {
				echo false;		
			}
			?>
		</div>
	</body>
</html>