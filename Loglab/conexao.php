<?php

$hostname = "localhost";
$bancodedados = "login";
$usuario = "root";
$senha = "";

$mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados) or die ('nao conectado');

if ($mysqli->connect_errno) {
    echo "Falha na conexão com o banco de dados: " . $mysqli->connect_error;
    // Você pode adicionar aqui qualquer tratamento de erro que desejar.
} else 
   echo "RODANDO OK";

   /* Campo feito para area de testes
   caso o sql nao esteja conectando a mensagem
   falha de conexão aparecerá. Para confirmar a conexão 
   escreva uma mensangem em else>echo "mensangem validade". */

?>
