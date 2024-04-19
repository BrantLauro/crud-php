<?php 
    include("chave.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Editar registro</title>
</head>
<body>
    <br>
    <section>
        <h1>Formulário de Edição</h1>
        <?php
            include "bd.php";
            include "funcoes.php";
            $id_get = $_GET['id'] ?? 0;
            if($pessoa = pesquisaId($id_get)) {
                $id = $pessoa['id'];
                $nome = $pessoa['nome'];
                $email = $pessoa['email'];
                $telefone = $pessoa['telefone'];
                $cpf = $pessoa['cpf'];
            }
            include "form.php";
            $id_post = $_POST['id'] ?? 0;
            $nome = $_POST['nome'] ?? "";
            $email = $_POST['email'] ?? "";
            $telefone = $_POST['telefone'] ?? "";
            $cpf = $_POST['cpf'] ?? "";
            if($nome != "" && $email != "" && $telefone != "" && $cpf != "") {
                conecta();
                $res = editar($id_post, $nome, $email, $telefone, $cpf);
                if($res)
                    alerta("Editado com sucesso!");
                else 
                    alerta("Erro ao editar!");
                redirect("pesquisa-cadastro.php");
                fecha();
                exit();
            }
	    ?>
    </section>
</body>
</html>