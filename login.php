<?php

require_once 'conexao.php';
require_once 'classes/usuarios.php';
$user = new Usuario;

?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Login</title>
    <meta charset="UTF-8">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <link rel="stylesheet" href="estilo.css">

    <style>

        h1 {
            text-align: center;
            margin-top: 5vw;
        }

        h4, h6, p {
            text-align: center;
        }

        .formulario {
            width: 30vw;
            margin-top: 8vh;
            margin-left: 35vw;
            padding: 40px;
            text-align: center;
            background-color: #F0FFFF
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

        .box-email {
            margin-bottom: 0;
        }

        .msg-erro{
            margin-top: -30vw;
            color: #842029;
            background-color: #f8d7da;
            border-color: #f5c2c7;
            width: 13vw;
            padding: 5px;
            margin-left: 44vw;
            text-align: center;
        }

        .msg-sucesso{
            margin-top: -30vw;
            color: #842029;
            background-color: #f8d7da;
            border-color: #f5c2c7;
            width: 26vw;
            padding: 5px;
            margin-left: 37vw;
            text-align: center;
        }

    </style>

</head>

<body>

    <h1>Calculadora Vestibular Seriado UPE</h1>
    <h4>Alisshow Matérias Isoladas</h4>
    <h6>Prof. Alisson Coutinho </h6>

    
    <div class="formulario card">
        <div class="row">
            <form class="col s12" method="post">

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
                    <input class="btn-entrar" type="submit" value="Entrar">
                </div>
               <br>
                <div class="row">
                    <a href="recuperarSenha.php" class="esqueceu-senha">Esqueceu a senha?</a>
                </div>

            </form>
        </div>

    </div>

<?php

if(isset($_POST['email'])){

    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

     //Verificar se está preenchido
    if(!empty($email) && !empty($senha)){

        //$user -> conectar("ssalisson","localhost","root","");

        if($user -> msgErro == ""){

            if($user -> entrar($email, $senha)){

                header("location: confirmacaoSSA.php");

            }else {

                echo "<div class='msg-sucesso'>E-mail ou senha inválidos! Por favor, verifique as informações e tente novamente!</div>";
            }

        } else{

            echo "Erro: ".$user -> msgErro; 
    }
       } else{
           
            echo "<div class='msg-erro'>Preencha todos os campos!</div>";  
        
       }
}
?>

</body>
</html>