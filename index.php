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
    <link rel="icon" type="image/x-icon" href="Img/logo_laranja.ico">
</head>

<body>
    <?php include_once "Partials/header.php"; ?>
    <div id="home" class="banner">
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


    <div id="quemsomos" class="cor_fundo">
        <div class="espaco">
            <div class="inform" id="AboutUs" >
                <h1>Quem <span>Somos</span></h1>
                <h3>Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem
                    Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
                    Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem
                    Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
                    Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem
                    Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
                    Lorem Ipsum Lorem Ipsum Lorem Ipsum </h3>
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