<?php
http_response_code(404);
require_once 'Partials/access.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found 404 </title>
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="CSS/Header.css">
    <link rel="icon" type="image/x-icon" href="Img/logo_laranja.ico">
    <style>
        /* Estilo rápido para o botão de som */
        .audio-control {
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: #ff0055;
            color: #fff;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            font-weight: bold;
            box-shadow: 0 4px 15px rgba(255, 0, 85, 0.4);
            transition: transform 0.2s;
        }
        .audio-control:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    <?php include_once "Partials/header.php"; ?>
    <div class="banner">
        <img src="./Img/index.png" alt="">
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
    <script>
        const audio = document.getElementById('meuJingle');
        const btn = document.getElementById('btnSom');

        // Tenta tocar o áudio assim que o usuário clicar em qualquer lugar da página
        // ou especificamente no botão
        btn.addEventListener('click', () => {
            if (audio.paused) {
                audio.play()
                    .then(() => {
                        btn.innerText = "⏸️ Pausar Jingle";
                    })
                    .catch(error => {
                        console.log("O navegador bloqueou o autoplay:", error);
                    });
            } else {
                audio.pause();
                btn.innerText = "🔊 Play Jingle";
            }
        });
    </script>
</html>
</body>
</html>