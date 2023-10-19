<?php
include_once('conexao.php');

$mensagem = ''; // Inicializa a variável de mensagem

if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha']; // 

    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

    if ($mysqli->query($sql) === true) {
        $mensagem = "Cadastro efetuado com sucesso!";
        header("Location: login.php"); // Redireciona o usuário para a página do painel
        exit(); // Certifique-se de sair imediatamente após o redirecionamento
    } else {
        $mensagem = "Erro ao cadastrar o usuário: " . $mysqli->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
</head>
<body>
    <div class="box">
        <form action="cadastro.php" method="POST">
            <fieldset>
                <legend><b>Cadastro loglab</b></legend>
                <br>
                <?php if (!empty($mensagem)) { echo "<p>$mensagem</p>"; } ?>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required autocomplete="off" class="form-control">
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required autocomplete="off" class="form-control">
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>

                <br><br>
                <input type="submit" value="Cadastrar" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>
