<?php
    // Importar conexão
    include_once("../../connection.php");

    // Obter dados
    $situacao = $_GET["situacao"];
    $codigo = $_GET["codigo"];

    // SQL
    if($situacao == 0){
        $sql = "UPDATE alunos SET situacao = 1 WHERE codigo = $codigo";
    }else{
        $sql = "UPDATE alunos SET situacao = 0 WHERE codigo = $codigo";;
    }

    // Realiza a alteração
    $conn->query($sql);

    // Fechar a conexão
    $conn->close();

    // Redirecionamento
    header("Location:../students.php?estudanteAlterado",  true,  301);  exit;

?>