<?php
require_once __DIR__ . "/../config/ConnectionDb.php";
class DeviceModel
{
    private $connection;

    public function __construct()
    {
        global $connection;
        $this->connection = $connection;
    }

    public function getAllDevices()
    {
        $query = "SELECT * FROM device";
        $stmt = $this->connection->query($query);
        $results = $stmt->fetch_all(MYSQLI_ASSOC);
        return $results;
    }

    public function getClients()
    {
        $query = "SELECT * FROM client";
        $results = $this->connection->query($query);
        return $results->fetch_all(MYSQLI_ASSOC);
    }

    public function createDevice($client, $type, $brand, $model, $serial, $date)
    {
        $query = "INSERT INTO device(client_id, type, brand, model, serial_number, purchase_date) VALUES(?, ?, ?, ?, ?, ?)";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param('isssss', $client, $type, $brand, $model, $serial, $date);
        return $stmt->execute();
    }

    public function getType()
    {
        $query = "SELECT COUNT(type) AS amount, type FROM device GROUP BY type";
        $stmt = $this->connection->query($query);
        $results = $stmt->fetch_all(MYSQLI_ASSOC);
        return $results;
    }

    public function updateDevice($client, $type, $brand, $model, $serial, $date, $device)
    {
        $query = "UPDATE device SET client_id = ?, type = ?, brand = ?, model = ?, serial_number = ?, purchase_date = ? WHERE device_id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param('isssssi', $client, $type, $brand, $model, $serial, $date, $device);
        return $stmt->execute();
    }

    public function getDeviceById($id)
    {
        $query = "SELECT * FROM device WHERE device_id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $results = $stmt->get_result();
        return $results->fetch_assoc();
    }

    public function delete($id)
    {
        $query = "DELETE FROM device WHERE device_id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
}
?>