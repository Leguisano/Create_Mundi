<?php
include_once "classes/db.class.php";
if ($api == 'usuario'){

    if ($method == "GET"){
        include_once "get.php";
    }
    if ($method == "POST" && $_POST['_method'] == "PUT"){
        include_once "put.php";
    }
        
}