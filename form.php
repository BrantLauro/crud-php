<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
<input type="hidden" name="id" value="<?= $id ?? 0 ?>">
    <label for="nome">Nome: </label>
    <input type="text" name="nome" id="nome" value="<?= $nome ?? "" ?>" required> <br> <br>
    <label for="email">Email: </label>
    <input type="email" name="email" id="email" value="<?= $email ?? "" ?>" required> <br> <br>
    <label for="telefone">Telefone: </label>
    <input type="text" name="telefone" id="telefone"  value="<?= $telefone ?? "" ?>" required> <br> <br>
    <label for="cpf">CPF: </label>
    <input type="text" name="cpf" id="cpf"  value="<?= $cpf ?? "" ?>" required> <br> <br>
    <input type="submit" name="OK" value="OK">
</form>