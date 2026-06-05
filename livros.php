<?php
global $livro_1;
include "dados.php";

session_start();

if(isset($_POST["pesquisa"])) {

    $pesquisa = $_POST["pesquisa"];
        if($pesquisa == "") {

            echo "Preencha o campo de Pesquisa.";

        }else{

            if($pesquisa == "Codigo Limpo" || $pesquisa == "Outros jietos de usar a boca" || $pesquisa == "O que o sol faz com as flores" || $pesquisa == "Mitologia Nordica") {

                    $SESSION["pesquisa"] = $pesquisa;

            }else{

                echo "Livro não encontrado ou Idisponivel";
            }
        }
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include "menu.php"; ?>

<div class="container">
    <?php foreach ($livros as $livro): ?>
        <div class="card mb-3">
            <div class="card-body">
                <h3 class="card-title"><?= $livro["titulo"] ?></h3>
                <p><strong>Autor: </strong> <?= $livro["autor"]?></p>
                <p><strong>Categoria: </strong><?= $livro["categoria"]?></p>
                <p><strong>Ano: </strong><?= $livro["ano"]?></p>
                <p><strong>Quantidade: </strong><?= $livro["quantidade"]?></p>
            </div>
        </div>
    <?php endforeach; ?>

    <?php foreach ($livros as $livro_2): ?>
        <div class="card mb-3">
            <div class="card-body">
                <h3 class="card-title"><?= $livro_2["titulo"] ?></h3>
                <p><strong>Autor: </strong> <?= $livro["autor"]?></p>
                <p><strong>Categoria: </strong><?= $livro["categoria"]?></p>
                <p><strong>Ano: </strong><?= $livro_2["ano"]?></p>
                <p><strong>Quantidade: </strong><?= $livro_2["quantidade"]?></p>
    <?php endforeach; ?>
            </div>
        </div>
</div>

</body>
</html>
