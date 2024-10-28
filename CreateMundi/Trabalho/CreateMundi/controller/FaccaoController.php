<?php

class FaccaoController
{
    public static function cadastrar($nome, $descricao, $idMundo)
    {
        include_once '../model/FaccoesModel.php';
        $model = new FaccoesModel();
        $model->nome = $nome;
        $model->descricao = $descricao;
        $model->idMundo = $idMundo;
        $model->cadastrar();
    }

    public static function editar()
    {
        include_once '../model/FaccoesModel.php';
        $model = new FaccoesModel();
        $model->nome = $_POST["nome"];
        $model->descricao = $_POST["descricao"];
        $model->id = $_POST["id"];
        $model->editar();
    }

    public static function pegaFaccaoPeloId(int $Id)
    {
        include_once '../model/FaccoesModel.php';
        $model = new FaccoesModel();
        $model->id = $Id;
        return $model->pegaFaccaoPeloId($Id);
    }

    public static function excluir()
    {
        $meuId = $_REQUEST["id"];
        include_once '../model/FaccoesModel.php';
        $model = new FaccoesModel();
        $model->excluir($meuId);
    }

    public static function listarFaccoes($idUser)
    {
        include_once 'model/FaccoesModel.php';
        $model = new FaccoesModel();
        return $model->listarFaccoes($idUser);
    }
}

if(isset($_REQUEST["action"]) && $_REQUEST["action"] == "excluir"){
    FaccaoController::excluir();
    header("Location: ../Faccoes.php");
}

if(isset($_REQUEST["action"]) && $_REQUEST["action"] == "cadastrofac"){
    FaccaoController::cadastrar( $_POST["nome"] , $_POST["descricao"], $_POST["Faccao"] );
    header("Location: ../Faccoes.php");
}
if(isset($_REQUEST["action"]) && $_REQUEST["action"] == "editfac"){
    FaccaoController::editar( $_POST["nome"] , $_POST["descricao"], $_POST["id"], $_POST["Faccao"] );
    header("Location: ../Faccoes.php");
}