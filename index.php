<?php
require_once 'Model/Project.php';
require_once 'Controller/Project.php';

$db = new mysqli("localhost", "root", "", "trelloware");
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$model = new Project_Model($db);
$controller = new Project_Controller($model);

$action = isset($_GET['action']) ? $_GET['action'] : '';


if ($action === 'add_project') {
    $controller->handleRequest();
} elseif ($action === 'edit_project') {
    $controller->editProject();
} elseif ($action === 'delete_project') {
    $controller->deleteProject();
} elseif ($action === 'add_task') {
    $controller->addTasks();
} elseif ($action === 'delete_task') {
    $taskID = $_GET['task_id'];
    $controller->deleteTask($taskID);
} elseif ($action === 'change_status') {
    $taskID = $_GET['task_id'];
    $status = $_GET['status'];
    $controller->updateTaskStatus($taskID, $status);
} else {
    echo "Invalid action.";
}
?>