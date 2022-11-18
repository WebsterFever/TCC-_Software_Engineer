<?php

    // Conexão
    include_once("connection.php");

    // Obter o e-mail
    $email = $_GET["email"];

    // SQL
    $sql = "SELECT senha FROM alunos WHERE email = 'email'";
    $resultado = $conn->query($sql);
    $indice = 0;
    while($linha = $resultado->fetch_assoc()){
        echo $linha["senha"];
        $indice++;
    }

    echo $indice;
    // Finalizar conexão
    $conn->close();

?>