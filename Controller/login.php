<?php
session_start();
include '../Model/connection.php';
require_once '../Model/User.php';

User::checkAuthentication();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["emailLog"];
    $password = $_POST["passwordLog"];

    if (User::isValidCredentials($conn, $email, $password)) {
        User::initSession($conn, $email);
    } else {
        echo "<p class = 'text-red-300'>Invalid username or password.</p>";
    }
}

?>