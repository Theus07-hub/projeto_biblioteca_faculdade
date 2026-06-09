<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">    <title>Dashboard</title>
</head>
<body>

<?php include "menu.php"; ?>
<!-- Conceitos do Bootstrap -->

<div class="container" >
    <h3>Painel do Sistema</h3>
    <div class="row">
        <div class ="col-md-4">
            <div class="card">
                <a href="paginas/livros.php">
                    <div class="card-body">
                        <h5 class="card-title">Áreas de Livros</h5>
                        <p class="card-text">Veja e escolha os livros disponiveis.</p>
                    </div>
                </a>
            </div>
        </div>


        <div class ="col-md-4">
            <div class="card">
                <a href="paginas/usuarios.php">
                    <div class="card-body">
                        <h5 class="card-title">Acesso aos usuários cadastrados</h5>
                        <p class="card-text">Logins de usuários.</p>
                    </div>
                </a>
            </div>
        </div>

        <div class ="col-md-4">
            <div class="card">
                <a href="paginas/emprestimos.php">
                <div class="card-body">
                    <h5 class="card-title">Registro e cadastro de empréstimos</h5>
                    <p class="card-text">Área de empréstimos, veja os usuários que possuem empréstimos de livro.</p>
                </div>
                </a>
            </div>
        </div>


    </div> <!-- Fechamento da div ROW -->
</div><!-- Fechamento da div container -->


</body>
</html>
