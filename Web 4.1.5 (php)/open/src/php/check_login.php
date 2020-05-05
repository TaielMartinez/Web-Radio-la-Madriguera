<?php

    include 'db_connect.php';

    $email = $_POST['email']; 
    $password = $_POST['password'];
    
    $result = mysqli_query($conn, "SELECT Email, Password, Name FROM users WHERE Email = '$email'");
    
    $row = mysqli_fetch_assoc($result);

    if ($_POST['password'] === $row['Password']) {	
        
        $_SESSION['loggedin'] = true;
        $_SESSION['name'] = $row['Name'];
        $_SESSION['email'] = $row['Email'];
        $_SESSION['start'] = time();					
        
        echo 'true';
    
    } else {
        echo 'false';
    }

?>