<?php
require_once './Controller/dashboard.php';
require_once './Controller/Project.php';
require_once './Model/Project.php';
require_once './Model/User.php';

if (!isset($_SESSION['id'])) {
    Header ("Location: login.php");
    exit;
}

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
$projectId = isset($_GET['projectId']) ? $_GET['projectId'] : null;
$sortByDeadline = isset($_GET['sortByDeadline']) ? $_GET['sortByDeadline'] : null;

if ($projectId) {
    if ($sortByDeadline) {
        $tasks = $controller->showTasksDeadline($_GET['projectId']);
    } else {
        $tasks = $controller->showTasks($_GET['projectId']);
    }

    $tasksByStatus = [
        0 => [],
        1 => [],
        2 => []
    ];
    
    foreach ($tasks as $task) {
        $tasksByStatus[$task['status']][] = $task;
    }
    
}

include './View/dashboardUser.php';
?>