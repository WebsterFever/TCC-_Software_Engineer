<?php

    // Obter dados
    $idioma = $_POST["idioma"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $assunto = $_POST["assunto"];
    $mensagem = $_POST["mensagem"];

    // Enviar e-mail com a senha
    $emaildestinatario = "webstersevenlanguages@gmail.com";

    // Montando a mensagem a ser enviada no corpo do e-mail.
    $mensagemHTML = '
            <img src="http://webstersevenlanguages.com/images/logo.png">
            <hr>
            <p>Name: <b>'.$nome.'</b><p>
            <p>E-mail: <b>'.$email.'</b><p>
            <p>Subject: <b>'.$assunto.'</b><p>
            <p>Message: <b>'.$mensagem.'</b><p>';
    
    
    // O remetente deve ser um e-mail do seu domínio conforme determina a RFC 822.
    // O return-path deve ser ser o mesmo e-mail do remetente.
    $headers = "MIME-Version: 1.1\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";
    $headers .= "From: $email\r\n";

    // remetente
    $headers .= "Return-Path: $emaildestinatario \r\n";

    // return-path
    $envio = mail($emaildestinatario, $assunto, $mensagemHTML, $headers);

    //Redirecionamento
    if($idioma == "en"){
        header("Location:index.php?language=en&enviado",  true,  301);  exit;
    }else if($idioma == "fr"){
        header("Location:index.php?language=fr&enviado",  true,  301);  exit;
    }else{
        header("Location:index.php?language=pt&enviado",  true,  301);  exit;
    }

?>