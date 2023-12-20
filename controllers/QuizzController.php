<?php
require_once 'models/Quizz.php';
require_once 'models/Lesson.php';

class QuizzController
{
    public function index()
    {

        $quizzModel = new Quizz();
        $quizzList = $quizzModel->getAllQuizzes();

        require 'views/quizz/index.php';
    }

    public function create()
    {
        $lessonId = $_GET['lesson_id'];
        require 'views/quizz/create.php';
    }

    public function store()
    {
        if (
            isset($_POST["lessonId"]) &&
            isset($_POST["title"]) &&
            isset($_POST["description"])
        ) {
            $quizz = new Quizz();
            $quizz->setLesson_id($_POST["lessonId"]);
            $quizz->setTitle($_POST["title"]);
            $quizz->setDescription($_POST["description"]);

            $quizz->store();

            header("Location: index.php?controller=quizz&action=index");
        }
    }

    public function edit()
    {

        $id = $_GET['id'];
        $quizz = new Quizz();
        $quizz->setId($id);

        require 'views/quizz/update.php';
    }

    public function update()
    {
        if (
            isset($_POST["title"]) &&
            isset($_POST["id"]) &&
            isset($_POST["description"])
        ) {
            $quizz = new Quizz();
            $quizz->setId($_POST["id"]);
            $quizz->setTitle($_POST["title"]);
            $quizz->setDescription($_POST["description"]);

            $quizz->update();

            header("Location: index.php?controller=quizz&action=index");
        }
    }

    public function delete()
    {
        $id = $_GET['id'];
        $quizz = new Quizz();
        $quizz->setId($id);
        $quizz->delete();

        header('Location: index.php?controller=quizz&action=index');
    }
}
