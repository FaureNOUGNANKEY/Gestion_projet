<?php
class Connection {
    private $host = "localhost";
    private $port= '3306';
    private $dbname = 'gestion_projet';
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->dbname . ";charset=utf8",
                $this->username,
                $this->password
            );
        } catch (Exception $e) {
            echo "Erreur connexion : " . $e->getMessage();
        }
        return $this->conn;
    }
}
?>