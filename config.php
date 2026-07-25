<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "users_db";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}
        define('GOOGLE_CLIENT_ID', '');
        define('GOOGLE_CLIENT_SECRET', '');
        define('GOOGLE_REDIRECT_URI', 'http://localhost/WEB-TEST-MAIN/google-callback.php');
?>
