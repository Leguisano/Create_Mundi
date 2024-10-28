<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Mundo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body style="background-color:#6b6b6b">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  
<h1 style="text-align: center;">Mundos</h1>

<div class="dropdown">
	<button class="btn btn-primary dropdown-toggle" type="button" id="botaoDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</button>
    <div class="dropdown-menu" aria-labelledby="botaoDropdown" style="background-color:#000000">
    <a class="dropdown-item" href="Mundos.php">Mundos</a>
    <a class="dropdown-item" href="Faccoes.php">Facções</a>
    <a class="dropdown-item" href="Personagens.php">Personagens</a>
    </div>

 <div style="background-color:#a6a6a6">
		 <?php
     session_start();
       if($_SESSION["logado"]!=TRUE){
         header( "Location: login.php" );
       }
       include_once 'controller/MundoController.php';
		$mundos = MundoController::listarMundos($_SESSION["id_usuario"]);
		$qtd = $mundos -> rowCount();
		?>
		 <?php while ($row = $mundos->fetch(PDO::FETCH_OBJ)){ ?>
        <h2><?php echo $row->nome; ?></h2>
  			<p><?php echo $row->descricao; ?><br>
        
            <button class="btn btn-danger" id="adicionar" onclick="excluirMundo(<?php echo $row->id; ?>, '<?php echo $row->nome; ?>',)">Excluir</button>
            
            <button class="btn btn-primary" id="adicionar" onclick="editarMundo(<?php echo $row->id; ?>, '<?php echo $row->nome; ?>', '<?php if(strlen($row->descricao)<100){echo $row->descricao;}else{echo "";} ?>')">Editar</button></p>
            <hr>
        <?php } ?>
            <br>
     		 <button class="btn btn-primary" id="adicionar" onclick="cadastroMundo()">Adicionar</button>
      </div>
      <?php if($_SESSION["adm"]){
        echo '
      <a class="fixedButton">
         <button type="button" class="btn btn-primary" onclick="BuscarUsuario()">Ver Usuarios</button><i class="fa fa-phone"></i></div>
      </a>';}?>


<style>
	  .btn-danger {
      color: #00f2ff;
       background-color: black;
       border-color: #00f2ff;
      }
      .btn-danger:hover {
       color: #ffffff;
       background-color: red;
       border-color: #ffffff;
      }
      
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
      
      .dropdown-item{
       color: #00f2ff;
       background-color: black;
       border-color: #00f2ff;
      }
      .dropdown-item:hover {
       color: #000000;
       background-color: #00f2ff;
       border-color: #000000;
 	  }	
      
      #adicionar {
        padding: 0;
        text-align: center;
  		vertical-align: middle;
  		width: 80px;
  		height: 25px;
	  }
    .fixedButton{
      position: fixed;
      bottom: 0px;
      right: 0px; 
      padding: 20px;
    }

	  
 </style>
 

   <script>
  
  function BuscarUsuario(){
    window.location.href = "BuscaUsuarios.php"
  }

  function editarMundo(id, nome, descricao) {
            alert("Chamada para edição de Mundo");
            window.location.href = "MundoCadastro.php?action=editar&id=" + id +"&nome=" + nome +"&descricao="+descricao;
          }

  function excluirMundo(id, nomeMundo) {
    if (confirm("Tem certeza que deseja excluir o mundo '" + nomeMundo + "'?")) {

        window.location.href = 'controller/MundoController.php?action=excluir&id=' + id;
    }
}
 
  function cadastroMundo() {
            alert("Chamada para cadastro de Mundo");
            window.location.href = "MundoCadastro.php?action=cadastro";}


    </script>
  </body>
</html>