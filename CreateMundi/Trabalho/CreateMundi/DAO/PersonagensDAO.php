<?php
class PersonagensDAO
{
    public function cadastrar(PersonagensModel $model)
    {
        include_once '../Connection/Connection.php';
        $connection = new connection();
        $connection->fazConexao();
        $sql = "INSERT INTO Personagens (nome,descricao,idfaccao) VALUES (?,?,?) ";
        $stmt = $connection->conn->prepare($sql);
        $stmt->bindValue(1,$model->nome);
        $stmt->bindValue(2,$model->descricao);
        $stmt->bindValue(3,$model->idFaccao);
        $res= $stmt->execute();
        if($res)
        {
            echo "<script>location.href='?page=personagens';</script>";
        }
        else
        {
            echo "<script>alert('Não foi possível criar o personagem.');</script>";
            echo "<script>location.href='?page=personagens';</script>";
        }
        
    }

    public function editar(PersonagensModel $model)
    {
        include_once '../Connection/Connection.php';
        $connection = new connection();
        $connection->fazConexao();
        $sql = "UPDATE personagens Set nome=?, descricao=?, idFaccao=? Where id=? ";
        $stmt = $connection->conn->prepare($sql);
        $stmt->bindValue(1,$model->nome);
        $stmt->bindValue(2,$model->descricao);
        $stmt->bindValue(3,$model->idFaccao);
        $stmt->bindValue(4,$model->id);
        $res= $stmt->execute();
        if($res)
        {
            echo "<script>location.href='?page=personagens';</script>";
        }
        else
        {
            echo "<script>alert('Não foi possível realizar a alteração.');</script>";
            echo "<script>location.href='?page=personagens';</script>";
			}

    }

    public function pegaPessoaPeloId(int $Id)
    {
        include_once '../Connection/Connection.php';
        $connection = new connection();
        $connection->fazConexao();
        $sql= "SELECT * FROM usuario WHERE idUser=".$Id;
        $res = $connection->conn->query($sql);
        $row = $res->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    
    
    
    public function excluir(int $Id)
    {
        include_once '../Connection/Connection.php';
        $connection = new connection();
        $connection->fazConexao();
        $sql = "DELETE FROM personagens WHERE id=".$Id;
        $res = $connection->conn->query($sql);
        if($res)
        {
            echo "<script>location.href='?page=personagens';</script>";
        }
        else
        {
            echo "<script>alert('Não foi possível excluir o personagem.');</script>";
            echo "<script>location.href='?page=personagens';</script>";
        }

    }

    public function listarPersonagens($idUser)
    {
        include_once 'Connection/Connection.php';
        $connection = new connection();
        $connection->fazConexao();
        $sql= "SELECT p.id, p.nome, p.descricao from personagens p JOIN faccoes f on f.id = p.idFaccao Join mundos m on m.id = f.idMundo WHERE m.idUser ='".$idUser."' ORDER BY nome";
        return $connection->conn->query($sql);
    }
}