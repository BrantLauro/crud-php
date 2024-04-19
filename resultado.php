<!DOCTYPE html>
<html lang="en">
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
    <?php include "bd.php"; ?>
    <br>
    <section>
        <h1>Resultado da pesquisa:</h1>
        <?php
            
            conecta();
            if($pessoas =  pesquisaNome($_POST["nome"] ?? "")) {
                for($i = 0; $i < sizeof($pessoas); $i++) {
                    echo "Nome:  {$pessoas[$i]['nome']}<br>";
                    echo "CPF: {$pessoas[$i]['cpf']}<br>";
                    echo "Email: {$pessoas[$i]['email']}<br>";
                    echo "Telefone: {$pessoas[$i]['telefone']}<br>";
                    echo "<a href='editar.php?{$pessoas[$i]['id']}'><button>Editar</button></a>
                    <a href='resultado.php?excluir={$pessoas[$i]['id']}'><button>Excluir</button></a>";
                    echo "<hr><br>";
                }
            } else {
                echo "Sem registros!";
            }

            if(isset($_GET["excluir"])) {
                $string  = excluir($_GET['excluir']);
                header("Location: index.php");
                if($string)
                    echo "<script>alert('Excluido com sucesso!')</script>";
                else 
                    echo "<script>alert('Erro ao excluir!')</script>";
                    
            }
            fecha();
        ?>
    </section>

</body>
</html>