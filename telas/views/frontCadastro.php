<nav class="navbar navbar-expand-lg" style="background-color:rgba(190, 160, 241, 0.81);">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center me-4">
            <div class="logo"><img class="logo" src="Logo-Photoroom.png" style="width:  80px; height: 80px;"></div>
        </div>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link text-dark fw-medium" href="#">Eventos</a></li>
            <li class="nav-item"><a class="nav-link text-dark fw-medium" href="#">Check-in</a></li>
            <li class="nav-item"><a class="nav-link text-dark fw-medium" href="frontTarefas.php">Tarefas diárias</a></li>
            <li class="nav-item"><a class="nav-link text-dark fw-medium" href="frontAddTarefas.php">Criar categoria</a></li>
        </ul>
        <div class="d-flex align-items-center gap-3">
            <i class="bi bi-person-circle fs-4"></i>
            <input type="text" class="form-control form-control-sm" placeholder="Pesquisar" style="max-width: 200px; border-radius: 5px;">
            <i class="bi bi-list fs-4"></i>
        </div>
    </div>
</nav>

<!-- CONTEÚDO PRINCIPAL -->
<div class="container-fluid d-flex justify-content-center align-items-center" style="height: calc(100vh - 70px); background-color: #f1e4ff;">
    <div class="row bg-white rounded-3 shadow" style="max-width: 960px; width: 100%; overflow: hidden;">

        <!-- LADO ESQUERDO -->
        <div class="col-md-6 d-flex flex-column align-items-center justify-content-center py-5" style="background-color:rgba(194, 168, 239, 0.81);">
            <h2 class="fw-bold mb-4" style="color:rgb(132, 99, 170);">Bem vindo(a)!</h2>
            <button class="btn btn-lg text-white mb-3 w-75" style="background-color:rgb(167, 104, 226); border-radius: 10px;" onclick="window.location.href='conexaoAddTarefas.php'">Fazer login</button>
            <span class="text-muted mb-2">ou</span>
            <a href="cadastro.php" class="btn btn-outline-dark w-75 mb-3" style="border-radius: 10px;">Cadastrar-se</a>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="rememberMe">
                <label class="form-check-label text-muted" for="rememberMe">Manter-me conectado</label>
            </div>
        </div>

        <!-- LADO DIREITO -->
        <div class="col-md-6 d-flex flex-column justify-content-center p-5">
            <div class="text-center mb-4">
                <i class="bi bi-person-circle" style="font-size: 5rem; color: #a855f7;"></i>
            </div>
            <form action="conexaoAddTarefas.php" method="POST">
                <div class="mb-3">
                    <input type="text" class="form-control input-custom" name="usuario" placeholder="E-mail ou usuário" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control input-custom" name="senha" placeholder="Senha" required>
                </div>
                <div class="mb-3 text-start">
                    <a href="#" class="text-decoration-none" style="color: #7e57c2;">Esqueci minha senha</a>
                </div>
                <button type="submit" class="btn btn-lg text-white w-100" style="background-color:rgb(167, 104, 226); border-radius: 10px;">Entrar</button>

                <?php if (isset($_GET['erro'])) { ?>
                    <div class="alert alert-danger mt-3" role="alert">
                        Usuário e/ou senha inválido(s).
                    </div>
                <?php } ?>
            </form>
        </div>
    </div>
</div>