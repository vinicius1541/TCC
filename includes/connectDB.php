<?php
    define('HOST', 'localhost'); 
    //definindo uma constante HOST, que vai 				//ser o IP do Banco de Dados
    define('USER', 'root');
    //definindo usuario do BD
    define('PASSW','02052000');
    //definindo senha do BD
    define('DB', 'odonto_monicao');
    //definindo nome da base de dados

    $connection = mysqli_connect(HOST, USER, PASSW, DB) or die('ERRO AO TENTAR SE CONECTAR COM O BD');
?>