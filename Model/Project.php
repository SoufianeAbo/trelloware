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

    public function deleteProject($projectId) {
        $projectId = $this->db->real_escape_string($projectId);
    
        $query = "DELETE FROM projects WHERE id = $projectId";
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

    public function insertTask($title, $status, $projectid, $deadline) {
        $title = $this->db->real_escape_string($title);
        $status = $this->db->real_escape_string($status);
        $projectid = $this->db->real_escape_string($projectid);

        $query = "INSERT INTO tasks (title, status, projectid, deadline) VALUES ('$title', '$status', '$projectid', '$deadline')";
        $result = $this->db->query($query);

        return $result;
    }

    public function getTasksByProjectId($projectId) {
        $projectId = $this->db->real_escape_string($projectId);
    
        $query = "SELECT * FROM tasks WHERE projectId = '$projectId'";
        $result = $this->db->query($query);
    
        $tasks = [];
    
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $tasks[] = $row;
            }
            $result->free_result();
        }
    
        return $tasks;
    }

    public function deleteTask($taskId) {
        $taskId = $this->db->real_escape_string($taskId);
    
        $query = "DELETE FROM tasks WHERE id = $taskId";
        $result = $this->db->query($query);
    
        return $result;
    }

    public function updateTaskStatus($taskId, $status) {
        $taskId = $this->db->real_escape_string($taskId);
        $status = $this->db->real_escape_string($status);
    
        $query = "UPDATE tasks
                  SET status = $status
                  WHERE id = $taskId";
        
        $result = $this->db->query($query);
    
        return $result;
    }
}
?>