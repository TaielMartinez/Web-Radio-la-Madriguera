<?php
/*
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "madriguera";
*/

/*
$servername = "localhost";
$username = "u381389111_php";
$password = "K9JhD]rS";
$dbname = "u381389111_madriguera";
*/


// Create connection

//  $conn = new mysqli("localhost", "root", "", "madriguera"); // local
    $conn = new mysqli("localhost", "u381389111_php", "K9JhD]rS", "u381389111_madriguera"); // server

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>