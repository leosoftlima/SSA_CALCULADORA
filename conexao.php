<?php 

    session_start(); //Abrindo a sessão em todas as páginas
    ob_start(); //Pra evitar problemas de redirecionamento do php
    header("Content-type: text/html; charset=utf-8");
    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese'); //Deixar datas no formato brasileiro
    date_default_timezone_set('America/Recife'); //Nossa fuso horário pra brasileiro 
    $autoLoad = function($class){
        include('classes/'.$class.'.php');
    };
    spl_autoload_register($autoLoad);
    
    //define('INCLUDE_PATH', 'http://localhost/login-calculadora/');   
    
    // conectar("ssalisson","localhost","root",""); 
    const dbname = 'ssalisson';
    const host = 'localhost';
    const user = 'root';
    const senha = '';

    try {
        $pdo = new PDO('mysql:host='.host.';dbname='.dbname.'', user, senha, [PDO::MYSQL_ATTR_INIT_COMMAND =>  "SET NAMES 'UTF8'"]);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Vai mostrar erros caso exista.
    }catch (PDOException $e) { /*Pegue a exception e coloque na variável $e */
        echo 'Erro ao conectar ao banco de dados';
        echo $e;
    } 
    

?>
