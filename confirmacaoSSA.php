<?php

    session_start();
    if(!isset($_SESSION['id_usuario'])){
        header("location: login.php");
        exit;
    }

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>Página de confirmação</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo.css">
       
    <style>

        body{
            background-color: #F2F3F4 ;
        }
        
        div.alert.alert-success{
            background-color: #F0FFFF;
            width: 30vw;
            text-align: center;
            font-size: large;
            margin: 18% 0% 0% 32%;
        }

        div.botoes{
            text-align: center;
        }

        .btn-danger{
            position: absolute;
            float: right;
            margin: -14% 0% 6% 90%;
        }

        img.logo-alisson{
            float: left;
            position: absolute;
            width: 12vw;
            margin: -13% 0% 0% 41%;
        }
        
    </style>
    
</head>
<body>



        <img class="logo-alisson" src="img/logo-alisson.png" alt="">
    

    <a class="" href="sair.php">
        <button type="button" class="btn-sair btn btn-danger">Sair</button>
    </a>

    <div class="alert alert-success" role="alert">
        
        <h4 class="alert-heading">Confimação SSA</h4>
        <br>
        <p>Se você tem a nota SSA 1 clique no botão SIM para ser direcionado para a Calculadora SSA.</p>
        <hr>
        <p>Se você não tem a nota SSA 1 clique no botão NÃO para ser direcionado para a página de Notas SSA.</p>
        <hr>
        <div class="botoes">
        <a href="calculadora.php">
            <button type="button" class="btn btn-success btn-lg">SIM</button>
        </a> 
        &nbsp; &nbsp; &nbsp;
        <a href="https://nota-ssa.firebaseapp.com/folder/Inbox">
            <button type="button" class="btn btn-warning btn-lg">NÃO</button>
        </a>
        
        </div>
      </div>
    
</body>
</html>