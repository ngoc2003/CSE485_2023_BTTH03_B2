<?php
require_once 'config.php';

class Quizz
{
    private $id;
    private $lesson_id;
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

    public function store()
    {
        $query = $this->db->prepare('INSERT INTO quizzes (lesson_id, title, description) VALUES (:lesson_id, :title, :description)');
        $query->bindParam(':lesson_id', $this->lesson_id, PDO::PARAM_INT);
        $query->bindParam(':title', $this->title, PDO::PARAM_STR);
        $query->bindParam(':description', $this->description, PDO::PARAM_STR);
        $query->execute();
    }

    public function getAllQuizzes()
    {
        $query = $this->db->query('SELECT quizzes.*, lessons.title AS lessonTitle FROM quizzes INNER JOIN lessons ON quizzes.lesson_id = lessons.id');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update()
    {
        $query = $this->db->prepare('UPDATE quizzes SET title = :title, description = :description WHERE id = :id');
        $query->bindParam(':title', $this->title, PDO::PARAM_STR);
        $query->bindParam(':description', $this->description, PDO::PARAM_STR);
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        $query->execute();
    }

    public function delete()
    {
        $query = $this->db->prepare('DELETE FROM quizzes WHERE id = :id');
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        $query->execute();
    }


    public function setId($id)
    {
        $this->id = $id;
    }
    public function setCourseId($id)
    {
        $this->lesson_id = $id;
    }
    public function setTitle($title)
    {
        $this->title = $title;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getLesson_id()
    {
        return $this->lesson_id;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function setLesson_id($lesson_id)
    {
        $this->lesson_id = $lesson_id;

        return $this;
    }
}
