
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Nova Tarefa</title>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }
 
    body {
      background-color: #e9e1fa;
      font-family: 'Segoe UI', Tahoma, 'Geneva', Verdana, sans-serif;
      color: #2e003e;
    }
 
    .navbar .nav-link {
    font-weight: 500;
    font-size: 15px;
    }
 
    /* Título da seção */
    .title-section {
      margin: 30px auto 10px;
      width: max-content;
      padding: 6px 20px;
      background-color:rgb(183, 153, 240);
      color:rgb(71, 35, 83);
      font-weight: bold;
      border-radius: 3px;
    }
 
    /* Formulário */
    .form-wrapper {
      background-color:rgb(213, 196, 245);
      width: 350px;
      margin: 30px auto;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0,0,0,0.05);
    }
 
    .form-group {
      margin-bottom: 20px;
    }
 
 
    label {
      display: block;
      margin-bottom: 6px;
      font-weight: bold;
    }
 
    input[type="text"],
    input[type="date"] {
      width: 100%;
      padding: 10px;
      border-radius: 6px;
      border: none;
      font-size: 14px;
    }
 
    input::placeholder {
      color: #999;
      font-style: italic;
    }
 
    .submit-btn {
      margin-top: 20px;
      text-align: center;
      color: #2e003e;
      font-weight: bold;
      cursor: pointer;
    }
 
    .submit-btn button {
      background: none;
      border: 2px solid #2e003e;
      color: #2e003e;
      font-size: 24px;
      border-radius: 50%;
      width: 48px;
      height: 48px;
      margin-top: 10px;
      transition: background 0.3s;
    }
 
    .submit-btn button:hover {
      background-color: #2e003e;
      color: white;
    }
  </style>
</head>
<body>
<link rel="stylesheet" href="/proj_pw/proj_pw-main/telas/footer.php">

  <!-- NAVBAR -->
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
  
 
  <!-- FORMULÁRIO -->

  <div class="form-wrapper">
  <form action="/proj_pw/proj_pw-main/telas/conexaoAddTarefas.php" method="POST">
      <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" placeholder="Obrigatório" required>
      </div>
      <div class="form-group">
        <label for="inicio">Data de início:</label>
        <input type="date" id="inicio" name="data_inicio" required>
      </div>
      <div class="form-group">
        <label for="fim">Data de fim:</label>
        <input type="date" id="fim" name="data_fim" required>
      </div>
      <div class="form-group">
        <label for="tempo">Tempo diário:</label>
        <input type="text" id="tempo" name="tempo_diario" placeholder="Obrigatório" required>
      </div>
      <div class="submit-btn" value="Salvar">
        Adicionar tarefa diária
        <br>
        <button type="submit">+</button>
      </div>
    </form>
  </div>
 
</body>
</html>
 