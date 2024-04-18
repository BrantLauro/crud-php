<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Consulta a banco de dados MySQL</title>
</head>
<body>
    <br>
    <section>
        <h1>Formulário de consulta</h1>
        <form action="resultado.php" method="POST">
            <label for="nome">Nome: </label>
            <input type="text" name="nome" id="nome"> <br> <br>
            <input type="submit" name= "OK" value="OK">
        </form>
    </section>
    <br><br>
    <section>
        <h1>Formulário de inclusao</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
            <label for="nome">Nome: </label>
            <input type="text" name="nome" id="nome" required> <br> <br>
            <label for="email">Email: </label>
            <input type="email" name="email" id="email" required> <br> <br>
            <label for="telefone">Telefone: </label>
            <input type="text" name="telefone" id="telefone" required> <br> <br>
            <label for="cpf">CPF: </label>
            <input type="text" name="cpf" id="cpf" required> <br> <br>
            <input type="submit" name= "OK" value="OK">
        </form>
        <?php
            include "bd.php";
            $nome = $_POST['nome'] ?? "";
            $email = $_POST['email'] ?? "";
            $telefone = $_POST['telefone'] ?? "";
            $cpf = $_POST['cpf'] ?? "";
            if($nome != "" && $email != "" && $telefone != "" && $cpf != "") {
                conecta();
                echo "<p style='text-align:center;'>".inserir($nome, $email, $telefone, $cpf)."</p>";
                fecha();
            }
	    ?>
    </section>
</body>
</html>