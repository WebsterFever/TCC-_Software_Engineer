<?php
    // Sessão
    session_start();

    // Conexão
    include_once("../connection.php");

    // Obter dados
    $comentario = addslashes($_POST["mensagem"]);
    $link_atual = addslashes($_POST["link_atual"]);
    $codigo_aula = addslashes($_POST["codigo_aula"]);

    // Adicionar parâmetro no link atual
    $link_atual .= "&comentarioRealizado";

    // Obter o e-mail da sessão
    $email = addslashes($_SESSION["student_email"]);

    // Obter o código do aluno
    $codigo_aluno = 0;
    $sql = "SELECT codigo FROM alunos WHERE email = '$email'";
    $resultado = $conn->query($sql);
    while($linha = $resultado->fetch_assoc()) {
        $codigo_aluno = $linha["codigo"];
    }

    // Fuso horário
    date_default_timezone_set('America/Sao_Paulo');

    // Data e hora
    $data_hora = date('Y/m/d H:i:s');


        $sql = "INSERT INTO comentarios (comentario, codigo_aluno, codigo_aula, data_hora) VALUES ('$comentario', $codigo_aluno, $codigo_aula, '$data_hora')";

    $conn->query($sql);

    // Redirecionamento
    header("Location:$link_atual",  true,  301);  exit;
?>