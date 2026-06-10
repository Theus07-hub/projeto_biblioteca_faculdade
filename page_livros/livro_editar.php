<?php

include "../config/conexao.php";
include "../config/menu.php";

if (!isset($_GET['id'])) {
    die("ID do livro não informado.");
}

$id = $_GET['id'];

$sql = "SELECT * FROM livro WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

$livro = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$livro) {
    die("Livro não encontrado.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $titulo = $_POST["titulo"];
    $autor = $_POST["autor"];
    $categoria = $_POST["categoria"];
    $ano = $_POST["ano"];
    $quantidade = $_POST["quantidade"];

    $sql = "UPDATE livro
            SET titulo = ?,
                autor = ?,
                categoria = ?,
                ano = ?,
                quantidade = ?
            WHERE id = ?";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $titulo,
        $autor,
        $categoria,
        $ano,
        $quantidade,
        $id
    ]);

    echo "<p>Livro atualizado com sucesso!</p>";

    // Atualiza os dados exibidos no formulário
    $sql = "SELECT * FROM livro WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    $livro = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Livro</title>
</head>
<body>

    <h1>Editar Livro</h1>

    <form method="POST">

        <label>Título</label><br>
        <input
            type="text"
            name="titulo"
            value="<?= htmlspecialchars($livro['titulo']) ?>"
            required
        >
        <br><br>

        <label>Autor</label><br>
        <input
            type="text"
            name="autor"
            value="<?= htmlspecialchars($livro['autor']) ?>"
            required
        >
        <br><br>

        <label>Categoria</label><br>
        <input
            type="text"
            name="categoria"
            value="<?= htmlspecialchars($livro['categoria']) ?>"
            required
        >
        <br><br>

        <label>Ano</label><br>
        <input
            type="number"
            name="ano"
            value="<?= htmlspecialchars($livro['ano']) ?>"
            required
        >
        <br><br>

        <label>Quantidade</label><br>
        <input
            type="number"
            name="quantidade"
            value="<?= htmlspecialchars($livro['quantidade']) ?>"
            required
        >
        <br><br>

        <button type="submit">
            Salvar Alterações
        </button>

    </form>

</body>
</html>