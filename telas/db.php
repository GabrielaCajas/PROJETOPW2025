<?php
function conectarBanco() {
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $db = "gerenciador_tarefas";
 
    $conn = new mysqli($servidor, $usuario, $senha, $db);
 
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }
 
    return $conn;
}
?>