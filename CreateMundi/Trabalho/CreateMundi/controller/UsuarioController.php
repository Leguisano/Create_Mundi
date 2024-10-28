<?php

class UsuarioController
{
    public static function cadastrar()
    {
        include_once '../model/UsuarioModel.php';
        $model = new UsuarioModel();
        $model->username = $_POST["username"];
        $model->email = $_POST["email"];
        $model->senha = md5($_POST["senha"]);
        $model->adm = 0;
        $model->cadastrar();
    }
    public static function pegaPessoaPeloUsername($Username, $senha)
    {
        include_once 'model/UsuarioModel.php';
        $senhacrp = md5($senha);
        $model = new UsuarioModel();
        return $model->pegaPessoaPeloUsername($Username, $senhacrp);
    }
    public static function BuscarUsername($Username)
    {
        include_once '../model/UsuarioModel.php';
        $model = new UsuarioModel();
        return $model->BuscarUsername($Username);
    }
    public static function excluir()
    {
        $meuId = $_REQUEST["id"];
        include_once 'model/UsuarioModel.php';
        $model = new UsuarioModel();
        $model->excluir($meuId);
    }
}
if(isset($_REQUEST["action"]) && $_REQUEST["action"] == "cadastro"){
    if(strlen($_POST["username"]) < 17 && strlen($_POST["username"])  > 5){
        if(strlen($_POST["senha"]) > 7 && strlen($_POST["senha"])  < 51){
            if($_POST["senha"] == $_POST["senhaconfirm"]){
                    $sessao = UsuarioController::BuscarUsername($_POST["username"]);
                    $qtd = $sessao -> rowCount();
                    if( $qtd != 0 ){
                        header("Location: ../cadastro.php?action=falha&causa=Username ja existe");
                    }
                    UsuarioController::cadastrar();
                    header("Location: ../login.php");
            }else{
                header("Location: ../cadastro.php?action=falha&causa=Senhas não batem");
            }
        }else{
        header("Location: ../cadastro.php?action=falha&causa=Senha deve ter entre 8 e 50 caracteres");
        }
    }else{
    header("Location: ../cadastro.php?action=falha&causa=Username deve ter entre 6 e 16 caracetres");
    }
}
