<?php

include "../config/conexao.php";

if (!isset($_GET['id'])) {
    die("ID do livro não informado.");
}

$id = $_GET['id'];

$sql = "SELECT COUNT(*) as total
        FROM emprestimos
        WHERE livro_id = ?";

$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

if ($resultado['total'] > 0) {
    die("Não é possível excluir este livro, pois existem empréstimos vinculados a ele.");
}

$sql = "DELETE FROM livro WHERE id = ?";

$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

header("Location: livros.php");
exit;

?>