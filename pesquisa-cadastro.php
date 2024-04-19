<?php 
    include("chave.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Pesquisa e cadastro de Usuários</title>
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
        <?php  
            echo "<p>Autenticado como: ".$_SESSION['email']." <a href='sair.php'> (sair) </a></p>";
        ?>
        <h1>Formulário de inclusão</h1>
        <?php 
            include "form.php";
            include "funcoes.php";
            include "bd.php";
            $nome = $_POST['nome'] ?? "";
            $email = $_POST['email'] ?? "";
            $telefone = $_POST['telefone'] ?? "";
            $cpf = $_POST['cpf'] ?? "";
            if($nome != "" && $email != "" && $telefone != "" && $cpf != "") {
                conecta();
                $res = inserir($nome, $email, $telefone, $cpf);
                if($res)
                    alerta("Inserido com sucesso!");
                else 
                    alerta("Erro ao inserir!");
                fecha();
            }
	    ?>
    </section>
</body>
</html>