<?php

include "../config/conexao.php";
include "../config/menu.php";

$sql = "
SELECT
    e.id,
    u.nome AS usuario,
    l.titulo AS livro,
    e.data_emprestimo
FROM emprestimos e
INNER JOIN usuario u ON e.usuario_id = u.id
INNER JOIN livro l ON e.livro_id = l.id
ORDER BY e.data_emprestimo DESC
";

$stmt = $pdo->prepare($sql);
$stmt->execute();

$emprestimos = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Consultar Empréstimos</title>
</head>
<body>

<h1>Empréstimos Realizados</h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Usuário</th>
        <th>Livro</th>
        <th>Data</th>
    </tr>

    <?php foreach($emprestimos as $emprestimo): ?>
        <tr>
            <td><?= $emprestimo['id'] ?></td>
            <td><?= $emprestimo['usuario'] ?></td>
            <td><?= $emprestimo['livro'] ?></td>
            <td><?= $emprestimo['data_emprestimo'] ?></td>
        </tr>
    <?php endforeach; ?>

</table>

</body>
</html>