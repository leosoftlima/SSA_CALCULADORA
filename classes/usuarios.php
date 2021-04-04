<?php

Class Usuario{

    private $pdo;
    public $msgErro = "";

    public function entrar($email, $senha){
        global $pdo;
        // Verificar se e-mail e senha estão cadastrados
        $sql = $pdo -> prepare("SELECT id_usuario from usuarios WHERE email = :e AND senha = :s");
        $sql -> bindValue(":e",$email);
        $sql -> bindValue(":s",md5($senha));
        $sql -> execute();

        if($sql -> rowCount() > 0){
            // Se sim, entrar no sistema (sessão)
            $dado = $sql -> fetch();
            session_start();
            $_SESSION['id_usuario'] = $dado['id_usuario'];
            return true; // Login realizado com sucesso
        } else{
            return false; // Não foi possível realizar o login
        }
    }

}


?>