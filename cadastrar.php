<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastrar</title>
</head>
<body>
    <br>
    <section>
        <h1>Cadastro de Usuário!</h1>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha">
            <input type="submit" value="OK">
        </form>
        <?php
            include "funcoes.php";
            include "bd.php";
            $email = $_POST['email'] ?? "";
            $senha = $_POST['senha'] ?? "";
            if($email != "" && $senha != "") {
                conecta();
                $res = inserirUser($email, md5($senha));
                if($res)
                    alerta("Inserido com sucesso!");
                else 
                    alerta("Erro ao inserir!");
                redirect("index.php");
                fecha();
                exit();
            }
        ?>
    </section>
</body>
</html>