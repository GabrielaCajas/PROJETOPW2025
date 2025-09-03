<?php
// frontTarefas.php

// 1) Sessão (evita o aviso de sessão duplicada)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 2) Conexão (garante $conn mesmo se a página for acessada direto)
require_once __DIR__ . '/../db.php';

// cria a conexão
$conn = conectarBanco();

if (!$conn || $conn->connect_errno) {
    die('Erro na conexão com o banco: ' . ($conn ? $conn->connect_error : 'sem conexão'));
}

// 3) Consulta (preenche $tarefas; não usamos $result no HTML)
$tarefas = [];
$sql = "SELECT id, nome, data_inicio, data_fim, tempo_diario
        FROM tarefas
        ORDER BY id DESC";
if ($res = $conn->query($sql)) {
    while ($row = $res->fetch_assoc()) {
        $tarefas[] = $row;
    }
    $res->free();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Sucesso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background-color: #f1e4ff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #2e003e;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg" style="background-color:rgba(190, 160, 241, 0.81);">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center me-4">
            <div class="logo"><img class="logo" src="Logo-Photoroom.png" style="width: 80px; height: 80px;"></div>
        </div>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link text-dark fw-medium" href="#">Eventos</a></li>
            <li class="nav-item"><a class="nav-link text-dark fw-medium" href="#">Check-in</a></li>
            <li class="nav-item"><a class="nav-link text-dark fw-medium" href="frontTarefas.php">Tarefas diárias</a></li>
            <li class="nav-item"><a class="nav-link text-dark fw-medium" href="frontAddTarefas.php">Criar categoria</a></li>
        </ul>
        <div class="d-flex align-items-center gap-3">
            <i class="bi bi-person-circle fs-4"></i>
            <input type="text" class="form-control form-control-sm" placeholder="Pesquisar" >
            <i class="bi bi-list fs-4"></i>
        </div>
    </div>
</nav>

<!-- Script da janelinha -->
<?php if (isset($_GET['sucesso']) && $_GET['sucesso'] == 1): ?>
<script>
Swal.fire({
    icon: 'success',
    title: 'Sucesso!',
    text: 'Tarefa adicionada com sucesso!',
    confirmButtonText: 'Ok'
});
</script>
<?php endif; ?>

<div class="container mt-4">
    <h2 class="mb-4">
        <i class="bi bi-clipboard-check text-primary"></i> Lista de Tarefas
    </h2>

    <a href="frontAddTarefas.php" class="btn btn-success mb-4">
        <i class="bi bi-plus-circle"></i> Adicionar Tarefa
    </a>

    <?php if (!empty($tarefas)): ?>
    <div class="row">
        <?php foreach ($tarefas as $linha): ?>
            <div class="col-md-4 mb-3">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?= htmlspecialchars($linha['nome']) ?>
                        </h5>
                        <p class="card-text">
                            <small>
                                <strong>Início:</strong> <?= htmlspecialchars($linha['data_inicio']) ?><br>
                                <strong>Fim:</strong> <?= htmlspecialchars($linha['data_fim']) ?><br>
                                <strong>Tempo diário:</strong> <?= htmlspecialchars($linha['tempo_diario']) ?>h
                            </small><br><br>
                            <a class="btn btn-outline-danger"
                            href="../excluirTarefas.php?idTarefa=<?= urlencode($linha['id']) ?>"
                            onclick="return confirm('Tem certeza que deseja excluir esta tarefa?');" style="">
                            Excluir
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <div class="alert alert-warning">Nenhuma tarefa cadastrada.</div>
<?php endif; ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
