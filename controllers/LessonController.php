<?php
require_once 'models/Lesson.php';
require_once 'models/Course.php';


class LessonController {
    public function index() {
        $id = $_GET['id'];
        $object = new Lesson();
        $lessonList = $object->getAllLesson();
        
        require 'views/lesson/index.php';
    }

    public function edit() {
        $id = $_GET['id'];
        $temp = new Lesson();
        $temp->setId($id);
        $lesson = $temp->getLessonById();

        require 'views/lesson/update.php';
    }
    
    public function create() {
        
        $object = new Course();
        $courseList = $object->getAllCourses();
        require 'views/lesson/create.php';
    }

    public function store() {
        if (
            isset($_POST["courseId"]) &&
            isset($_POST["title"]) &&
            isset($_POST["description"]) 
        ) {
        
            $lesson = new Lesson();
            $lesson->setCourseId($_POST["courseId"]);
            $lesson->setTitle($_POST["title"]);
            $lesson->setDescription($_POST["description"]);

            $lesson->store();

            header('location: index.php?controller=lesson&action=index');
        }
    }

    public function save() {
        if (
            isset($_POST["title"]) &&
            isset($_POST["id"]) &&
            isset($_POST["description"])
        ) {
        
            $object = new Lesson();
            $object->setTitle($_POST["title"]);
            $object->setDescription($_POST["description"]);
            $object->setId($_POST["id"]);

            $object->save();

            header('location: index.php?controller=lesson&action=index');
        }
    }

    public function delete()
    {
        $id = $_GET['id'];
        $lesson = new Lesson();
        $lesson->setId($id);
        $lesson->delete();
        header('Location: index.php?controller=lesson&action=index');
    }

}
?>
