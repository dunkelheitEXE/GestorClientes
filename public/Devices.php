<?php
session_start();

$loggedIn = isset($_SESSION['user']);

require_once __DIR__ . "/../controllers/DeviceController.php";
require_once __DIR__ . "/../controllers/UserController.php";

$controller = new DeviceController();
$user = new UserController();

if(!isset($_SESSION['user'])) {
    header("Location: /GestorClientes/public/index.php?action=login");
} else {
    $action = $_GET['action'] ?? 'index';
    switch ($action) {
        case 'index':
            $controller->devices();
            break;
        case 'create':
            $controller->create();
            break;
        case 'update':
            $controller->update();
            break;
        case 'edit':
            $controller->edit();
            break;
        case 'delete':
            $controller->delete();
            break;
        default:
            # code...
            echo "Web page not fund";
            break;
    }
}

?>