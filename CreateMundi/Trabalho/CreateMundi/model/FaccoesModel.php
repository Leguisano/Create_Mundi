<?php

class FaccoesModel
{
    public $id,$nome,$descricao,$idMundo;

    public function cadastrar()
    {
        include_once '../DAO/FaccoesDAO.php';
        $dao = new FaccoesDAO();
        $dao->cadastrar($this);

    }

    public function editar()
    {
        include_once '../DAO/FaccoesDAO.php';
        $dao = new FaccoesDAO();
        $dao->editar($this);

    }

    public function pegaFaccaoPeloId(int $Id)
    {
        include_once '../DAO/FaccoesDAO.php';
        $dao = new FaccoesDAO();
        return $dao->pegaFaccaoPeloId($Id);

    }

    public function excluir($Id)
    {
        include_once '../DAO/FaccoesDAO.php';
        $dao = new FaccoesDAO();
        $dao->excluir($Id);

    }

    public function listarFaccoes($idUser)
    {
        include_once 'DAO/FaccoesDAO.php';
        $dao = new FaccoesDAO();
        return $dao->listarFaccoes($idUser);

    }
}