<?php 
    include("chave.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Resultado da busca</title>
    <style>
        section {
            font-size: 20px;
        }

        button {
            font-size: 13pt;
        }
    </style>
</head>
<body>
    <br>
    <section>
        <h1>Resultado da pesquisa:</h1>
        <?php
            include "bd.php";
            include "funcoes.php";
            conecta();
            if(@$pessoas =  pesquisaNome($_POST["nome"] ?? "")) {
                for($i = 0; $i < sizeof($pessoas); $i++) {
                    echo "Nome:  {$pessoas[$i]['nome']}<br>";
                    echo "CPF: {$pessoas[$i]['cpf']}<br>";
                    echo "Email: {$pessoas[$i]['email']}<br>";
                    echo "Telefone: {$pessoas[$i]['telefone']}<br>";
                    echo "<a href='editar.php?id={$pessoas[$i]['id']}'><button>Editar</button></a>
                    <a href='resultado.php?excluir={$pessoas[$i]['id']}'><button>Excluir</button></a>";
                    echo "<hr><br>";
                }
            } else {
                echo "Sem registros!<br><br>";
            }

            if(isset($_GET["excluir"])) {
                $res  = excluir($_GET['excluir']);
                if($res)
                    alerta("Excluido com sucesso!");
                else 
                    alerta("Erro ao excluir!");
                redirect("pesquisa-cadastro.php");
                fecha();
                exit();
            }
            fecha();
        ?>
    </section>

</body>
</html>