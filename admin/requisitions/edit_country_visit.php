<?php
    // Importar conexão
    include_once("../../connection.php");

    // Obter dados
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
        $sql = "UPDATE pais_visitado SET titulo = '$titulo', pais = '$pais', mensagem = '$mensagem'";
    }else{
        $img = pathinfo($imagem, PATHINFO_EXTENSION );
        $img_nome = $antigo . "." . $img;

        move_uploaded_file($_FILES["imagem"]["tmp_name"], "../../countries/".$img_nome);

        $sql = "UPDATE pais_visitado SET titulo = '$titulo', pais = '$pais', imagem = '$img_nome', mensagem = '$mensagem'";
    }

    // Realiza a alteração
    $conn->query($sql);

    // Fechar a conexão
    $conn->close();

    // Redirecionamento
    header("Location:../country_visit.php?paisAlterado",  true,  301);  exit;

?>