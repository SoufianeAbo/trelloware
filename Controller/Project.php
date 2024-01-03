<?php
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
                Header ("Location: ../View/dashboardUser.php");
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