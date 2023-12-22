<?php
require_once 'models/Quizz.php';
require_once 'models/Lesson.php';

class QuizzController
{
    public function index()
    {

        $quizzModel = new Quizz();
        $quizzes = $quizzModel->getAllQuizzes();

        require 'views/quizz/index.php';
    }

    public function create()
    {
        $object = new Lesson();

        $lessonList = $object->getAllLesson();

        require 'views/quizz/create.php';
    }

    public function store()
    {
        if (
            isset($_POST["lessonId"]) &&
            isset($_POST["title"]) &&
            isset($_POST["id"])
        ) {
            $quizz = new Quizz();
            $quizz->setLessonId($_POST["lessonId"]);
            $quizz->setTitle($_POST["title"]);
            $quizz->setId($_POST["id"]);

            $quizz->store();

            header("Location: index.php?controller=quizz&action=index");
        }
    }

    public function edit()
    {

        $id = $_GET['id'];
        $object = new Quizz();
        $object->setId($id);

        $quizz = $object->getQuizzById();

        $object = new Lesson();

        $lessonList = $object->getAllLesson();

        require 'views/quizz/update.php';
    }

    public function update()
    {
        if (
            isset($_POST["title"]) &&
            isset($_POST["id"]) &&
            isset($_POST["lessonId"])
        ) {
            $quizz = new Quizz();

            $quizz->setId($_POST["id"]);
            $quizz->setTitle($_POST["title"]);
            $quizz->setLessonId($_POST["lessonId"]);
            
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
