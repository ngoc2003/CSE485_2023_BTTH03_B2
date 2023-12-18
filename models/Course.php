<?php
require_once 'config.php';

class Course {
    private $id;
    private $title;
    private $description;
    private $created_at;
    private $updated_at;
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function save() {
        $query = $this->db->prepare('Update courses set title = :title, description = :description where id =:id');
        $query->bindParam(':title', $this->title, PDO::PARAM_STR);
        $query->bindParam(':description', $this->description, PDO::PARAM_STR);
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        $query->execute();
    }

    public function getAllCourses() {
        $query = $this->db->query('select * from courses');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCourseById($courseId) {
        $query = $this->db->prepare('SELECT * FROM courses WHERE id = :id');
        $query->bindParam(':id',$courseId, PDO::PARAM_INT);
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function store() {
        $query = $this->db->prepare('INSERT INTO courses (title, description) VALUES (:title, :description)');
        $query->bindParam(':title', $this->title, PDO::PARAM_STR);
        $query->bindParam(':description', $this->description, PDO::PARAM_STR);
        $query->execute();
    }

    public function delete()
    {
        $query = $this->db->prepare('DELETE FROM courses WHERE id = :id');
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);

        
        $query->execute();
    }

    public function setId($id) {
        $this->id = $id;
    }
    public function setTitle($title) {
        $this->title = $title;
    }
    public function setDescription($description) {
        $this->description = $description;
    }

}
?>
