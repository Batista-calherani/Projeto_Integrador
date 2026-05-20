<?php
require_once 'Partials/access.php';
require_once 'MySQL/crud.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ConGroup</title>
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="CSS/Header.css">
    <link rel="icon" type="image/x-icon" href="Img/logo.bran.ico">
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
                <h1><span>Construindo o futuro,</span> um projeto de cada vez</h1>
                <p>Conectamos profissionais qualificados da construção civil às melhores oportunidades. De pedreiros a
                    mestres de obra, nossa plataforma ajuda empresas a encontrar trabalhadores de forma rápida, segura e
                    eficiente. Qualidade, confiança e compromisso
                    são a base de tudo o que construímos. </p>
                <div class="botoes">
                    <button onclick="window.location.href='buttons.php'">Serviços</button>
                    <button onclick="window.location.href='Entrada_Proficional.php'" >Procurar Emprego</button>
                </div>
            </div>
        </div>
    </div>


    <div class="cor_fundo">
        <div class="espaco">
            <div class="inform" id="AboutUs" >
                <audio id="meuJingle" src="audio/Help! (with Intro).mp3" loop></audio>

                <button id="btnSom" class="audio-control">🔊 Play Jingle</button>
                <br>
                <br>
                <br>

    <h1>Bem-vindo ao site mais foda da web</h1>

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
            </div>

            <img class="imagem" src="./Img/img_infor.png" alt="">

            


        </div>
        <div class="quadrado_laranja"></div>
        <div class="cor_laranja"></div>


    </div>

    <?php include_once "Partials/footer.php"; ?>

</body>

</html>
</body>
</html>