<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Nova Tarefa</title>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
  <!-- ✅ Importando Bootstrap corretamente -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #e9e1fa;
      font-family: 'Nunito', sans-serif;
      color: #2e003e;
    }

    .navbar {
      background-color: rgba(190, 160, 241, 0.81);
      padding: 10px 20px;
    }

    .navbar .logo img {
      width: 60px;
      height: 60px;
    }

    .navbar-nav .nav-link {
      font-weight: 600;
      color: #2e003e !important;
      margin: 0 10px;
      transition: color 0.3s;
    }

    .navbar-nav .nav-link:hover {
      color: #5a189a !important;
    }

    /* Formulário */
    .form-wrapper {
      background-color: #fff;
      width: 400px;
      margin: 60px auto;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 6px 15px rgba(0,0,0,0.08);
    }

    .form-group label {
      font-weight: 600;
      margin-bottom: 6px;
      display: block;
      color: #4b0082;
    }

    .form-control {
      border-radius: 10px;
      border: 1px solid #c8a8e9;
      padding: 10px;
      font-size: 15px;
    }

    .form-control:focus {
      border-color: #7b2cbf;
      box-shadow: 0 0 5px rgba(123, 44, 191, 0.4);
    }


    input[type="date"] {
      color: #2e003e;
    }

/* Permite usar placeholder */
    input[type="date"]:invalid::before {
      content: attr(placeholder);
      color: #999;
    }

    .submit-btn {
      text-align: center;
      margin-top: 20px;
    }

    .submit-btn button {
      background: #7b2cbf;
      color: #fff;
      border: none;
      font-size: 22px;
      border-radius: 50%;
      width: 50px;
      height: 50px;
      transition: 0.3s;
    }

    .submit-btn button:hover {
      background: #5a189a;
      transform: scale(1.05);
    }
  </style>
</head>
<body>

  <!-- NAVBAR ORGANIZADA -->
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand logo" href="#">
        <img src="Logo-Photoroom.png" alt="Logo">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="menuNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="#">Eventos</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Check-in</a></li>
          <li class="nav-item"><a class="nav-link" href="frontTarefas.php">Tarefas diárias</a></li>
          <li class="nav-item"><a class="nav-link" href="frontAddTarefas.php">Criar categoria</a></li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Pesquisar">
        </form>
      </div>
    </div>
  </nav>

  <!-- FORMULÁRIO -->
  <div class="form-wrapper">
    <form action="../conexaoAddTarefas.php" method="POST">
      <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" class="form-control" placeholder="Obrigatório" required>
      </div>
      <div class="form-group">
        <label for="inicio">Data de início:</label>
        <input type="date" id="inicio" name="data_inicio" class="form-control" 
          onfocus="this.showPicker()" 
            placeholder="Selecione a data" required>
      </div>

      <div class="form-group">
        <label for="fim">Data de fim:</label>
        <input type="date" id="fim" name="data_fim" class="form-control" 
          onfocus="this.showPicker()" 
          placeholder="Selecione a data" required>
    </div>

      <div class="form-group">
        <label for="tempo">Tempo diário:</label>
        <input type="text" id="tempo" name="tempo_diario" class="form-control" placeholder="Obrigatório" required>
      </div>
      <div class="submit-btn">
        <button type="submit">+</button>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
