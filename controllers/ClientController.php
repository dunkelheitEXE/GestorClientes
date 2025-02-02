<?php
require_once __DIR__ . "/../models/ClientModel.php";
class ClientController 
{
    private $model;

    public function __construct ()
    {
        $this->model = new ClientModel;
    }

    //Mostrar clientes
    public function index()
    {
        $clients = $this->model->getAllClients();
        require_once __DIR__ . "/../public/views/clients/indexView.php";
    }

    public function create()
    {
        require_once __DIR__ . "/../public/views/clients/CreateClient.php";
    }

    public function store()
    {
        if(isset($_POST['submit'])) {
            $name = $_POST['name'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];

            if($this->model->createClient($name, $address, $phone, $email)) {
                header("Location: /GestorClientes/public/index.php?action=index");
            } else {
                echo '
                    <div class="alert alert-danger" role="alert">
                        Error: Something has gone wrong
                    </div>
                ';
            }
        }
    }

    public function edit()
    {
        $id = $_GET['id'];
        $client = $this->model->getClient($id);
        require_once __DIR__ . "/../public/views/clients/EditClient.php";
    }

    public function update()
    {
        if(isset($_POST['submit'])) {
            $name = $_POST['name'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $id = $_GET['id'];

            if($this->model->editClient($name, $address, $phone, $email, $id)) {
                header("Location: /GestorClientes/public/index.php?action=index");
            } else {
                echo '
                    <div class="alert alert-danger" role="alert">
                        Error: Something has gone wrong
                    </div>
                ';
            }
        }
    }

    public function delete() {
        $id = $_GET['id'];
        if($this->model->deleteClient($id)) {
            header('Location: /GestorClientes/public/index.php?action=index');
        } else {
            echo '
                <div class="alert alert-danger" role="alert">
                    Error: Something has gone wrong
                </div>
            ';
        }
    }

    public function search() 
    {
        if(isset($_GET['query'])) {
            $query = $_GET['query'];
            $clients = $this->model->searchClient($query);
            include __DIR__ . "/../public/views/clients/searchClient.php";
        } else {
            echo "Solicitud no valida";
        }
    }
}

?>