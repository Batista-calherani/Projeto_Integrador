<?php
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
    <link rel="stylesheet" href="CSS/Style.css">
    <link rel="stylesheet" href="CSS/Header.css">
    <link rel="icon" type="image/x-icon" href="Img/logo.bran.ico">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"> -->
    <title>Seleção</title>
</head>
<body class="test" >
    <?php include_once "Partials/header.php";?>
    <div class="grid">
        <?php 
        print ' <h1 class="title" > Nosso Serviços! </h1> <br>
        <p class="title" >Inserir um Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem</p>
        <ul class="col-apresent">';
        foreach($categoria as $kcat => $nome ) {
            echo '<li>
                        <a class="button" href="funcionarios.php?cargo='.$nome.'">'.$nome.'</a><br><div class="'. $nome .'"><button class="fun" onclick="window.location.href=\'funcionarios.php?cargo='.$nome.'\'"></button> </div>
                </li>';
        }
        echo '</ul>';
?>