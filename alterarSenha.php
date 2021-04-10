<?php
    $conexao = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($conexao, 'ssalisson');


    if(isset($_GET['codigo'])){
        $codigo = $_GET['codigo'];
        $email_codigo = base64_decode($codigo);

        $selecionar = mysqli_query($conexao, "SELECT * FROM codigos WHERE CODIGO = '$codigo' AND data > NOW()");
        if(mysqli_num_rows($selecionar) >= 1){
            if(isset($_POST['acao']) && $_POST['acao'] == 'mudar'){
                $nova_senha = addslashes(md5(($_POST['novaSenha'])));
                $confsenha = addslashes($_POST['confirmarSenha']);


                if($nova_senha == $confsenha){
                    $atualizar = mysqli_query($conexao, "UPDATE usuarios SET senha = '$nova_senha' WHERE email = '$email_codigo'");
                    if($atualizar){
                        $mudar = mysqli_query($conexao, "DELETE FROM codigos WHERE codigo = '$codigo'");
                        
                        echo "<script>alert('Senha alterada com sucesso!');</script>";
                } 
                }else {
                    echo "<script>alert('As senhas digitadas não são iguais!');</script>";
                }
                /*
                $atualizar = mysqli_query($conexao, "UPDATE usuarios SET senha = '$nova_senha' WHERE email = '$email_codigo'");
                if($atualizar){
                    $mudar = mysqli_query($conexao, "DELETE FROM codigos WHERE codigo = '$codigo'");
                    echo 'A senha foi alterada com sucesso'; 
                } */
            }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Redefinir senha</title>

    <style>

        body{
            background: rgba(0, 0, 0, 0.03);
            background-color: #DCDCDC;
        }

        .formulario{
            width: 30vw;
            height: 35vh;
            margin-top: 10%; 
            margin-left: 35%;
            padding-top: 2%;
            padding-bottom: 0%;
            text-align: center;
            background-color: white;
            border-radius: 2%;
        }

        .btn-alterar {
            padding: 10px;
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <div class="formulario">

        <h1>Digite a nova senha</h1>

        <form action="" method="post" enctype="multipart/form-data">

            <label for="novaSenha">Nova senha</label>
            <br>
            <input type="password" name="novaSenha">
            <br><br>
            <label for="novaSenha">Repetir a nova senha</label>
            <br>
            <input type="password" name="repetirSenha">
            <input type="hidden" name="acao" value="mudar">
            <br><br>
            <input class="btn-alterar" type="submit" value="Alterar senha">


            <?php
        }else {
            echo  '<h1>O link para alterar a senha já expirou!</h1>';
        }
    }
?>

        </form>

    </div>
    
</body>
</html>