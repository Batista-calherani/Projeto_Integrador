<?php
require_once 'Partials/access.php';
require_once 'MySQL/crud.php';
$profissionais = readAll($pdo, 'profissionais');
$categoria = ['Servente','Pedreiro','Mestre']
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/Header.css">
    <link rel="icon" type="image/x-icon" href="Img/logo_laranja.ico">

</head>
<body>
    <?php include_once "Partials/header.php";?>
     <div class="cont-consulta">
        <?php 
        print ' <p class="paragrafo"> Catálogo </p>
        <ul class="col-apresent">';
        print ' <li>
                        <a class="button" href="funcionarios.php?cargo=" >Todos Profissionais</a>
                </li>';
        foreach($categoria as $kcat => $nome ) {
            echo '<li>
                        <a class="button" href="funcionarios.php?cargo='.$nome.'">'.$nome.'</a>
                </li>';
        }
        echo '</ul>';
?>
        <p class="paragrafo"></p>
            <?php
            echo '<div class="grid2">';
            foreach($profissionais as $funcionarios){
                if($_GET['cargo'] == '' || $funcionarios['cargo'] == $_GET['cargo']  ){
                echo '<div class="item" id="1" ><img src="'.$funcionarios['Foto'].'" class="img" id="produtos"><p class="legend" >Nome:'.$funcionarios['Nome'].' <br> Disponibilidade: <R1>'.$funcionarios['Agenda'].' </R1> <br> Categoria: '.$funcionarios['cargo'].'</div>';
            }
            };
            
            echo '</div></div>';
            ?>
            <a href="index.php" >Back</a>
            
</body>
</html>