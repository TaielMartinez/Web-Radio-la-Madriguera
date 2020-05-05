<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Radio la Madriguera</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />
    <link href="src/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="src/css/celu.css">
    <link rel="stylesheet" href="src/css/flex.css">
    <link rel="stylesheet" href="src/css/color.css">
    <link rel="stylesheet" href="src/css/navbar.css">
    <link rel="stylesheet" href="src/css/reproductor.css">
    <link rel="stylesheet" href="src/css/vivo.css">

</head>
<body  class="color-bg-body">

    <div class="routes-navbar"></div>
    <div class="routes-mini_reproductor"></div>
    <div class="routes-vista"></div>


    <?php

        session_start();
        //echo '<script>const login = "unlogin"</script>';
        if($_POST){
            include 'src/php/db_connect.php';
            if($_POST['name']){

                $checkEmail = "SELECT * FROM users WHERE Email = '$_POST[email]' ";

                $result = $conn-> query($checkEmail);

                $count = mysqli_num_rows($result);

                if ($count == 1) {
                echo '<div class="alert alert-warning alert-dismissible fade show alert_login" role="alert">
                        <strong>El correo electronico ya esta registrado!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
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

            } else {

                $email = $_POST['email'];
                $password = $_POST['password'];
                
                $result = mysqli_query($conn, "SELECT Email, Password, Name FROM users WHERE Email = '$email'");
                
                $row = mysqli_fetch_assoc($result);
            
                if ($_POST['password'] === $row['Password']) {	
                    
                    $_SESSION['loggedin'] = true;
                    $_SESSION['name'] = $row['Name'];
                    $_SESSION['email'] = $row['Email'];
                    $_SESSION['start'] = time();

                    
                }

                echo '<div class="alert alert-warning alert-dismissible fade show alert_login" role="alert">
                        <strong>El correo electronico o la contraseña son incorrectas</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
            }
        }

        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){
            echo '<script>const login = "login"</script>';
        } else {
            echo '<script>const login = "unlogin"</script>';
        }
        
    ?>

    <audio  id="audio">
        <source class="audio_source" src="" type="audio/mpeg" preload="true"/>
    </audio>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="src/js/popper.min.js"></script>
    <script src="src/js/bootstrap.min.js"></script>
    <script src="src/js/player.js"></script>


    

    
</body>
</html>