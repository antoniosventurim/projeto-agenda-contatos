<?php
// variaveis de conexao
    $host = "localhost";
    $dbname = "agenda";
    $user = "root";
    $pass = "";

    // realizando a conexão com o banco de dados
    try{
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);


        //ativar o modo de erros
        // Para o software e exibe o erro caso aconteça
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e){
        // se ouver erro na conexão
        $error = $e->getMessage();
        echo "Erro: $error";
    }