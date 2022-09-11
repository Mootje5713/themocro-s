<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "themocros";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (
    !isset($_SESSION['user_id']) && $_SERVER['REQUEST_URI'] != '/themocros-s/login.php'
    && $_SERVER['REQUEST_URI'] != '/themocros-s/register.php'
    && $_SERVER['REQUEST_URI'] != '/themocros-s/index.php'
) {
    header("Location: index.php");
}


?>