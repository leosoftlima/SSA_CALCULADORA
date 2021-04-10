<?php

    date_default_timezone_set("America/Recife");
    // ini_set('smt_port', '587');
    $conexao = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($conexao, 'ssalisson');

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="estilo.css">
    <title>Recuperar senha</title>

    <style>
        body{
            background-color: #F8F8FF;
        }

        h3{
            margin-top: 2px;
        }

        .form-recuperar{
         
            background-color: #cfe2ff;
            width: 30%;
            height: 20vh;
            text-align: center;
            margin-left: 35%;
            margin-top: 15%;
            padding-top: 60px;
        }

        .msg-erro{
            position: absolute;
            color: #842029;
            background-color: #f8d7da;
            border-color: #f5c2c7;
            width: 19vw;
            padding: 14px;
            text-align: center;
            margin-top: -85px;
            margin-left: 39%;

        }
    
    </style>
</head>
<body>

    <?php
        
        if(isset($_POST['acao']) == 'recuperar'):

            $email = strip_tags(filter_input(INPUT_POST, 'emailRecupera', FILTER_SANITIZE_STRING)); //Filtra caracteres especiais

            $verificar = mysqli_query($conexao, "SELECT email FROM usuarios WHERE email = '$email'");
        
            if(mysqli_num_rows($verificar) == 1){

                $codigo = base64_encode($email);
                $data_expirar = date('Y-m-d H:i:s', strtotime('+1 day'));
                
                $mensagem = '<p>Recebemos uma tentativa de recuperação de senha para este e-mail, caso não sido você, desconsidere esta mensagem, caso contrário clique no link abaixo <br/> <a href="https://ssalisson2020.000webhostapp.com/alterarSenha.php?codigo='.$codigo.'">Alterar senha</a></p>';

                $email_remetente = //email do servidor
                
                $headers = "MIME-Version: 1.1\n";
                $headers .= "Content-type: text/html; charset=iso-8859-1\n";
                $headers .= "From: $email_remetente\n";
                $headers .= "Return-Path: $email_remetente\n";
                $headers .= "Replay-To: $email\n";

                $inserir = mysqli_query($conexao, "INSERT INTO codigos SET  codigo = '$codigo', data = '$data_expirar'");
                if($inserir){

                    if(mail("$email", "Assunto", "$mensagem", $headers, "-f$email_remetente")){
                        echo 'Enviamos um e-mail com um link para alteração de senha!';
                    }
    
                }
                
            }else {
                echo "<div class='msg-erro'>Por favor, informe o e-mail cadastrado!</div>"; 
            }
        
         endif; 
    
    ?>

        

        <form class="form-recuperar" action="" method="post" enctype="multipart/form-data">

            <h3>Digite o e-mail cadastrado!</h3>
            <br>
            <input type="text" name="emailRecupera">
            <input type="hidden" name="acao" value="recuperar">
            <input type="submit" value="Enviar">
            <br><br><br>
            <p>Enviaremos um e-mail com um link para alterar a senha</p>
                
        </form>

</body>
</html>


