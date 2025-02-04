<?php
require_once __DIR__ . "/../models/DeviceModel.php";
class DeviceController
{
    private $model;

    public function __construct()
    {
        $this->model = new DeviceModel;
    }

    public function devices()
    {
        $devices = $this->model->getAllDevices();
        $types = $this->model->getType();
        require_once __DIR__ . "/../public/views/devices/devices.php";
    }

    public function create()
    {
        $available = $this->model->getClients();
        if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['submit'])) {
            $client = $_POST['client'];
            $type = $_POST['type'];
            $brand = $_POST['brand'];
            $model = $_POST['model'];
            $serial = $_POST['serial'];
            $date = $_POST['date'];

            if($this->model->createDevice($client, $type, $brand, $model, $serial, $date)) {
                header("Location: /GestorClientes/public/Devices.php");
            } else {
                echo '
                    <div class="alert alert-danger" role="alert">
                        Error: Something has gone wrong
                    </div>
                ';
            }

        }

        require_once __DIR__ . "/../public/views/devices/CreateDevice.php";
    }

    public function update()
    {
        $id = $_GET['id'];
        $clients = $this->model->getClients();
        $data = $this->model->getDeviceById($id);
        require __DIR__ . "/../public/views/devices/UpdateDevice.php";
    }

    public function edit() 
    {
        if($_SERVER['REQUEST_METHOD'] === "POST" && $_POST['submit']){
            $id = $_GET['id'];
            $client = $_POST['client'];
            $type = $_POST['type'];
            $brand = $_POST['brand'];
            $model = $_POST['model'];
            $serial = $_POST['serial'];
            $date = $_POST['date'];
            if($this->model->updateDevice($client, $type, $brand, $model, $serial, $date, $id)){
                header('Location: /GestorClientes/public/Devices.php?action=index');
            } else {
                '
                    <div class="alert alert-danger" role="alert">
                        Error: Something has gone wrong
                    </div>
                ';
            }
        }
    }

    public function delete()
    {
        if($this->model->delete($_GET['id'])) {
            header('Location: /GestorClientes/public/Devices.php?action=index');
        } else {
            echo "No";
        }
    }
}
?>