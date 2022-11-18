<?php

// Conexão
include_once("../connection.php");

// Selecionar
$sql = "SELECT * FROM chat";

// Obter mensagens
$mensagens = $conn->query($sql);

// Contador
$contador = 0;

// Selecionar
$sql = "SELECT * FROM chat";

// Obter mensagens
$mensagens = $conn->query($sql);

// Vetor
$vetor = [];

// Contador
$contador = 0;

// Laço de repetição
while($linha = mysqli_fetch_assoc($mensagens)){
    $vetor[$contador]["usuario"]   = $linha["usuario"];
    $vetor[$contador]["data_hora"] = $linha["data_hora"];
    $vetor[$contador]["mensagem"]  = $linha["mensagem"];

    $contador++;
}

// Fechar conexão
$conn->close();



echo json_encode(["mensagens"=>$vetor]);


//echo json_encode(stripslashes($estrutura));

//echo stripslashes(json_encode(["mensagem"=>$estrutura]));

//echo json_encode(["mensagens"=>$vetor]);

?>