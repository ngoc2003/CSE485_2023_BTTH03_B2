<?php
require_once 'config.php';

class Material {
    private $id;
    private $lessonId;
    private $title;
    private $filePath;
    private $created_at;
    private $updated_at;
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    public function getAllMaterialByLessonId() {
        $query = $this->db->prepare("SELECT * FROM materials WHERE lesson_id = :lessonId");
        $query->bindParam(':lessonId', $this->lessonId, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function store() {
        $query = $this->db->prepare('INSERT INTO materials (lesson_id, title, file_path) VALUES (:id, :title, :filePath)');
        $query->bindParam(':id', $this->lessonId, PDO::PARAM_INT);
        $query->bindParam(':title', $this->title, PDO::PARAM_STR);
        $query->bindParam(':filePath', $this->filePath, PDO::PARAM_STR);
        $query->execute();
    }

    public function delete()
    {
        $query = $this->db->prepare('DELETE FROM materials WHERE id = :id');
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        $query->execute();
    }

    public function fetchMaterialById() {
        $query = $this->db->prepare("SELECT * FROM materials WHERE id = :id");
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        $query->execute();
        
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    
    public function save() {
        $query = $this->db->prepare('Update materials set title = :title, file_path = :filePath WHERE id = :id');
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        $query->bindParam(':title', $this->title, PDO::PARAM_STR);
        $query->bindParam(':filePath', $this->filePath, PDO::PARAM_STR);
        $query->execute();
    }

    public function setLessonId($id) {
        $this->lessonId = $id;
    }
    public function setFilePath($filePath) {
        $this->filePath = $filePath;
    }
    public function setTitle($title) {
        $this->title = $title;
    }
    public function setId($id) {
        $this->id = $id;
    }
}
?>