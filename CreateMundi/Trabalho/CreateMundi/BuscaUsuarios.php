<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Personagens</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body style="background-color:#6b6b6b">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  
<h1 style="text-align: center;">Usuarios</h1>
    <div style="background-color:#a6a6a6">
    <br>
    <?php
        session_start();
        if($_SESSION["logado"]!=TRUE){
            header( "Location: login.php" );
          }else{
            if($_SESSION["adm"]==0){
                header( "Location: mundos.php" );
            }
          }
        $url = "http://localhost/Trabalho/CreateMundi/API/usuario/lista";
        $usuarios = json_decode(file_get_contents($url));
        foreach($usuarios->dados as $postar){
            echo "Username: $postar->username <br>";
            echo "Mundos: $postar->numMundos <br>";
            echo "Faccoes: $postar->numFaccoes <br>";
            echo "Personagens: $postar->numPersonagens <br><hr>";
        }
        ?>
        <a class="fixedButton">
         <button type="button" class="btn btn-primary" onclick="Voltar()">Voltar</button><i class="fa fa-phone"></i></div>
      </a>
    <style>
    .btn-primary {
       color: #00f2ff;
       background-color: black;
       border-color: #00f2ff;
    }
    .btn-primary:hover {
      color: #000000;
      background-color: #00f2ff;
      border-color: #000000;
    }
    .fixedButton{
      position: fixed;
      bottom: 0px;
      right: 0px; 
      padding: 20px;
    }
    </style>
    <script>
        function Voltar(){
    window.location.href = "Mundos.php"
  }
    </script>
