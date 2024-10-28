<?php
include_once "controller/UsuarioController.php";
$username = $_POST['username'];
$senha = $_POST['senha'];
$sessao = UsuarioController::pegaPessoaPeloUsername($username, $senha);
$qtd = $sessao -> rowCount();
if( $qtd > 0 ){
    session_start();
    $row = $sessao->fetch(PDO::FETCH_OBJ);
        $_SESSION["logado"] = TRUE;
        $_SESSION["id_usuario"] = $row->id;
        $_SESSION["nome_usuario"] = $row->nome;
        $_SESSION["adm"] = $row->adm;
        header( "Location: mundos.php" );
    }else{
        header( "Location: login.php?erroNoLogin" );
    }
?>
