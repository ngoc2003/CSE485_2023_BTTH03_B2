<?php
require_once 'models/Question.php';
require_once 'models/Option.php';


class OptionController {
    public function index() {
        $object = new Option();
        $optionList = $object->getAllOption();

        require 'views/option/index.php';
    }
    
    public function create() {
        $object = new Question();

        $questions = $object->getAllQuestions();
        
        require 'views/option/create.php';
    }

    public function store() {
        if (
            isset($_POST["questionId"]) &&
            isset($_POST["option"]) &&
            isset($_POST["is_correct"]) 
        ) {

            $option = new Option();
            $option->setQuestion_id($_POST["questionId"]);
            $option->setOption($_POST["option"]);
            $option->setIs_correct($_POST["is_correct"]);

            $option->store();
            header('location: index.php?controller=option&action=index');
        }
    }

    public function edit() {
        $id = $_GET['id'];

        $object = new Option();
        $object->setId($id);

        $option = $object->getOptionById();

        require 'views/option/update.php';
    }

    public function save() {
        if (
            isset($_POST["id"]) &&
            isset($_POST["option"]) &&
            isset($_POST["is_correct"]) 
        ) {

            $option = new Option();
            $option->setId($_POST["id"]);
            $option->setOption($_POST["option"]);
            $option->setIs_correct($_POST["is_correct"]);

            $option->save();
            header('location: index.php?controller=option&action=index');
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
