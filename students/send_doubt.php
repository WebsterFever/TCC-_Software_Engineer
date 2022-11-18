<?php
    // Sessão
    session_start();

    // Conexão
    include_once("../connection.php");

    // Obter dados
    $mensagem = addslashes($_POST["mensagem"]);
    $link_atual = addslashes($_POST["link_atual"]);
    $codigo_aula = addslashes($_POST["codigo_aula"]);
    $arquivo = $_FILES["arquivo"]["name"];
    
    $mensagem = str_replace(">","",$mensagem);
    $mensagem = str_replace("<","",$mensagem);
    $mensagem = str_replace("&gt;","",$mensagem);
    $mensagem = str_replace("&lt;","",$mensagem);
    

    // Adicionar parâmetro no link atual
    $link_atual .= "&perguntaRealizada";

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

    // Inserir pergunta
    if($arquivo == ""){
        $sql = "INSERT INTO perguntas (mensagem, situacao, codigo_aluno, codigo_aula, data_hora) VALUES ('$mensagem', 'Pendente', $codigo_aluno, $codigo_aula, '$data_hora')";
    }else{
        // Nome único
        $nome_arquivo   = uniqid() . "-" . time();

        // Extrair extensões
        $arq  = pathinfo($arquivo, PATHINFO_EXTENSION );

        // Gerar novo nome
        $arq_nome = $nome_arquivo . "." . $arq;

        $sql = "INSERT INTO perguntas (mensagem, situacao, codigo_aluno, codigo_aula, arquivo, data_hora) VALUES ('$mensagem', 'Pendente', $codigo_aluno, $codigo_aula, '$arq_nome', '$data_hora')";
        
        move_uploaded_file($_FILES["arquivo"]["tmp_name"], "../question_files/".$arq_nome);
        
    }

    $conn->query($sql);

    // Redirecionamento
    header("Location:$link_atual",  true,  301);  exit;
?>