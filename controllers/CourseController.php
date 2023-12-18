<?php

require_once 'models/Course.php';
// require_once 'models/CourseUserController.php';

class CourseController {

    public function index() {
        $object = new Course();
        $courses = $object->getAllCourses();

        require 'views/course/index.php';
    }

    public function edit() {
        $id = $_GET['id'];
        $temp = new Course();
        $course = $temp->getCourseById($id);

        require 'views/course/update.php';
    }

    public function store() {
        if (
            isset($_POST["title"]) &&
            isset($_POST["description"]) 
        ) {
        
            $course = new Course();
            $course->setTitle($_POST["title"]);
            $course->setDescription($_POST["description"]);

            $course->store();

            header('location: index.php?controller=course&action=index');
        }else {
            echo "NONO";
        }
    }
    
    public function create() {
        require 'views/course/create.php';
        
    }

    public function showCourseDetails($courseId) {
        $object = new Course();

        $course = $object->getCourseById($courseId);

        require 'views/course/details.php'; 
    }

    public function save() {
        if (
            isset($_POST["title"]) &&
            isset($_POST["id"]) &&
            isset($_POST["description"])
        ) {
        
            $object = new Course();
            $object->setTitle($_POST["title"]);
            $object->setDescription($_POST["description"]);
            $object->setId($_POST["id"]);

            $object->save();

            header('location: index.php?controller=course&action=index');
        }else {
            echo "NONO";
        }
    }

    public function delete()
    {
        $id = $_GET['id'];
        $course = new Course();
        $course->setId($id);
        $course->delete();
        header('Location: index.php?controller=course&action=index');
    }

}
?>
