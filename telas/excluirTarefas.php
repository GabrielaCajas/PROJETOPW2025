<?php
include 'db.php';

$conn = conectarBanco();

$idTarefa = $_GET['idTarefa'] ?? null;

if ($idTarefa && is_numeric($idTarefa)) {
    $query = "DELETE FROM tarefas WHERE id = $idTarefa";
    mysqli_query($conn, $query);
}

header('Location: views/frontTarefas.php');
exit;

