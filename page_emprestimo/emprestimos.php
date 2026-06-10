<?php

include "../config/conexao.php";

$id = $_GET['id'];


$sql = "SELECT * FROM livro WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

$livro = $stmt->fetch(PDO::FETCH_ASSOC);


$sql = "SELECT id, nome FROM usuario";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $usuario_id = $_POST["usuario_id"];
    $livro_id = $_POST["livro_id"];

    $sql = "SELECT quantidade FROM livro WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$livro_id]);

    $livroSelecionado = $stmt->fetch(PDO::FETCH_ASSOC);

    if($livroSelecionado["quantidade"] > 0){
        $sql = "INSERT INTO emprestimos
        (usuario_id, livro_id, data_emprestimo)
        VALUES (?, ?, NOW())";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            $usuario_id,
            $livro_id
        ]);

        $sql = "UPDATE livro
                SET quantidade = quantidade - 1
                WHERE id = ?";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$livro_id]);

        echo "<p>Empréstimo realizado com sucesso!</p>";

    } else {

        echo "<p>Livro indisponível.</p>";

    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Empréstimo de Livro</title>
</head>
<body>

    <h1>Solicitar Empréstimo</h1>

    <h2>
        Livro selecionado:
        <?= $livro["titulo"] ?>
    </h2>

    <p>Autor: <?= $livro["autor"] ?></p>
    <p>Quantidade disponível: <?= $livro["quantidade"] ?></p>

    <form method="POST">

        <input
            type="hidden"
            name="livro_id"
            value="<?= $livro["id"] ?>"
        >

        <label>Usuário:</label>

        <select name="usuario_id" required>

            <?php foreach($usuarios as $usuario): ?>

                <option value="<?= $usuario["id"] ?>">
                    <?= $usuario["nome"] ?>
                </option>

            <?php endforeach; ?>

        </select>

        <br><br>

        <button type="submit">
            Pedir Empréstimo
        </button>

    </form>

</body>
</html>