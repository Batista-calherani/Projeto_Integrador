<?php
require_once 'Partials/access.php';
require_once 'MySQL/crud.php';
$profissionais = readAll($pdo, 'profissionais');
$categoria = ['Servente','Pedreiro','Mestre'];
$imgs = ['card1','card2','card3']
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/servicos.css">
    <link rel="stylesheet" href="CSS/Header.css">
    <link rel="icon" type="image/x-icon" href="Img/logo.bran.ico">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"> -->
    <title>Seleção</title>
</head>
<body class="test" >
    <?php include_once "Partials/header.php";?>
    <div class="cor_fundo">

        <div class="titulo">
            <h2>Nossos serviços</h2>
        </div>
        <div class="texto">
            <p>Encontre profissionais experientes e preparados para garantir qualidade, segurança e 
                eficiência em cada etapa da sua construção. Escolha o serviço ideal para transformar 
                
                seu projeto em realidade. </p>
        </div>

        <div class="linha">
            <div onclick="window.location.href='funcionarios.php?cargo=Pedreiro'" class="quadrado_">
                <h3>Pedreiro</h3>
                <img src="Img/pedreiro.png" alt="">
                <p>Contamos com pedreiros qualificados e dedicados, preparados para 
                    executar serviços com precisão, qualidade e acabamento impecável. 
                    Seu compromisso e experiência fazem toda a diferença para transformar 
                    projetos em realidade.
                </p>
            </div>
            <div onclick="window.location.href='funcionarios.php?cargo=Servente'"   class="quadrado_">
                <img src="Img/servente.jpg" alt="">
                <h3>Servente</h3>
                 <p>Nossos serventes atuam com responsabilidade, agilidade e disposição, oferecendo
                     todo o suporte necessário para o bom andamento da obra. São profissionais essenciais
                      que contribuem diretamente para um ambiente organizado e produtivo.
                </p>
            </div>
            <div onclick="window.location.href='funcionarios.php?cargo=Mestre'"  class="quadrado_">
                <h3>Mestre de Obra</h3>
                <img src="Img/mestre de obra.png" alt="">
                 <p>Nossos mestres de obra são profissionais experientes e comprometidos, 
                    responsáveis por garantir organização, qualidade e eficiência em cada 
                    etapa da construção. Com liderança e atenção aos detalhes, asseguram que 
                    sua obra seja realizada com segurança e excelência.
                </p>
            </div>
        </div>
        
    </div>
<footer class="rodape"></footer>