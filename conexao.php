<?php
// Conexão com o banco de dados

$servername = "localhost";
$username = "id18277536_user_alisson";
$password = "Calculadora$2022";
$db_name = "id18277536_db_ssalisson";

$connect = mysqli_connect($servername, $username, $password, $db_name);

if(mysqli_connect_error()):
    echo "Falha na conexão: ".mysqli_connect_error();

endif;

?>
