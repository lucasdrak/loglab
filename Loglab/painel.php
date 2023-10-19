<?php
include('protect.php'); 


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
    <style>
        /* Estilos para a barra de navegação fixa */
        .navbar {
            background-color: #333; /* Cor de fundo da barra de navegação */
            padding: 10px; /* Espaçamento interno da barra de navegação */
            position: fixed; /* Tornar a barra de navegação fixa */
            width: 100%; /* Largura total da janela */
            top: 0; /* Alinhar no topo da janela */
            z-index: 1; /* Colocar a barra de navegação acima de outros elementos */
        }

        /* Estilos para os links na barra de navegação */
        .navbar a {
            color: white; /* Cor do texto dos links */
            text-decoration: none; /* Remover sublinhado dos links */
            margin: 0 15px; /* Espaçamento entre os links */
        }

        /* Estilos para o conteúdo principal */
        .content {
            margin-top: 60px; /* Espaço para evitar que o conteúdo fique oculto sob a barra de navegação */
            padding: 20px; /* Espaçamento interno do conteúdo */
        }
    </style>
</head>
<body>
    <!-- Barra de Navegação Fixa -->
    <div class="navbar">
        <a href="http://localhost/loglab/colorconnect.js/color-connect/color.html">COLOR CONNECT</a>
        <a href="https://www.youtube.com">JOGO DOS SIGNOS</a>
        <a href="#">Contato</a>
        <a href="#">MINIGAME</a>
        <a href="">lorem ipsum</a>
        <a href="#">lorem ipsum</a>
        <a href="#">lorem ipsum</a>
        <a href="#">lorem ipsum</a>
        <a href="#">lorem ipsum</a>
        <a href="logout.php">Sair</a>
    </div>

    <!-- Conteúdo Principal -->
    <div class="content">
        Bem-vindo ao LogLab, <?php echo $_SESSION['nome']; ?>
    </div>
</body>
</html>
