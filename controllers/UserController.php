<?php 
require_once 'models/User.php';
class UserController {
    public function index() {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $scheme = new User();
        $users = $scheme->getAll();
        
        require 'views/user/index.php';
    }

    public function login() {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $email = $_POST['email'];
        $password = $_POST['password'];

        $testUser = new User();
        $user = $testUser->getByEmail($email);

        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION["userid"] = $user['id'];
            header("Location: index.php?controller=dashboard&action=index");
            exit;
            return 1;
        } else {
            echo "Errr";
            return 0;
        }
    }

    public function store() {
        if (
            isset($_POST["email"]) &&
            isset($_POST["password"]) &&
            isset($_POST["name"])
        ) {
        
            $user = new User();
            $user->setEmail($_POST["email"]);
            $user->setPassword($_POST["password"]);
            $user->setName($_POST["name"]);

            $user->store();

            header('location: index.php?controller=user&action=index');
        }else {
            echo "NONO";
        }
    }

    public function save() {
        if (
            isset($_POST["email"]) &&
            isset($_POST["id"]) &&
            isset($_POST["name"])
        ) {
        
            $user = new User();
            $user->setEmail($_POST["email"]);
            $user->setName($_POST["name"]);
            $user->setId($_POST["id"]);

            $user->save();

            header('location: index.php?controller=user&action=index');
        }else {
            echo "NONO";
        }
    }

    public function edit() {
        $id = $_GET['id'];
        $temp = new User();
        $user = $temp->getById($id);

        require 'views/user/update.php';
    }

    public function create() {
        require 'views/user/create.php';
        
    }

    public function delete()
    {
        $id = $_GET['id'];
        $user = new User();
        $user->setId($id);
        $user->delete();
        header('Location: index.php?controller=user&action=index');
}}

?>