<?php
global $livro_1;
include "../dados.php";

include "../config/conexao.php";

$sql = "SELECT * FROM livro";

$stmt = $pdo->prepare($sql);
$stmt->execute();

$livros = $stmt->fetchAll(PDO::FETCH_ASSOC);

session_start();

if(isset($_POST["pesquisa"])) {

    $pesquisa = $_POST["pesquisa"];
        if($pesquisa == "") {

            echo "Preencha o campo de Pesquisa.";

        }else{

            if($pesquisa == "Codigo Limpo" || $pesquisa == "Outros jeitos de usar a boca" || $pesquisa == "O que o sol faz com as flores" || $pesquisa == "Mitologia Nordica") {

                    $_SESSION["pesquisa"] = $pesquisa;

            }else{

                echo "Livro não encontrado ou Indisponível";
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

<?php 
include "../config/menu.php"; ?>

<a href="livro_cadastrar.php">Cadastrar livro</a>


<div class="container">
    <?php foreach ($livros as $livro): ?>
        <div class="card mb-3">
            <div class="card-body">
                <h3 class="card-title"><?= $livro["titulo"] ?></h3>
                <p><strong>Autor: </strong> <?= $livro["autor"]?></p>
                <p><strong>Categoria: </strong><?= $livro["categoria"]?></p>
                <p><strong>Ano: </strong><?= $livro["ano"]?></p>
                <p><strong>Quantidade: </strong><?= $livro["quantidade"]?></p>
                <a href="../page_emprestimo/emprestimos.php?id=<?= $livro['id'] ?>">Pedir empréstimo</a>
                <a href="livro_editar.php?id=<?= $livro['id'] ?>">Editar</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>
