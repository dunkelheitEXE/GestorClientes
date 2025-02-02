<?php
require_once __DIR__ . "/../config/ConnectionDb.php";
class ClientModel 
{
    private $connection;

    public function __construct()
    {
        global $connection;
        $this->connection = $connection;
    }

    public function getAllClients()
    {
        $query = "SELECT * FROM client";
        $results = $this->connection->query($query);
        return $results->fetch_all(MYSQLI_ASSOC);
    }

    public function createClient($name, $address, $phone, $email)
    {
        $query = "INSERT INTO client(name, address, phone, email) VALUES (?, ?, ?, ?)";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param('ssss', $name, $address, $phone, $email);
        return $stmt->execute();
    }

    public function getClient($id)
    {
        $query = "SELECT * FROM client WHERE client_id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param('s', $id);
        $stmt->execute();
        $results = $stmt->get_result();
        return $results->fetch_assoc();
    }

    public function editClient($name, $address, $phone, $email, $id)
    {
        $query = "UPDATE client SET name = ?, address = ?, phone = ?, email = ? WHERE client_id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param('ssssi', $name, $address, $phone, $email, $id);
        return $stmt->execute();
    }

    public function deleteClient($id)
    {
        $query = "DELETE FROM client WHERE client_id = ?";
        $stmt =$this->connection->prepare($query);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }

    public function searchClient($search) 
    {
        $query = "SELECT * FROM client WHERE name LIKE ? or email LIKE ?";
        $stmt = $this->connection->prepare($query);
        $searchTerm = "%$search%";
        $stmt->bind_param('ss', $searchTerm, $seacrhTerm);
        $stmt->execute();
        $results = $stmt->get_result();
        return $results->fetch_all(MYSQLI_ASSOC);
    }

}
?>