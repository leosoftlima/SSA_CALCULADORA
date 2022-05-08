<?php
// Conexão
require_once 'conexao.php';

// Sessão
session_start();

// Botão enviar
if(isset($_POST['btn-entrar'])):

    $erros = array();
    $email = mysqli_escape_string($connect, $_POST['email']);
    $senha = mysqli_escape_string($connect, $_POST['senha']);

    if(empty($email) or empty($senha)):

        $erros[] = "<script>alert('O campo de login e senha devem ser preenchidos')</script>";
    
    else:
        
        $sql = "SELECT email FROM usuarios WHERE email = '$email'";
        $resultado = mysqli_query($connect, $sql);

        if(mysqli_num_rows($resultado) > 0):
            
            $senha = md5($senha);
            $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
            $resultado = mysqli_query($connect, $sql);
            
            if(mysqli_num_rows($resultado) == 1):
                $dados = mysqli_fetch_array($resultado);
                $_SESSION['logado'] = true;
                $_SESSION['id_usuario'] = $dados['id_usuario'];
                header('location: confirmacaoSSA.php');

            else:

                $erros[] = "<script>alert('E-mail ou senha incorretos!')</script>";
            
            endif;

        else:
            $erros[] = "<script>alert('O e-mail informado não está cadastrado!')</script>";
        endif;

    endif;

endif;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <title>Login</title>

    <style>

        .container{
            align-items: center;
            justify-content: center;
            display: inline-block;
        }

        .formulario {
            width: 25vw;
            margin-top: 5vh;
            margin-left: 30%;
            padding: 35px;
            text-align: center;
            background-color: #F0FFFF;
        }

        h1 {
            text-align: center;
            margin-top: 5vw;
        }

        h6{
            
            text-align: center;
        }

        .titulos {
           text-align: center;
        }

        p {
            margin-top: 0;
            font-size: 2vw;
        }

        .btn-entrar {
            width: 100%;
            padding: 15px;
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
            cursor: pointer;
        }

        .btn-entrar:hover{
            border-color: yellow;
        }

        .esqueceu-senha:hover{
            color: red;
        }

        .msg-erro{
            text-align: center;
            float: left;
            margin-left: 41vw;
            position: absolute;
            margin-top: 10vw;
        }

        .img-logo-nucleo-colegio{
            float: left; 
            margin-left: 30px;
            margin-top: 10px;
        }

    </style>
</head>
<body>

<?php

if(!empty($erros)):
    foreach($erros as $erro):
        echo $erro;
    endforeach;
endif;

?>

        <div class="img-logo-nucleo-colegio">
            <img src="img/img-nucleo-colegio.png" alt="">
        </div>

        <div class="container">
        
        <div class="titulos">
            <h1>Calculadora Vestibular Seriado UPE</h1>
            <h6>Este produto é propriedade do Prof. Alisson Coutinho de Souza</h6>
        
        </div>

    <form class="form-login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

    <div class="formulario card">
        <div class="row">
            <form class="col s12" method="post">
                <img src="img/img-logo-nucleo.png" alt="">
                <p>Entrar</p>

                <div class="row">
                    <div class="input-field col s12 box-email">
                        <input name="email" id="email" type="text" class="validate">
                        <label for="email">E-mail</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12 box-senha">
                        <input name="senha" id="password" type="password" class="validate">
                        <label for="password">Senha</label>
                    </div>
                </div>

                <div>
                    <button class="btn-entrar" type="submit" name="btn-entrar">Entrar</button>
                </div>
               <br>


            </form>
        </div>

    </div>

    </form>

    </div>
</body>
</html>