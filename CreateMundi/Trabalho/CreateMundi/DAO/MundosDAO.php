<?php
Class MundosDAO
{
    public function cadastrar(MundosModel $model)
    {
        include_once '../Connection/Connection.php';
        $connection = new connection();
        $connection->fazConexao();
        $sql = "INSERT INTO mundos (nome,descricao,idUser) VALUES (?,?,?) ";
        $stmt = $connection->conn->prepare($sql);
        $stmt->bindValue(1,$model->nome);
        $stmt->bindValue(2,$model->descricao);
        $stmt->bindValue(3,$model->idUser);
        $res= $stmt->execute();
        if($res)
        {
            echo "<script>location.href='?page=mundos';</script>";
        }
        else
        {
            echo "<script>alert('Não foi possivel criar um novo mundo.');</script>";
            echo "<script>location.href='?page=mundos';</script>";
        }
        
    }

    public function editar(MundosModel $model)
    {
        include_once '../Connection/Connection.php';
        $connection = new connection();
        $connection->fazConexao();
         $sql = "UPDATE mundos SET nome=?,descricao=? WHERE id=?";
         $stmt = $connection->conn->prepare($sql);
         $stmt->bindValue(1,$model->nome);
         $stmt->bindValue(2,$model->descricao);
         $stmt->bindValue(3,$model->id);
         $res= $stmt->execute();
         if($res)
         {
             echo "<script>alert('Registro alterado com sucesso!');</script>";
             echo "<script>location.href='?page=mundos';</script>";
         }
         else
         {
             echo "<script>alert('Não foi possível realizar a alteração');</script>";
             echo "<script>location.href='?page=mundos';</script>";
         }

    }

    public function pegaMundoPeloId(int $Id)
    {
        include_once '../Connection/Connection.php';
        $connection = new connection();
        $connection->fazConexao();
        $sql= "SELECT * FROM mundos WHERE id=".$Id;
        $res = $connection->conn->query($sql);
        $row = $res->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    
    
    
    public function excluir(int $Id)
    {
        include_once '../Connection/Connection.php';
        $connection = new connection();
        $connection->fazConexao();
        $sql = "DELETE FROM mundos WHERE id=".$Id;
        $res = $connection->conn->query($sql);
        if($res)
        {
            echo "<script>location.href='?page=mundos';</script>";
        }
        else
        {
            echo "<script>alert('Não foi possível excluir o mundo.');</script>";
            echo "<script>location.href='?page=mundos';</script>";
        }

    }

    public function listarMundos($idUser)
    {   
        include_once 'Connection/Connection.php';
        $connection = new connection();
        $connection->fazConexao();
        $sql= "SELECT * FROM mundos WHERE idUser=".$idUser." ORDER BY nome";
        $row = $connection->conn->query($sql);
        return $row;
    }
}