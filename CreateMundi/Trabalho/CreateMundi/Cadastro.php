<!DOCTYPE html>
<html lang="pt-br">
    <?php
    if(isset($_REQUEST["action"]) && $_REQUEST["action"] == "falha"){
        echo "<script> alert('".$_REQUEST["causa"]."'); </script> ";
    }
    ?>

<head>
    <title>CadastroMundo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</head>

<body style="background-color:#6b6b6b">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

</br></br>
    <div class="container">
        <h1 style="text-align: center;">Cadastro</h1>
    </div>
    </br></br>
        <form form id="loginForm" method="POST" action="controller/UsuarioController.php?action=cadastro">
            <div class="mb-3">
                <input type="text" style="background-color:#a6a6a6" class="form-control-sm mx-auto d-flex justify-content-center"
                    id="username" name="username" placeholder="Username">
            </div>
            <div class="mb-3">
                <input type="password" style="background-color:#a6a6a6" class="form-control-sm mx-auto d-flex justify-content-center"
                    id="senha" name="senha" placeholder="senha">
            </div>
            <div class="mb-3">
                <input type="password" style="background-color:#a6a6a6" class="form-control-sm mx-auto d-flex justify-content-center"
                    id="senhaconfirm" name="senhaconfirm" placeholder="confirmar senha">
            </div>
            <div class="mb-3">
                <input type="email" style="background-color:#a6a6a6" class="form-control-sm mx-auto d-flex justify-content-center"
                    id="email" name="email" placeholder="email">
            </div>
            </br>
            <div class="botoes">
                <button type="submit" class="btn btn-primary d-flex justify-content-center align-items-center mx-1">Cadastrar-se</button>
                <button type="button" onclick="login()" class="btn btn-primary d-flex justify-content-center align-items-center mx-1">Login</button>
            </div>
            
            <script>
            
            
            </script>

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

    <script>
      function login(){
        window.location.href = "Login.php";
      }
    </script>
</body>

</html>