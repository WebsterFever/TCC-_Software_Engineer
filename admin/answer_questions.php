<?php

    // Conexão
    include_once("../connection.php");

    // Obter dados
    $codigo_pergunta = $_POST["codigo_pergunta"];
    $codigo_aula = $_POST["codigo_aula"];
    $codigo_aluno = $_POST["codigo_aluno"];
    $mensagem = addslashes($_POST["mensagem"]);
    $arquivo = $_FILES["arquivo"]["name"];

    // Fuso horário
    date_default_timezone_set('America/Sao_Paulo');

    // Data e hora
    $data_hora = date('Y/m/d H:i:s');

    // Alterar o status de pendente da pergunta
    $sql = "UPDATE perguntas SET situacao = 'Ok' WHERE codigo = $codigo_pergunta";
    $conn->query($sql);

    // Enviar resposta/
    if($arquivo == ""){
        $sql = "INSERT INTO perguntas (mensagem, situacao, codigo_aluno, codigo_aula, data_hora) VALUES ('$mensagem', 'Ok', $codigo_aluno, $codigo_aula, '$data_hora')";
    }else{
        // Nome único
        $nome_arquivo   = uniqid() . "-" . time();

        // Extrair extensões
        $arq  = pathinfo($arquivo, PATHINFO_EXTENSION );

        // Gerar novo nome
        $arq_nome = $nome_arquivo . "." . $arq;

        $sql = "INSERT INTO perguntas (mensagem, situacao, codigo_aluno, codigo_aula, arquivo, data_hora) VALUES ('$mensagem', 'Ok', $codigo_aluno, $codigo_aula, '$arq_nome', '$data_hora')";
        
        move_uploaded_file($_FILES["arquivo"]["tmp_name"], "../question_files/".$arq_nome);
    }

    $conn->query($sql);

    // Redirecionamento
    header("Location:admin.php",  true,  301);  exit;

?>