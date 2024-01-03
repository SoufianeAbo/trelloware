<?php
session_start();

require_once 'Model/Project.php';
require_once 'Controller/Project.php';

$db = new mysqli("localhost", "root", "", "trelloware");
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$model = new Project_Model($db);
$controller = new Project_Controller($model);

$controller->handleRequest();

?>
