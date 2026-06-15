<?php
http_response_code(404);
require_once 'Partials/access.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>404 - Página não encontrada</title>
    <link rel="stylesheet" href="CSS/404.css">
    <link rel="stylesheet" href="CSS/footer.css">

</head>

<body>

    <nav class="navbar">
        <a class="HeadBut" href="index.php#home">Home</a>
        <a class="HeadBut" href="index.php#quemsomos">Quem somos</a>
        <a class="HeadBut" href="index.php#servicos">Serviços</a>
    </nav>

    <div class="hero">
        <div class="bg-overlay"></div>
        <div class="big-number">404</div>

        <div class="left-bar"></div>
        <div class="content">
            <div class="badge">Erro do sistema</div>
            <div class="title">Página<br><span>não encontrada</span></div>
            <div class="divider"></div>
            <p class="desc">
                A página que você está procurando pode ter sido removida, teve seu nome
                alterado ou está temporariamente indisponível. Verifique o endereço
                digitado ou retorne ao início.
            </p>
            <div class="buttons">
                <a href="index.php" class="btn-primary">Voltar ao início</a>
            </div>
        </div>
    </div>

    <div class="footer-bar">
        <div class="status-dots">
            <div class="dot dot-red"></div>
            <div class="dot dot-orange"></div>
            <div class="dot dot-gray"></div>
            <span style="margin-left:6px;">Código de erro: 404</span>
        </div>
    </div>

     <?php include_once "Partials/footer.php";?>
</body>
</html>