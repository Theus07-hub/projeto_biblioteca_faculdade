<?php

include "../config/conexao.php";
include "../config/menu.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $titulo = $_POST["titulo"];
    $autor = $_POST['autor'];
    $categoria = $_POST['categoria'];
    $ano = $_POST['ano'];
    $quantidade = $_POST['quantidade'];

    $sql = "INSERT INTO livro(titulo, autor, categoria, ano, quantidade)VALUES(?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $titulo,
        $autor,
        $categoria,
        $ano,
        $quantidade
    ]);

    echo "<p> Livro cadastrado com sucesso </p>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Cadastrar Livro</h1>

    <form method="POST">
        <label>Titulo</label>
        <input type="text" name="titulo" required><br><br>

        <label>Autor</label>
        <input type="text" name="autor" required><br><br>

        <label>Categoria</label>
        <input type="text" name="categoria" required><br><br>

        <label>Ano</label>
        <input type="number" name="ano" min="1000" max="9999" required><br><br>

        <label>Quantidade</label>
        <input type="text" name="quantidade" required><br><br>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>