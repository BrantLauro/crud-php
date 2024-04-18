<?php

    function conecta() {
        $conexao = mysqli_connect("localhost", "root", "", "unimontes");
        if(mysqli_connect_errno()) {
            die("Erro ao conectar no MySQL: ". mysqli_connect_error());
        }
        return $conexao;
    }

	function fecha() {
		mysqli_close(conecta());
	}

    function pesquisaNome($nome) {
        $sql = "select * from aluno where nome like '%$nome%';";
        $consulta = mysqli_query(conecta(), $sql);
        for($i = 0; $pessoa = mysqli_fetch_assoc($consulta); $i++) {
			$pessoas[$i] = $pessoa;
		}
		return $pessoas;
    }

    function inserir($nome, $email, $telefone, $cpf) {
        $sql = "insert into aluno (nome, email, telefone, cpf) values ('$nome','$email','$telefone','$cpf');";
        if(mysqli_query(conecta(), $sql)) {
            echo "Registro inserido com sucesso!";
        } else {
            echo "Erro ao inserir";
        }
    }