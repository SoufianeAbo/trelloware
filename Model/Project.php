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

    public function updateProject($projectId, $name, $description, $image, $projectUser) {
        $name = $this->db->real_escape_string($name);
        $description = $this->db->real_escape_string($description);
        $projectUser = $this->db->real_escape_string($projectUser);
    
        $query = "UPDATE projects 
                  SET name = '$name', description = '$description', image = '$image', projectUser = '$projectUser'
                  WHERE id = $projectId";
        
        $result = $this->db->query($query);
    
        return $result;
    }

    public function getProjects($projectUser) {
        $projectUser = $this->db->real_escape_string($projectUser);

        $query = "SELECT * FROM projects WHERE projectUser = '$projectUser'";
        $result = $this->db->query($query);

        $projects = array();
        while ($row = $result->fetch_assoc()) {
            $projects[] = $row;
        }

        return $projects;
    }
}
?>