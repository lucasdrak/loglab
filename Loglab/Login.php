<?php
// Incluir o arquivo de conexão
include("conexao.php");

// Função para gerar um token de autenticação
function gerarToken() {
    return bin2hex(random_bytes(32)); // Gera um token de 64 caracteres
}

// Verificar se os campos de e-mail e senha estão definidos
if (isset($_POST['email']) && isset($_POST['senha'])) {

    // Verificar se o campo de e-mail está vazio
    if (strlen($_POST['email']) == 0) {
        echo "Campo de e-mail não preenchido";
    }

    // Verificar se o campo de senha está vazio
    elseif (strlen($_POST['senha']) == 0) {
        echo "Campo de senha não preenchido";
    }

    // Se os campos de e-mail e senha não estiverem vazios, tente fazer o login do usuário
    else {

        // Escapar das strings de e-mail e senha para evitar ataques de injeção SQL
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        // Criar a consulta SQL para selecionar o usuário do banco de dados
        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";

        // Executar a consulta SQL e armazenar os resultados na variável $sql_query
        $sql_query = $mysqli->query($sql_code) or die("Falha de conexão do código SQL" . $mysqli->error);

        // Obter o número de linhas retornadas pela consulta SQL
        $quantidade = $sql_query->num_rows;

        // Se houver exatamente uma linha retornada pela consulta SQL, então o usuário existe e o login é bem-sucedido
        if ($quantidade == 1) {

            // Recuperar os dados do usuário dos resultados da consulta SQL
            $usuario = $sql_query->fetch_assoc();

            // Iniciar uma sessão se ela ainda não estiver iniciada
            if (!isset($_SESSION)) {
                session_start();
            }

            // Armazenar o ID e o nome do usuário nos dados da sessão
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            if (isset($_POST['lembrar']) && $_POST['lembrar'] == 1) {
                $nome_usuario = $usuario['nome']; // Substitua pelo valor correto
                $token_autenticacao = gerarToken(); // Gere um token de autenticação único
            
                setcookie("lembrar_usuario", $nome_usuario, time() + 604800); // Um exemplo de cookie que expira em uma semana
                setcookie("lembrar_token", $token_autenticacao, time() + 604800);
            }

            // Redirecionar o usuário para a página painel.php
            header("location: painel.php");
        }

        // Se não houver exatamente uma linha retornada pela consulta SQL, então o usuário não existe ou a senha está incorreta
        else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }
    }
}
?>

 

 <!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login no LOGLAB</title>
</head>
<body>
	<p></p>
	<h1>Login no LogLab</h1>
	<form action="" method="post">
	  <label>email</label>
	  <input type="text" name="email" autocomplete="off" class="form-control">
	  </p>
	  <p>
	  	<label>Senha</label>
	  	<input type="password" name="senha" >
	  </p>
	  <p>
	  	<button type="submit">Entrar</button>
	  </p>
      <input type="checkbox" name="lembrar" value="1"> Lembrar-se de mim

      <p>
        <label>Não possui Cadastro? </label><a href="cadastro.php">Cadastre-se</a>
	  </p> 
	</form>
</body>
</html>