<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Resultado da busca</title>
</head>
<body>
    <br>
    <section>
        <h1>Resultado da pesquisa:</h1>
        <?php
            include "bd.php";
            conecta();
            if($pessoas = pesquisaNome($_POST["nome"])) {
                for($i = 0; $i < sizeof($pessoas); $i++) {
                    echo "Nome:  {$pessoas[$i]['nome']}<br>";
                    echo "CPF: {$pessoas[$i]['cpf']}<br>";
                        echo "Email: {$pessoas[$i]['email']}<br>";
                        echo "Telefone: {$pessoas[$i]['telefone']}<br>";
                    echo "<hr>";
                }
            } else {
                
            }
            fecha();
        ?>
    </section>

</body>
</html>