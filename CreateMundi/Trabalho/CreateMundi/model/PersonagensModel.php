<?php

class PersonagensModel
{
    public $id,$nome,$descricao,$idFaccao;

    public function cadastrar()
    {
        include_once '../DAO/PersonagensDAO.php';
        $dao = new PersonagensDAO();
        $dao->cadastrar($this);

    }

    public function editar()
    {
        include_once '../DAO/PersonagensDAO.php';
        $dao = new PersonagensDAO();
        $dao->editar($this);

    }

    public function pegaPersonagensPeloId(int $Id)
    {
        include_once '../DAO/PersonagensDAO.php';
        $dao = new PersonagensDAO();
        return $dao->pegaPersonagensPeloId($Id);

    }

    public function excluir(int $Id)
    {
        include_once '../DAO/PersonagensDAO.php';
        $dao = new PersonagensDAO();
        $dao->excluir($Id);

    }

    public function listarPersonagens($idUser)
    {
        include_once 'DAO/PersonagensDAO.php';
        $dao = new PersonagensDAO();
        return $dao->listarPersonagens($idUser);
    }
}