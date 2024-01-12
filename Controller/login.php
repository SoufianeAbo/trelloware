<?php
session_start();
include '../Model/connection.php';
require_once '../Model/User.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["emailLog"];
    $password = $_POST["passwordLog"];

    if (User::isValidCredentials($conn, $email, $password)) {
        User::initSession($conn, $email);
    } else {
        Header ("Location: ../login.php?incorrect");
    }
}

?>