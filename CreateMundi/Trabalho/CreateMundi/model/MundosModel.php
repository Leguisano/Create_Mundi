<?php

class MundosModel
{
    public $id,$nome,$descricao,$idUser;

    public function cadastrar()
    {
        include_once '../DAO/MundosDAO.php';
        $dao = new MundosDAO();
        $dao->cadastrar($this);

    }

    public function editar()
    {
        include_once '../DAO/MundosDAO.php';
        $dao = new MundosDAO();
        $dao->editar($this);

    }

    public function pegaMundoPeloId(int $Id)
    {
        include_once '../DAO/MundosDAO.php';
        $dao = new MundosDAO();
        return $dao->pegaPessoaPeloId($Id);

    }

    public function excluir(int $Id)
    {
        include_once '../DAO/MundosDAO.php';
        $dao = new MundosDAO();
        $dao->excluir($Id);

    }

    public function listarMundos($idUser)
    {
        include_once 'DAO/MundosDAO.php';
        $dao = new MundosDAO();
        return $dao->listarMundos($idUser);

    }
}