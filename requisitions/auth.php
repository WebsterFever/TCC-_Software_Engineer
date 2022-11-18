<?php
    // Iniciar sessão
    session_start();

    // Importar conexão
    include_once("../connection.php");

    // Obter dados
    $email = addslashes($_POST["email"]);
    $senha = addslashes($_POST["senha"]);
    $idioma = $_POST["idioma"];

    // Valida o e-mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location:../login.php?language=en&falhaEmail",  true,  301);  exit;
    }

    // Verifica se existe o e-mail
    $sql = "SELECT * FROM alunos WHERE email = '$email' AND senha = '$senha'";
    $resultado = $conn->query($sql);

    // Condicional para verificar se o SQL retorna pelo menos uma linha
    if ($resultado->num_rows == 0) {
        // Fechar a conexão
        $conn->close();

        // Redirecionamento
        if($idioma == "en"){
            header("Location:../login.php?language=en&falhaLogin",  true,  301);  exit;
        }else if($idioma == "fr"){
            header("Location:../login.php?language=fr&falhaLogin",  true,  301);  exit;
        }else{
            header("Location:../login.php?language=pt&falhaLogin",  true,  301);  exit;
        }
    }else{
        // Cria a sessão
        $_SESSION["student_email"] = $email;

        // Redirecionamento
        if($idioma == "en"){
            header("Location:../students/index.php?language=en",  true,  301);  exit;
        }else if($idioma == "fr"){
            header("Location:../students/index.php?language=fr",  true,  301);  exit;
        }else{
            header("Location:../students/index.php?language=pt",  true,  301);  exit;
        }
        
    }

?>