<?php
require_once './Controller/dashboard.php';
require_once './Controller/Project.php';
require_once './Model/Project.php';
require_once './Model/User.php';

$firstName = $_SESSION["firstName"];
$lastName = $_SESSION["lastName"];
$email = $_SESSION["email"];
$phoneNumber = $_SESSION["phoneNum"];
$password = $_SESSION["password"];
$teamImage = $_SESSION['image'];

$userObj = new User($teamImage, $firstName, $lastName, $email, $password, $phoneNumber, 'user', 0);

$db = new mysqli('localhost', 'root', '', 'trelloware');
$model = new Project_Model($db);
$controller = new Project_Controller($model);

$projects = $controller->getProjects();

include './View/dashboardUser.php';
?>