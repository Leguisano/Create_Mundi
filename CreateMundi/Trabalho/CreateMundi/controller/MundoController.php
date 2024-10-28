<?php

class MundoController
{

    public static function cadastrar($nome, $descricao)
    {
        session_start();
        include_once '../model/MundosModel.php';
        $model = new MundosModel();
        $model->nome = $nome;
        $model->descricao = $descricao;
        $model->idUser = $_SESSION["id_usuario"];
        $model->cadastrar();
    }

    public static function editar($nome, $descricao, $id)
    {
        session_start();
        include_once '../model/MundosModel.php';
        $model = new MundosModel();
        $model->nome = $nome;
        $model->descricao = $descricao;
        $model->id = $id;
        $model->editar();
    }

    public static function pegaMundoPeloId(int $Id)
    {
        include_once '../model/MundosModel.php';
        $model = new MundosModel();
        $model->id = $Id;
        return $model->pegaMundoPeloId($Id);
    }

    public static function excluir()
    {
        $meuId = $_REQUEST["id"];
        
        include_once '../model/MundosModel.php';
        $model = new MundosModel();
        $model->excluir($meuId);
    }
    public static function listarMundos($idUser)
    {
        include_once 'model/MundosModel.php';
        $model = new MundosModel();
        return $model->listarMundos($idUser);
    }

}


if(isset($_REQUEST["action"]) && $_REQUEST["action"] == "excluir"){
    MundoController::excluir();
    header("Location: ../Mundos.php");
}

if(isset($_REQUEST["action"]) && $_REQUEST["action"] == "cadastrar"){
    MundoController::cadastrar( $_POST["nome"] , $_POST["descricao"] );
    header("Location: ../Mundos.php");
}
if(isset($_REQUEST["action"]) && $_REQUEST["action"] == "edit"){
    MundoController::editar( $_POST["nome"] , $_POST["descricao"], $_POST["id"] );
    header("Location: ../Mundos.php");
}