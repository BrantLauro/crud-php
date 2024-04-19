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

    function pesquisaId($id) {
        $sql = "select * from aluno where id = $id;";
        $consulta = mysqli_query(conecta(), $sql);
		return mysqli_fetch_assoc($consulta);
    }

    function inserir($nome, $email, $telefone, $cpf) {
        $sql = "insert into aluno (nome, email, telefone, cpf) values ('$nome','$email','$telefone','$cpf');";
        if(mysqli_query(conecta(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    function inserirUser($email, $senha) {
        $sql = "insert into users (email, senha) values ('$email','$senha');";
        if(mysqli_query(conecta(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    function autenticaUser($email, $senha) {
        session_start();
        $sql = "select * from users where email='$email' and senha = '$senha' LIMIT 1";
        $resultado = mysqli_query(conecta(), $sql);
        if(mysqli_num_rows($resultado) == 1) {
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['senha'] = $_POST['senha'];
            $_SESSION['autenticado'] = true;
            return true;
        } else {
            return false;
        }        
    }

    function excluir($id) {
        $sql = "delete from aluno where id = $id;";
        if(mysqli_query(conecta(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    function editar($id, $nome, $email, $telefone, $cpf) {
        $sql = "update aluno set 
        nome='$nome',
        email='$email',
        telefone='$telefone',
        cpf='$cpf'
        where id=$id;";
        if(mysqli_query(conecta(), $sql)) {
           return true;
        } else {
            return false;
        }
    }