<?php
class Connection
{
    public function fazConexao()
    {
       try {
            $conn;
            $dsn = "mysql:host=localhost:3306;dbname=createmundi";
            $this->conn = new PDO($dsn, 'root', '');
        } 
        catch (PDOException $e) {
            echo "Erro na conexão: " . $e->getMessage();
        }
    } 
}