<?php

// Conex«ªo
include_once("../connection.php");
    
// Fuso
date_default_timezone_set('America/Sao_Paulo');

// Obter dados
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

// Gerar data e hora
$data_hora = date('Y-m-d H:i:s');

// Inserir
$sql = "INSERT INTO chat VALUES (null, '$request->usuario', '$data_hora', '$request->mensagem')";

// Executar
$conn->query($sql);

// Fechar conexÃ£o
$conn->close();

$retorno = array(
    "usuario"=>$request->usuario,
    "data_hora"=>$data_hora,
    "mensagem"=>$request->mensagem
);

echo json_encode($retorno);
?>
