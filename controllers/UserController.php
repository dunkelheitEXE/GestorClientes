<?php
require_once __DIR__ . "/../models/UserModel.php";
class UserController {
    private $model;

    public function __construct()
    {
        $this->model = new UserModel;
    } 

    public function createUser() {
        $name = "Admin1";
        $password = "123";
        if($_SERVER['REQUEST_METHOD'] === "POST") {
            if($this->model->signup($name, $password)) {
                echo "<h1>Usuario creado</h1>";
            } else {
                echo "ALGO SALIO MAL";
            }
        }
        require __DIR__ . "/../public/views/Admins/login.php";
    }

    public function login() {
        if($_SERVER['REQUEST_METHOD'] === "POST") {
            $results = $this->model->login($_POST['user'], $_POST['password']);
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