<?php
    // Iniciar sessão
    session_start();

    // Importar conexão
    include_once("../connection.php");

    // Obter dados
    $nome = addslashes($_POST["nome"]);
    $email = addslashes($_POST["email"]);
    $senha = addslashes($_POST["senha"]);
    $senha2 = addslashes($_POST["senha2"]);
    $idioma = $_POST["idioma"];

    // Valida o e-mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location:../login.php?language=en&falhaEmail",  true,  301);  exit;
    }

    // Validação
    if($nome == "" || $email == "" || $senha == "" || $senha2 == ""){
        if($idioma == "en"){
            header("Location:../login.php?language=en&camposPreenchidos",  true,  301);  exit;
        }else if($idioma == "fr"){
            header("Location:../login.php?language=fr&camposPreenchidos",  true,  301);  exit;
        }else{
            header("Location:../login.php?language=pt&camposPreenchidos",  true,  301);  exit;
        }
    }else if($senha != $senha2){
        if($idioma == "en"){
            header("Location:../login.php?language=en&senhasDiferentes",  true,  301);  exit;
        }else if($idioma == "fr"){
            header("Location:../login.php?language=fr&senhasDiferentes",  true,  301);  exit;
        }else{
            header("Location:../login.php?language=pt&senhasDiferentes",  true,  301);  exit;
        }
    }else{

        // Verifica se existe o e-mail
        $sql = "SELECT * FROM alunos WHERE email = '$email'";
        $resultado = $conn->query($sql);

        // Condicional para verificar se o SQL retorna pelo menos uma linha
        if ($resultado->num_rows > 0) {
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
            $sql = "INSERT INTO alunos (nome, email, senha, situacao) VALUES ('$nome', '$email', '$senha', 0)";
            // Realiza a inserção
            $conn->query($sql);

            // Fechar a conexão
            $conn->close();

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
    }

?>