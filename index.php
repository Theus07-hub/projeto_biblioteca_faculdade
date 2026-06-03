<?php
//inicia a sessão :
session_start();

//isset= ele verifica se uma variavel foi declarada e se o seu valor é diferente de null
if(isset($_POST["email"])) {

$email = $_POST["email"]; //Linha de Código que recebe email enviado pelo usuário
$senha = $_POST["senha"]; //Linha de Código que recebe senha enviado pelo usuário

    if($email == "" || $senha == "") {

        echo "Preencha todos os campos!";

        }else{

            if($email == "matheuscampos@gmail.com" && $senha == "CamposNina13"){

                $_SESSION["email"] = $email;
                header("Location:dashboard.php");
                exit;
                //Serve para redirecionar o usuário para outra página.

            }else{

                echo "E-mail e senha incorretos, verifique as credenciais!";
            }


    }
    }


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>

<main>
    <h1> Login </h1>
    <form action="index.php" method="post">
        <h2>Entre na sua conta</h2>
            <div class = "form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="Digite seu e-mail: " required ><br>
                <!-- Divisão de Credenciais -->
                <label for="senha">Senha: </label>
                <input type="password" id="senha" name="senha" placeholder="Digite sua senha: " required>
                <button type="submit">Entrar</button>
            </div>
    </form>
</main>


</body>
</html>
