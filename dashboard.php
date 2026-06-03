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
      <div class="col-md-4"> <!-- Coluna | md= em Tela media | ocupa 4 partes de 12 --> <!-- A ocupacao vem da grid do Bootstrap, proporcao -->
          <div class="card">
              <div class="card-body">
                  <h5 class="card-title">Livros</h5>
                  <p class="card-text">Confira os livros que os usuarios alugaram</p>
              </div>
          </div>
      </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Usuarios</h5>
                    <p class="card-text">Acesse a lista de usuarios ativos.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Emprestimos</h5>
                    <p class="card-text">Area de emprestimos dos usuarios.</p>
                </div>
            </div>
        </div>

    </div> <!-- Fechamento da div ROW -->
</div><!-- Fechamento da div container -->


</body>
</html>
