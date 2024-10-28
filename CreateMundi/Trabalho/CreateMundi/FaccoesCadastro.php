<!DOCTYPE html>
<html lang="pt-br">
<?php if(!isset($_REQUEST["action"])){
    header( "Location: mundos.php" );
}
session_start();
                    if($_SESSION["logado"]!=TRUE){
                        header( "Location: login.php" );
                      }?>


<head>
    <title>CadastroFaccao</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</head>

<body style="background-color:#6b6b6b">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <div class="container">
        <h1 style="text-align: center;">Criar Facção</h1>
        <div class="dropdown">
	<button class="btn btn-primary dropdown-toggle" type="button" id="botaoDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</button>
    
    <div class="dropdown-menu" aria-labelledby="botaoDropdown" style="background-color:#000000">
    <a class="dropdown-item" href="Mundos.php">Mundos</a>
    <a class="dropdown-item" href="Faccoes.php">Facções</a>
    <a class="dropdown-item" href="Personagens.php">Personagens</a>
    </div>
    
        <form id="loginForm" method="POST" action="controller/FaccaoController.php?action=<?php if($_REQUEST["action"]== "cadastro"){
            echo 'cadastrofac"';
        }else{
                echo 'editfac"';
            }
        ?>>
            <div class="mb-3">
                <input type="text" style="background-color:#a6a6a6" class="form-control-sm mx-auto d-flex justify-content-center"
                    id="nomeFaccao" name="nome" placeholder="Nome da Facção" value=<?php if($_REQUEST["action"]== "cadastro"){
                        echo "";
                    }else{
                        echo $_REQUEST["nome"];
                    } ?>>
            </div>

            <div class="mb-3">
                <textarea type="text" style="background-color:#a6a6a6" class="form-control-sm mx-auto d-flex justify-content-center"
                    id="descricaoFaccao" name="descricao" placeholder="Descrição da Facção"><?php if($_REQUEST["action"] == "cadastro"){
                        echo "";
                    }else{
                        echo $_REQUEST["descricao"];
                    } ?></textarea>
                    </div>
            <?php if($_REQUEST["action"] == "editar"){
            echo '<div class="mb-3">
            <input type="hidden" style="background-color:#a6a6a6" class="form-control-sm mx-auto d-flex justify-content-center"
                id="id" name="id" value='.$_REQUEST["id"].'>
            </div>';}?> 
            
            <div class="mb-3">
            	<label class="form-control-sm mx-auto d-flex justify-content-center">Qual Mundo quer afiliar ele</label>
                
                <select style="background-color:#a6a6a6" class="form-control-sm mx-auto d-flex justify-content-center"
                    id="Faccao" name="Faccao" >
                    <?php
                    include_once 'controller/MundoController.php';
					$faccoes = MundoController::listarMundos($_SESSION["id_usuario"]);
                    ?>
                    
                   <?php while ($row = $faccoes->fetch(PDO::FETCH_OBJ)){ ?>
  					<option value="<?php echo $row->id?>"><?php echo $row->nome; ?></option>
                    <?php } ?>
                    </select>
            
            </div>

            <div class="botoes">
               <button type="submit" class="btn btn-primary d-flex justify-content-center align-items-center mx-1">Salvar</button>
            </div>
            <style>
                .botoes {
                    display: flex;
                    justify-content: center;
                    align-items: center;
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
            </style>
        </form>
    </div>

    
</body>

</html>