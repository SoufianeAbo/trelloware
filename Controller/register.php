<?php
session_start();

require_once '../Model/User.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["phoneNumber"];
    $password = $_POST["password"];
    $teamImage = $_FILES['teamImage'];

    $userObj = new User($teamImage, $firstName, $lastName, $email, $password, $phoneNumber, 'user', 0);
    $userObj->registerUser();
}
?>