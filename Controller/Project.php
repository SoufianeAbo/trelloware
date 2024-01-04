<?php
session_start();

class Project_Controller {
    private $model;
    private $view;

    public function __construct($model) {
        $this->model = $model;
    }

    public function handleRequest() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['project_name'];
            $description = $_POST['project_description'];
            $image = $_FILES['project_image']['name'];
            $projectUser = $_SESSION['id'];

            $target_dir = "img/";
            $target_file = $target_dir . basename($image);
            move_uploaded_file($_FILES['project_image']['tmp_name'], $target_file);

            $result = $this->model->insertProject($name, $description, $target_file, $projectUser);

            if ($result) {
                $_SESSION['success_message'] = "Project successfully added!";
                Header ("Location: ../dashboardUser.php");
                exit;
            } else {
                echo "Error adding project to the database.";
            }
        } else {
            $this->view->render();
        }
    }

    public function editProject() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['project_name'];
            $description = $_POST['project_description'];
            $image = $_FILES['project_image']['name'];
            $projectUser = $_SESSION['id'];
            $projectId = $_POST['project_id'];

            $target_dir = "img/";
            $target_file = $target_dir . basename($image);
            move_uploaded_file($_FILES['project_image']['tmp_name'], $target_file);

            $result = $this->model->updateProject($projectId, $name, $description, $target_file, $projectUser);

            if ($result) {
                $_SESSION['success_message'] = "Project successfully added!";
                Header ("Location: ../dashboardUser.php");
                exit;
            } else {
                echo "Error adding project to the database.";
            }
        } else {
            $this->view->render();
        }
    }

    public function deleteProject() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $projectId = $_POST['project_id'];

            $result = $this->model->deleteProject($projectId);

            if ($result) {
                $_SESSION['success_message'] = "Project successfully added!";
                Header ("Location: ../dashboardUser.php");
                exit;
            } else {
                echo "Error adding project to the database.";
            }
        } else {
            $this->view->render();
        }
    }

    public function getProjects() {
        $result = $this->model->getProjects($_SESSION['id']);
        return $result;
    }

    public function addTasks() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['tasktitle'];
            $status = $_POST['status'];
            $projectUser = $_POST['projectid'];
            $deadline = $_POST['deadline'];

            $result = $this->model->insertTask($title, $status, $projectUser, $deadline);

            if ($result) {
                $_SESSION['success_message'] = "Project successfully added!";
                Header ("Location: ../dashboardUser.php?projectId=$projectUser");
                exit;
            } else {
                echo "Error adding project to the database.";
            }
        } else {
            $this->view->render();
        }
    }

    public function showTasks($projectId) {
        $tasks = $this->model->getTasksByProjectId($projectId);
    
        return $tasks;
    }

    public function deleteTask($taskId) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $this->model->deleteTask($taskId);
            $projectUser = $_POST['projectid'];

            if ($result) {
                $_SESSION['success_message'] = "Project successfully added!";
                Header ("Location: ../dashboardUser.php?projectId=$projectUser");
                exit;
            } else {
                echo "Error adding project to the database.";
            }
        } else {
            $this->view->render();
        }
    }
}
?>