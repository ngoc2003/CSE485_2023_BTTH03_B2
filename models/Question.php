<?php
require_once 'config.php';

class Question
{
    private $id;
    private $quiz_id;
    private $question;
    private $created_at;
    private $updated_at;
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getAllQuestions() {
        $query = $this->db->prepare('SELECT * FROM questions');
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function store()
    {
        $query = $this->db->prepare('INSERT INTO questions (quiz_id, question) VALUES (:quiz_id, :question)');
        $query->bindParam(':quiz_id', $this->quiz_id, PDO::PARAM_INT);
        $query->bindParam(':question', $this->question, PDO::PARAM_STR);
        $query->execute();
    }

    public function getAllQuestionsByQuizId()
    {
        $query = $this->db->prepare('SELECT * FROM questions WHERE quiz_id = :quiz_id');
        $query->bindParam(':quiz_id', $this->quiz_id, PDO::PARAM_INT);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update()
    {
        $query = $this->db->prepare('UPDATE questions SET question = :question WHERE id = :id');
        $query->bindParam(':question', $this->question, PDO::PARAM_STR);
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        $query->execute();
    }

    public function delete()
    {
        $query = $this->db->prepare('DELETE FROM questions WHERE id = :id');
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        $query->execute();
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setQuizId($quiz_id)
    {
        $this->quiz_id = $quiz_id;

        return $this;
    }

    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    public function fetchQuestionById()
    {
        $query = $this->db->prepare('SELECT * FROM questions WHERE id = :id');
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getQuizId()
    {
        return $this->quiz_id;
    }
    public function getQuestion()
    {
        return $this->question;
    }
};
