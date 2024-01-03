<?php
class Project_Model {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function insertProject($name, $description, $image, $projectUser) {
        $name = $this->db->real_escape_string($name);
        $description = $this->db->real_escape_string($description);
        $projectUser = $this->db->real_escape_string($projectUser);

        $query = "INSERT INTO projects (name, description, image, projectUser) VALUES ('$name', '$description', '$image', '$projectUser')";
        $result = $this->db->query($query);

        return $result;
    }
}
?>