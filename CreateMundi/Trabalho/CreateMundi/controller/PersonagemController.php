<?php

class PersonagemController
{

    public static function cadastrar($nome, $descricao, $idFaccao)
    {
        include_once '../model/PersonagensModel.php';
        $model = new PersonagensModel();
        $model->nome = $nome;
        $model->descricao = $descricao;
        $model->idFaccao = $idFaccao;
        $model->cadastrar();
    }

    public static function editar($nome, $descricao, $id, $idFaccao)
    {
        include_once '../model/PersonagensModel.php';
        $model = new PersonagensModel();
        $model->id = $id;
        $model->nome = $nome;
        $model->descricao = $descricao;
        $model->idFaccao = $idFaccao;
        $model->editar();
    }

    public static function pegaPersonagemPeloId(int $Id)
    {
        include_once '../model/PersonagensModel.php';
        $model = new PersonagensModel();
        $model->id = $Id;
        return $model->listarPersonagens($Id);
    }

    public static function excluir()
    {
        $meuId = $_REQUEST["id"];
        include_once '../model/PersonagensModel.php';
        $model = new PersonagensModel();
        $model->excluir($meuId);
    }

    public static function listarPersonagens($idUser)
    {
        include_once 'model/PersonagensModel.php';
        $model = new PersonagensModel();
        return $model->listarPersonagens($idUser);
    }
}
if(isset($_REQUEST["action"]) && $_REQUEST["action"] == "excluir"){
    PersonagemController::excluir();
    header("Location: ../Personagens.php");
}

if(isset($_REQUEST["action"]) && $_REQUEST["action"] == "cadastrar"){
    PersonagemController::cadastrar( $_POST["nome"] , $_POST["descricao"], $_POST["Faccao"]);
    header("Location: ../Personagens.php");
}
if(isset($_REQUEST["action"]) && $_REQUEST["action"] == "edit"){
    PersonagemController::editar( $_POST["nome"] , $_POST["descricao"], $_POST["id"], $_POST["Faccao"]);
    header("Location: ../Personagens.php");
}