<?php

class UsuarioModel
{
    public $id,$username,$email,$senha,$adm;

    public function cadastrar()
    {
        include_once '../DAO/UsuarioDAO.php';
        $dao = new UsuarioDAO();
        $dao->cadastrar($this);
    }
    public function excluir(int $Id)
    {
        include_once 'DAO/UsuarioDAO.php';
        $dao = new UsuarioDAO();
        $dao->excluir($Id);
    }
    public static function pegaPessoaPeloUsername($Username, $senha)
    {
        include_once 'DAO/UsuarioDAO.php';
        $dao = new UsuarioDAO();
        return $dao->pegaPessoaPeloUsername($Username, $senha);
    }
    public static function BuscarUsername($Username)
    {
        include_once '../DAO/UsuarioDAO.php';
        $dao = new UsuarioDAO();
        return $dao->BuscarUsername($Username);
    }
}
