<?php
    // Iniciar sessão
    session_start();

    // Importar conexão
    include_once("../../connection.php");

    // Obter dados
    $email = addslashes($_POST["email"]);
    $senha = addslashes($_POST["senha"]);

    // Código do admin
    $codigo_admin = 0;

    // Criar conexão
    $sql = "SELECT codigo FROM admin WHERE email = '$email' AND senha = '$senha'";
    $resultado = $conn->query($sql);

    // Condicional para verificar se o SQL retorna pelo menos uma linha
    if ($resultado->num_rows > 0) {

        // Laço de repetição
        while($linha = $resultado->fetch_assoc()) {
            $codigo_admin = $linha["codigo"];

            $_SESSION["codigo_admin"] = $codigo_admin;
        }
    } 

    // Finalizar conexão
    $conn->close();

    // Condicional
    if($codigo_admin == 0){
        header("Location:../index.php?falhaLogin",  true,  301);  exit;
    }else{
        header("Location:../admin.php",  true,  301);  exit;
    }

?>