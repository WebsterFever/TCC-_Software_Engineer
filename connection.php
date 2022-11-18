<?php
    // Acesso
    $servername = "localhost";
    $username = "admin";
    $password = "123";
    $dbname = "my_db";

    // Criar conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexão
    if ($conn->connect_error) {
        die("Falha: " . $conn->connect_error);
    } 
?>
