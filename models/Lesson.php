<?php
require_once 'config.php';

class Lesson {
    private $id;
    private $courseId;
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
        $query = $this->db->prepare('Update lessons set title = :title, description = :description where id =:id');
        $query->bindParam(':title', $this->title, PDO::PARAM_STR);
        $query->bindParam(':description', $this->description, PDO::PARAM_STR);
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        $query->execute();
    }

    public function getAllLesson() {
        $query = $this->db->query('select lessons.*, courses.title as courseTitle from lessons inner join courses on lessons.course_id = courses.id');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function store() {
        $query = $this->db->prepare('INSERT INTO lessons (course_id, title, description) VALUES (:id, :title, :description)');
        $query->bindParam(':id', $this->courseId, PDO::PARAM_STR);
        $query->bindParam(':title', $this->title, PDO::PARAM_STR);
        $query->bindParam(':description', $this->description, PDO::PARAM_STR);
        $query->execute();
    }

    public function getLessonById() {
        $query = $this->db->prepare("SELECT * FROM lessons WHERE id = :id");
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        $query->execute();
        
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function delete()
    {
        $query = $this->db->prepare('DELETE FROM lessons WHERE id = :id');
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        $query->execute();
    }

    public function setId($id) {
        $this->id = $id;
    }
    public function setCourseId($id) {
        $this->courseId = $id;
    }
    public function setTitle($title) {
        $this->title = $title;
    }
    public function setDescription($description) {
        $this->description = $description;
    }

}
?>
