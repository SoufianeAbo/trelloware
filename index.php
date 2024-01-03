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
} else {
    echo "Invalid action.";
}
?>