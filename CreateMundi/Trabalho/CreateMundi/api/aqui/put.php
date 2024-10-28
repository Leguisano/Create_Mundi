<?php

if($acao == 'update' && $param == ''){
    echo json_encode(['ERRO' => "É necessario informar um Usuário."]);
}
if ($acao == 'update' && $param != ''){
    array_shift($_POST);
    $sql = "UPDATE usuario SET ";
    $contador = 1;
    foreach (array_keys($_POST) as $indice){
        if (count($_POST) > $contador){
            $sql .= "{$indice} = '{$_POST[$indice]}', ";
        }
        else{
            $sql .= "{$indice} = '{$_POST[$indice]}' ";
        }
        $contador++;
    }
    $sql .= "WHERE username = '{$param}'";
    $db = DB::connect();
    $rs = $db->prepare($sql);
    $exec = $rs->execute();

    if ($exec) {
        echo json_encode(["dados" => 'dados foram modificados com sucesso.']);
    } else {
        echo json_encode(["dados" => 'houve algum erro ao modificar os dados.']);
    }
}
?>