<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include_once("db.php");
include("header.php");

$conn = conectarBanco();

if (!$conn) {
    die("Erro na conexão com o banco: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $data_inicio = $_POST['data_inicio'] ?? '';
    $data_fim = $_POST['data_fim'] ?? '';
    $tempo_diario = $_POST['tempo_diario'] ?? '';

    if ($nome && $data_inicio && $data_fim && $tempo_diario) {
        $sql = "INSERT INTO tarefas (nome, data_inicio, data_fim, tempo_diario)
                VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $nome, $data_inicio, $data_fim, $tempo_diario);

        if ($stmt->execute()) {
            // Redireciona para a listagem (PRG pattern: Post/Redirect/Get)
            header("Location: views/frontTarefas.php?sucesso=1");
            exit;
        } else {
            echo "Erro na inserção: " . $stmt->error;
            header("Location: views/frontAddTarefas.php?erro=1");
            exit;
        }
        $stmt->close();
    } else {
        header("Location: views/frontAddTarefas.php?erro=campos");
        exit;
    }
} else {
    header("Location: views/frontAddTarefas.php?acesso_invalido=1");
    exit;
}

$conn->close();
include 'footer.php';
?>
