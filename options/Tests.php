<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found 404 </title>
    <link rel="stylesheet" href="../CSS/index.css">
    <link rel="stylesheet" href="../CSS/Global.css">
    <link rel="stylesheet" href="Top.css">
    <link rel="icon" type="image/x-icon" href="Img/logo_laranja.ico">
</head>

<body>
    <img src="Stone_Pickaxe.png" id="cur-dot" data-hover="Stone_Pickaxe_hover.gif" data-click="Enchanted_Stone_Pickaxe_click.gif" >
    <?php include_once "../Partials/header.php"; ?>
    <div class="banner">
        <img src="../Img/index.png" alt="">
        <div class="conteudo">
            <div class="linha"></div>
            <div>
                <h1><span>Construindo o futuro,</span> Somente não nessa página.</h1>
                <p>Parece que você tentou acessar uma página que no momento não existe.<br>Porém deixamos esse jingle pelo seu esforço! </p>
                <div class="botoes">
                    <audio id="meuJingle" src="audio/Help! (with Intro).mp3" loop></audio>
                    <button id="btnSom" class="audio-control">🔊 Play Jingle</button>
                </div>
            </div>
        </div>
    <script src="Top.js" ></script>
    </body>
</html>
