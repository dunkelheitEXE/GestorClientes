<?php
require_once __DIR__ . "/../models/UserModel.php";
class UserController {
    private $model;

    public function __construct()
    {
        $this->model = new UserModel;
    } 

    public function createUser() {
        if($_SERVER['REQUEST_METHOD'] === "POST") {
            $name = $_POST['user'];
            $password = $_POST['password'];
            if($this->model->signup($name, $password)) {
                echo "<h1>Usuario creado</h1>";
            } else {
                echo "<h1>ALGO SALIO MAL</h1>";
            }
        }
        require __DIR__ . "/../public/views/Admins/Signup.php";
    }

    public function login() {
        if($_SERVER['REQUEST_METHOD'] === "POST") {
            $user = $_POST['user'];
            $password = $_POST['password'];
            $results = $this->model->login($user, $password);
            $_SESSION['user'] = $results['id'];
            header("Location: /GestorClientes/public/index.php?action=index");
        }
        require __DIR__ . "/../public/views/Admins/login.php";
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header('Location: /GestorClientes/public/index.php?action=login');
    }
}
?>