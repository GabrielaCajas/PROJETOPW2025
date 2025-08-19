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
    <style>
        body {
            background-color: #f1e4ff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #2e003e;
        }

        .container-success {
            max-width: 600px;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(105, 52, 158, 0.2);
            padding: 40px 30px;
            margin: 80px auto;
            text-align: center;
        }

        .icon-success {
            font-size: 5rem;
            color: #a855f7;
            margin-bottom: 20px;
        }

        .message-success {
            font-size: 1.5rem;
            font-weight: 600;
            color: #4b0082;
            margin-bottom: 30px;
        }

        .btn-back {
            background-color: #a768e6;
            border: none;
            border-radius: 12px;
            padding: 12px 30px;
            font-size: 1.1rem;
            color: white;
            font-weight: 600;
            transition: background-color 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-back:hover {
            background-color: #7a3fcf;
            color: white;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg" style="background-color:rgba(190, 160, 241, 0.81);">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center me-4">
            <div class="logo"><img class="logo" src="Logo-Photoroom.png" style="width:  80px; height: 80px;"></div>
        </div>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link text-dark fw-medium" href="#">Eventos</a></li>
            <li class="nav-item"><a class="nav-link text-dark fw-medium" href="#">Check-in</a></li>
            <li class="nav-item"><a class="nav-link text-dark fw-medium" href="views/frontTarefas.php">Tarefas diárias</a></li>
            <li class="nav-item"><a class="nav-link text-dark fw-medium" href="views/frontAddTarefas.php">Criar categoria</a></li>
        </ul>
        <div class="d-flex align-items-center gap-3">
            <i class="bi bi-person-circle fs-4"></i>
            <input type="text" class="form-control form-control-sm" placeholder="Pesquisar" style="max-width: 200px; border-radius: 5px;">
            <i class="bi bi-list fs-4"></i>
        </div>
    </div>
</nav>


    <!-- Conteúdo principal -->
    <div class="container-success">
        <i class="bi bi-check-circle-fill icon-success"></i>
        <div class="message-success">Tarefa adicionada com sucesso!</div>
        <a href="views/frontAddTarefas.php" class="btn-back">Voltar para tarefas</a>
    </div>


<div class="container mt-4">
    <h2 class="mb-4">
        <i class="bi bi-clipboard-check text-primary"></i> Lista de Tarefas
    </h2>

    <a href="views/frontAddTarefas.php" class="btn btn-success mb-4">
        <i class="bi bi-plus-circle"></i> Adicionar Tarefa
    </a>

    <?php if (!empty($tarefas)): ?>
        <ul class="list-group">
            <?php foreach ($tarefas as $linha): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>
                        <strong><?= htmlspecialchars($linha['nome']) ?></strong><br>
                        <small>
                            Início: <?= htmlspecialchars($linha['data_inicio']) ?> | 
                            Fim: <?= htmlspecialchars($linha['data_fim']) ?> | 
                            Tempo diário: <?= htmlspecialchars($linha['tempo_diario']) ?>h
                        </small>
                    </span>
                    <span class="badge bg-primary rounded-pill">#<?= $linha['id'] ?></span>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <div class="alert alert-warning">Nenhuma tarefa cadastrada.</div>
    <?php endif; ?>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
