<?php

require_once 'models/User.php';
require_once 'controllers/UserController.php';

class AuthController
{
    public function index()
    {
        require 'views/auth/index.php';
    }

    public function login () {
        $userController = new UserController();
        $userController->login();
    }

}
?>