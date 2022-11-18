<?php

    // Conexão
    include_once("connection.php");

    // Obter dados
    $linguagem = $_GET["language"];
    $email = $_GET["email"];

    // Senha
    $senha;

    // Obter a senha
    $sql = "SELECT senha FROM alunos WHERE email = '$email'";
    $resultado = $conn->query($sql);
    while($linha = $resultado->fetch_assoc()){
        $senha = $linha["senha"];
    }

    // Enviar e-mail com a senha
    $emaildestinatario = $email;

    // Montando a mensagem a ser enviada no corpo do e-mail.
    if($linguagem == "fr"){
        $mensagemHTML = '
        <table>
            <tr>
                <td><img src="http://webstersevenlanguages.com/images/logo.png"></td>
            </tr>

            <tr>
                <td>Votre mot de passe est: <b>'.$senha.'</b><td>
            </tr>
        </table>';
    }else if($linguagem == "pt"){
        $mensagemHTML = '
        <table>
            <tr>
                <td><img src="https://ralflima.com/Webster/v5/images/logo.png"></td>
            </tr>

            <tr>
                <td>Sua senha é: <b>'.$senha.'</b><td>
            </tr>
        </table>';
    }else{
        $mensagemHTML = '
        <table>
            <tr>
                <td><img src="https://ralflima.com/Webster/v5/images/logo.png"></td>
            </tr>

            <tr>
                <td>Your password is: <b>'.$senha.'</b><td>
            </tr>
        </table>';
    }
    
    // O remetente deve ser um e-mail do seu domínio conforme determina a RFC 822.
    // O return-path deve ser ser o mesmo e-mail do remetente.
    $headers = "MIME-Version: 1.1\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";
    $headers .= "From: $email\r\n";

    // remetente
    $headers .= "Return-Path: $emaildestinatario \r\n";

    $assunto = "WSL - Password";

    // return-path
    $envio = mail($emaildestinatario, $assunto, $mensagemHTML, $headers);

    echo $envio;

    // Redirecionamento
    if($idioma == "pt"){
        header("Location:login.php?language=pt",  true,  301);  exit;
    }else if($idioma == "fr"){
        header("Location:login.php?language=fr",  true,  301);  exit;
    }else{
        header("Location:login.php?language=en",  true,  301);  exit;
    }

?>