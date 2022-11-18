<?php
    // Importar conexão
    include_once("../../connection.php");

    // Obter dados
    $codigo = $_POST["codigo"];
    $titulo = addslashes($_POST["titulo"]);
    $pais = addslashes($_POST["pais"]);
    $mensagem = addslashes($_POST["mensagem"]);
    $imagem = $_FILES["imagem"]["name"];

    if($_POST["nome_sem_extensao"] == ""){
        $antigo = uniqid() . "-" . time();
    }else{
        $antigo = addslashes($_POST["nome_sem_extensao"]);
    }

    // SQL
    if($imagem == ""){
        $sql = "UPDATE conteudo_paises SET titulo = '$titulo', pais = '$pais', mensagem = '$mensagem' WHERE codigo = $codigo";
    }else{
        $img = pathinfo($imagem, PATHINFO_EXTENSION );
        $img_nome = $antigo . "." . $img;

        move_uploaded_file($_FILES["imagem"]["tmp_name"], "../../countries/".$img_nome);

        $sql = "UPDATE conteudo_paises SET titulo = '$titulo', pais = '$pais', imagem = '$img_nome', mensagem = '$mensagem' WHERE codigo = $codigo";
    }

    // Realiza a alteração
    $conn->query($sql);

    // Fechar a conexão
    $conn->close();

    // Redirecionamento
    header("Location:../countries.php?paisAlterado",  true,  301);  exit;

?>