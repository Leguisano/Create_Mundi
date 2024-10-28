<?php
class FaccoesDAO
{
    public function cadastrar(FaccoesModel $model)
    {
        include_once '../Connection/Connection.php';
        $connection = new Connection();
        $connection->fazConexao();
        $sql = "INSERT INTO faccoes (nome,descricao,idMundo) VALUES (?,?,?) ";
        $stmt = $connection->conn->prepare($sql);
        $stmt->bindValue(1,$model->nome);
        $stmt->bindValue(2,$model->descricao);
        $stmt->bindValue(3,$model->idMundo);    
        $res= $stmt->execute();
        if($res)
        {
            echo "<script>location.href='?page=faccoes';</script>";
        }
        else
        {
            echo "<script>alert('Não foi possível criar a facção.');</script>";
            echo "<script>location.href='?page=faccoes';</script>";
        }
        
    }

    public function editar(FaccoesModel $model)
    {
        include_once '../Connection/Connection.php';
        $connection = new Connection();
        $connection->fazConexao();
        $sql = "UPDATE faccoes Set nome=?, descricao=? Where id=? ";
        $stmt = $connection->conn->prepare($sql);
        $stmt->bindValue(1,$model->nome);
        $stmt->bindValue(2,$model->descricao);
        $stmt->bindValue(3,$model->id);
        $res= $stmt->execute();
        if($res)
        {
            echo "<script>location.href='?page=faccoes';</script>";
        }
        else
        {
            echo "<script>alert('Não foi possível realizar a alteração.');</script>";
            echo "<script>location.href='?page=faccoes';</script>";
			}

    }

    public function pegaFaccaoPeloId(int $Id)
    {
        include_once '../Connection/Connection.php';
        $connection = new Connection();
        $connection->fazConexao();
        $sql= "SELECT * FROM faccoes WHERE id=".$Id;
        $res = $connection->conn->query($sql);
        $row = $res->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    
    
    
    public function excluir($Id)
    {
        include_once '../Connection/Connection.php';
        $connection = new Connection();
        $connection->fazConexao();
        $sql = "DELETE FROM faccoes WHERE id=".$Id;
        $res = $connection->conn->query($sql);
        if($res)
        {
            echo "<script>location.href='?page=faccoes';</script>";
        }
        else
        {
            echo "<script>alert('Não foi possível excluir a facção.');</script>";
            echo "<script>location.href='?page=faccoes';</script>";
        }

    }

    public function listarFaccoes($idUser)
    {
        include_once 'Connection/Connection.php';
        $connection = new Connection();
        $connection->fazConexao();
        $sql= "SELECT f.nome, f.descricao, f.id from  faccoes f Join mundos m on m.id = f.idMundo WHERE m.idUser ='".$idUser."' ORDER BY nome";
        return $connection->conn->query($sql);
    }
}