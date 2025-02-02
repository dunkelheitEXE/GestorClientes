<?php
require_once __DIR__ . "/../config/ConnectionDb.php";
class UserModel {
    private $connection;

    public function __construct()
    {
        global $connection;
        $this->connection = $connection;
    }

    public function signup($name, $password) {
        $password_hashed = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT INTO user(name, password) VALUES(?,?)";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param('ss', $name, $password_hashed);
        return $stmt->execute();
    }

    public function login($name, $password) 
    {
        $query = "SELECT * FROM user WHERE name = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param('s', $name);
        $stmt->execute();
        $array = $stmt->get_result();
        $results = $array->fetch_assoc();
        if(password_verify($password, $results['password'])) {
            return $results;
        } else {
            return false;
        }
    }
}
?>