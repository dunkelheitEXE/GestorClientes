<?php
session_start();

$loggedIn = isset($_SESSION['user']);

require_once __DIR__ . "/../controllers/ClientController.php";
require_once __DIR__ . "/../controllers/UserController.php";

$controller = new ClientController();
$user = new UserController();

if(!isset($_SESSION['user'])) {
    $action = "login";
    switch ($action) {
        case 'login':
            $user->login();
            break;
        default:
            # code...
            break;
    }
} else {
    $action = $_GET['action'] ?? 'index';
    switch ($action) {
        case 'index':
            $controller->index();
            break;
        case 'create':
            $controller->create();
            break;
        case 'store':
            $controller->store();
            break;
        case 'edit':
            $controller->edit();
            break;
        case 'update':
            $controller->update();
            break;
        case 'delete':
            $controller->delete();
            break;
        case 'search':
            $controller->search();
            break;
        case 'logout':
            $user->logout();
            break;
        default:
            # code...
            echo "Web page not fund";
            break;
    }
}

?>