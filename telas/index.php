<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include_once("db.php");
include("header.php");

// Conecta com o banco
$conn = conectarBanco();
if (!$conn) {
    die("Erro na conexão com o banco: " . mysqli_connect_error());
}

$pagina = 'frontCadastro'; // Página padrão

// Verifica se é um POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $data_inicio = trim($_POST['data_inicio'] ?? '');
    $data_fim = trim($_POST['data_fim'] ?? '');
    $tempo_diario = trim($_POST['tempo_diario'] ?? '');

    // Verifica se todos os campos estão preenchidos
    if ($nome && $data_inicio && $data_fim && $tempo_diario) {

        $sql = "INSERT INTO tarefas (nome, data_inicio, data_fim, tempo_diario) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ssss", $nome, $data_inicio, $data_fim, $tempo_diario);
            if ($stmt->execute()) {
                $pagina = 'frontTarefas';
            } else {
                // Erro ao executar
                $_SESSION['erro'] = "Erro ao inserir tarefa: " . $stmt->error;
                $pagina = 'frontAddTarefas';
            }
            $stmt->close();
        } else {
            $_SESSION['erro'] = "Erro ao preparar a query: " . $conn->error;
            $pagina = 'frontAddTarefas';
        }

    } else {
        $_SESSION['erro'] = "Preencha todos os campos.";
        $pagina = 'frontAddTarefas';
    }
} else {
    // Se não for POST, exibe home
    $pagina = 'frontCadastro';
}

// Exibe a página correta
switch ($pagina) {
    case 'frontTarefas':
        include 'views/frontTarefas.php';
        break;
    case 'frontAddTarefas':
        include 'views/frontAddTarefas.php';
        break;
    default:
        include 'views/frontCadastro.php';
        break;
}

$conn->close();
include 'footer.php';
?>