<!DOCTYPE html>
<html lang="pt-br">
<?php
    if(isset($_REQUEST["action"]) && $_REQUEST["action"] == "erroNoLogin"){
        echo "<script> alert('Usuario ou Senha Incorretos'); </script> ";
    }
    ?>
  <head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"         rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>
  <body style="background-color:#222222">
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
      <h1 style="text-align: center; color: #ececec;">Login</h1>
      <form action="Sessao.php" method="POST">

      <br>
      <br>

      <div class="mb-3">
        <input type="text" style="background-color:#a6a6a6" class="form-control-sm mx-auto d-flex justify-content-center"   id="username" name="username">
      </div>
        
      <div class="mb-3">
        <input type="password" style="background-color:#a6a6a6" class="form-control-sm mx-auto d-flex justify-content-center" id="senha" name="senha">
      </div>

      <div class="botoes">
        <button type="button" onclick="cadastro()" class="btn btn-primary d-flex justify-content-center align-items-center mx-1">Cadastro</button>
        <button type="submit" class="btn btn-primary d-flex justify-content-center align-items-center mx-1">Logar</button>
      </div>
    </div>
    <style>
      .botoes{
        display: flex;
        justify-content: center;
        align-items: center;
      }
	    .btn-primary{
	      color: #ececec;
	      background-color: #212644;
	      border-color: #000000;
      }
  	  .btn-primary:hover {
        color: #ececec;
	      background-color: #191c2c;
	      border-color: #000000;
     	}
    </style>
    <script>
      function cadastro(){
        window.location.href = "Cadastro.php";
      }
    </script>

  </body>
</html>