<?php
include 'db.php';
$conn = conectarBanco();

$id = $_GET['idTarefa'] ?? 0;
$sql = "SELECT * FROM tarefas WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$res = $stmt->get_result();
$tarefa = $res->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Tarefa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <style>
        body {
            background-color: #f1e4ff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #2e003e;
        }
        .card {
            border-radius: 12px;
        }
        h1 {
            color: #2e003e;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-sm p-4">
            <h1 class="mb-4"><i class="bi bi-pencil-square text-primary"></i> Editar Tarefa</h1>

            <?php if(isset($_GET['sucesso'])): ?>
                <div class="alert alert-success">Tarefa atualizada com sucesso!</div>
            <?php endif; ?>

            <form method="post" action="processaEditaTarefa.php">
                <input type="hidden" name="id" value="<?= $tarefa['id'] ?>">

                <div class="mb-3">
                    <label class="form-label">Nome:</label>
                    <input type="text" name="nome" class="form-control" value="<?= htmlspecialchars($tarefa['nome']) ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Data de início:</label>
                    <input type="date" name="data_inicio" class="form-control" value="<?= $tarefa['data_inicio'] ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Data de fim:</label>
                    <input type="date" name="data_fim" class="form-control" value="<?= $tarefa['data_fim'] ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Tempo diário:</label>
                    <input type="text" name="tempo_diario" class="form-control" value="<?= $tarefa['tempo_diario'] ?>">
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-circle"></i> Salvar
                </button>
                <a href="frontTarefas.php" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
