<?php
require_once 'models/Question.php';
require_once 'models/Quiz.php';

class QuestionController
{
    public function index()
    {
        $quizId = $_GET['quizId'];
        $object = new Question();
        $object->setQuizId($quizId);
        $questionList = $object->getAllQuestionsByQuizId();

        require 'views/question/index.php';
    }

    public function create()
    {
        $quizId = $_GET['quizId'];
        require 'views/question/create.php';
    }

    public function store()
    {
        if (
            isset($_POST["quizId"]) &&
            isset($_POST["question"])
        ) {

            $question = new Question();
            $question->setQuizId($_POST["quizId"]);
            $question->setQuestion($_POST["question"]);

            $question->store();

            header('Location: index.php?controller=question&action=index&quizId=' . $_POST["quizId"]);
        }
    }

    public function edit()
    {
        $id = $_GET['id'];
        $quizId = $_GET['quizId'];

        $object = new Question();
        $object->setId($id);

        $question = $object->fetchQuestionById();
        require 'views/question/update.php';
    }

    public function save()
    {
        if (
            isset($_POST["id"]) &&
            isset($_POST["quizId"]) &&
            isset($_POST["question"])
        ) {

            $question = new Question();
            $question->setId($_POST["id"]);
            $question->setQuizId($_POST["quizId"]);
            $question->setQuestion($_POST["question"]);

            $question->save();

            header('Location: index.php?controller=question&action=index&quizId=' . $_POST["quizId"]);
        }
    }


    public function delete()
    {
        $id = $_GET['id'];
        $quizId = $_GET['quizId'];
        $question = new Question();

        $question->setId($id);
        $question->delete();

        header('Location: index.php?controller=question&action=index&quizId=' . $quizId);
    }
}
