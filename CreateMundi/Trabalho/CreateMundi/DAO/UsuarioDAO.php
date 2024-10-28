<?php
class UsuarioDAO
{

    public function cadastrar(UsuarioModel $model)
    {
        include_once '../Connection/Connection.php';
        $connection = new connection();
        $connection->fazConexao();
        $sql = "INSERT INTO usuario (username,email,senha,adm) VALUES (?,?,?,?) ";
        $stmt = $connection->conn->prepare($sql);
        $stmt->bindValue(1,$model->username);
        $stmt->bindValue(2,$model->email);
        $stmt->bindValue(3,$model->senha);
		$stmt->bindValue(4,$model->adm);
        $res= $stmt->execute();
        if($res)
        {
            echo "<script>alert('Cadastro realizado com sucesso!');</script>";
            echo "<script>location.href='?page=inicial';</script>";
        }
        else
        {
            echo "<script>alert('Tivemos problemas com o cadastro, tente novamente mais tarde.');</script>";
            echo "<script>location.href='?page=inicial';</script>";
        }
        
    }
	public function excluir(int $Id)
    {
        include_once 'Connection/Connection.php';
        $connection = new connection();
        $connection->fazConexao();
        $sql = "DELETE FROM usuario WHERE id=".$Id;
        $res = $connection->conn->query($sql);
        if($res)
        {
            echo "<script>alert('Exclusão realizada com sucesso!');</script>";
            echo "<script>location.href='?page=inicial';</script>";
        }
        else
        {
            echo "<script>alert('Não foi possível excluir o usuário!');</script>";
            echo "<script>location.href='?page=Mundos';</script>";
        }

    }
    public function BuscarUsername($Username)
    {
        include_once '../Connection/Connection.php';
        $connection = new connection();
        $connection->fazConexao();
        $sql= "SELECT id, username, senha, adm FROM usuario WHERE BINARY username ='".$Username."'";
        return $res = $connection->conn->query($sql);;
    }
	public function pegaPessoaPeloUsername($Username, $Senha)
    {
        include_once 'Connection/Connection.php';
        $connection = new connection();
        $connection->fazConexao();
        $sql= "SELECT id, username, senha, adm FROM usuario WHERE BINARY username ='".$Username."' && senha ='".$Senha."'";
        return $res = $connection->conn->query($sql);;
    }
}