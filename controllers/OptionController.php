<?php
require_once 'models/Question.php';
require_once 'models/Option.php';


class OptionController {
    public function index() {
        $id = $_GET['question_id'];
        $object = new Option();
       // $object->setId($id);
       // $OptionList = $object->getAllOptionByQuestion_id();
        
        require 'views/option/index.php';
    }
    
    public function create() {
        $question_id = $_GET['question_id'];
        require 'views/option/create.php';
    }

    public function store() {
        if (
            isset($_POST["question_id"]) &&
            isset($_POST["option"]) &&
            isset($_POST["is_correct"]) 
        ) {

            $Option = new Option();
            $Option->setQuestion_id($_POST["question_id"]);
            $Option->setOption($_POST["option"]);
            $Option->setIs_correct($_POST["is_correct"]);

            $Option->store();

            header('Location: index.php?controller=option&action=index&question_id=' . $_POST["question_id"]);
        }
    }

    public function edit() {
        $id = $_GET['id'];
        $question_id= $_GET['question_id'];

        $object = new Option();
        $object->setId($id);

        //$Option = $object->fetchOptionById();
        require 'views/option/update.php';
    }

    public function save() {
        if (
            isset($_POST["id"]) &&
            isset($_POST["option"]) &&
            isset($_POST["is_correct"]) 
        ) {

            $Option = new Option();
            $Option->setId($_POST["id"]);
            $Option->setOption($_POST["option"]);
            $Option->setIs_correct($_POST["is_correct"]);

            $Option->save();

            header('Location: index.php?controller=option&action=index&question_id=' . $_POST["question_id"]);
        }
    }

    public function delete()
    {
        $id = $_GET['id'];
        $question_id = $_GET['question_id'];
        $Option = new Option();

        $Option->setId($id);
        $Option->delete();

        header('Location: index.php?controller=option&action=index&question_id=' . $question_id);
    }

}
?>
