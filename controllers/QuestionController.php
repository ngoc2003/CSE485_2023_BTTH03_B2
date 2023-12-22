<?php
require_once 'models/Question.php';

class QuestionController
{
    public function index()
    {
        $quizzId = $_GET['quizzId'];
        $object = new Question();
        $object->setQuizId($quizzId);

        $questionList = $object->getAllQuestionsByQuizId();

        require 'views/question/index.php';
    }

    public function create()
    {
        $quizzId = $_GET['quizzId'];

        require 'views/question/create.php';
    }

    public function store()
    {
        if (
            isset($_POST["quizzId"]) &&
            isset($_POST["question"])
        ) {

            $question = new Question();
            $question->setQuizId($_POST["quizzId"]);
            $question->setQuestion($_POST["question"]);

            $question->store();

            header('Location: index.php?controller=question&action=index&quizzId=' . $_POST["quizzId"]);
        }
    }

    public function update()
    {
        $id = $_GET['id'];
        $quizzId = $_GET['quizzId'];

        $object = new Question();
        $object->setId($id);

        $question = $object->fetchQuestionById();
        require 'views/question/update.php';
    }

    public function save()
    {
        if (
            isset($_POST["id"]) &&
            isset($_POST["quizzId"]) &&
            isset($_POST["question"])
        ) {

            $question = new Question();
            $question->setId($_POST["id"]);
            $question->setQuestion($_POST["question"]);

            $question->update();

            header('Location: index.php?controller=question&action=index&quizzId=' . $_POST["quizzId"]);
        }
    }


    public function delete()
    {
        $id = $_GET['id'];
        $quizzId = $_GET['quizzId'];
        $question = new Question();

        $question->setId($id);
        $question->delete();

        header('Location: index.php?controller=question&action=index&quizzId=' . $quizzId);
    }
}
