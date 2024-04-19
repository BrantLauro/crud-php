<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body>
    <br>
    <section>
        <h1>Login no Sistema</h1>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha">
            <input type="submit" value="OK">
        </form>
        <a href="cadastrar.php"><button>Cadastrar</button></a>
        <?php
            include "funcoes.php";
            include "bd.php";
            $email = $_POST['email'] ?? "";
            $senha = $_POST['senha'] ?? "";
           if ($email != "" && $senha != "") {
                conecta();
                $res =  autenticaUser($email, md5($senha));
                echo $res;
                fecha();
                if ($res) 
                    redirect("pesquisa-cadastro.php");
                else
                    alerta("Usuário ou Senha incorretos!");
                exit();
            } 
        ?>
    </section>
</body>

</html>