<?php include "../config/menu.php"; ?>
<?php include "../config/conexao.php";
?>




<!DOCTYPE html>
<html>
<head>

</head>
<body>
<!--Area de perfil HTML-->
<div class="row">
    <div class="perfil">
        <div class="perfil-body">
            <!-- a sigla $stmt, serve para puxar informações do banco de dados -->
            <?php $sql= "SELECT id, nome, email FROM usuario";
            $stmt = $pdo -> prepare($sql);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario) {
                echo "Nome: " .htmlspecialchars($usuario['nome']). "<br>";
                echo "Email: " .htmlspecialchars($usuario['email']). "<br>";

            }else{
                echo "Perfl não encontrado";
            }
            ?>
        </div>
    </div>
</div>

</body>
