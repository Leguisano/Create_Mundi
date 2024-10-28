<?php
if ($acao == "lista" && $param == ""){
    $db = DB::connect();
    $rs = $db->prepare("SELECT u.username, COUNT(DISTINCT m.id) AS numMundos, COUNT(DISTINCT f.idMundo) AS numFaccoes, COUNT(DISTINCT p.idFaccao) AS numPersonagens FROM usuario u INNER JOIN mundos m ON m.idUser = u.id INNER JOIN faccoes f ON m.id = f.idMundo INNER JOIN personagens p ON p.idFaccao = f.id GROUP BY u.username");
    $rs->execute();
    $row = $rs->fetchAll(PDO::FETCH_ASSOC);
    if($row){
        echo json_encode(["dados" => $row]);
    }
}
if ($acao == "lista" && $param != ""){
    $db = DB::connect();
    $rs = $db->prepare("SELECT u.username, COUNT(DISTINCT m.id) AS numMundos, COUNT(DISTINCT f.idMundo) AS numFaccoes, COUNT(DISTINCT p.idFaccao) AS numPersonagens FROM usuario u INNER JOIN mundos m ON m.idUser = u.id INNER JOIN faccoes f ON m.id = f.idMundo INNER JOIN personagens p ON p.idFaccao = f.id WHERE BINARY username = '".$param."' GROUP BY u.username");
    $rs->execute();
    $row = $rs->fetchObject();
    if($row){
        echo json_encode([$row]);
    }
    else{
        $Erro=array(
            "username"=>"Usuario não encontrado",
        );
        echo json_encode([$Erro]);
    }            
}