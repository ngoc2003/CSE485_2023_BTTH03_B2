<?php
require_once 'models/Lesson.php';
require_once 'models/Material.php';


class MaterialController {
    public function index() {
        $id = $_GET['lessonId'];
        $object = new Material();
        $object->setLessonId($id);
        $materialList = $object->getAllMaterialByLessonId();
        
        require 'views/material/index.php';
    }
    
    public function create() {
        $lessonId = $_GET['lessonId'];
        require 'views/material/create.php';
    }

    public function store() {
        if (
            isset($_POST["lessonId"]) &&
            isset($_POST["title"]) &&
            isset($_POST["filePath"]) 
        ) {

            $material = new Material();
            $material->setLessonId($_POST["lessonId"]);
            $material->setTitle($_POST["title"]);
            $material->setFilePath($_POST["filePath"]);

            $material->store();

            header('Location: index.php?controller=material&action=index&lessonId=' . $_POST["lessonId"]);
        }
    }

    public function edit() {
        $id = $_GET['id'];
        $lessonId = $_GET['lessonId'];

        $object = new Material();
        $object->setId($id);

        $material = $object->fetchMaterialById();
        require 'views/material/update.php';
    }

    public function save() {
        if (
            isset($_POST["id"]) &&
            isset($_POST["title"]) &&
            isset($_POST["filePath"]) 
        ) {

            $material = new Material();
            $material->setId($_POST["id"]);
            $material->setTitle($_POST["title"]);
            $material->setFilePath($_POST["filePath"]);

            $material->save();

            header('Location: index.php?controller=material&action=index&lessonId=' . $_POST["lessonId"]);
        }
    }

    public function delete()
    {
        $id = $_GET['id'];
        $lessonId = $_GET['lessonId'];
        $material = new Material();

        $material->setId($id);
        $material->delete();

        header('Location: index.php?controller=material&action=index&lessonId=' . $lessonId);
    }

}
?>
