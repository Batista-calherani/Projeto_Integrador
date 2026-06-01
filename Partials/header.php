<?php
$foto = $_SESSION['foto'] ?? 'Img/perfil.png';
$userText = $_SESSION['user'] ?? 'Default';
?>
<header>
        <div class="inicio"><img class="logo" src="./Img/logo_laranja.png" onclick="window.location.href='index.php'" draggable="false" alt=""></div>
        <div class="cabecalho">
            <a class="HeadBut" href="index.php#home">Home</a>
            <a class="HeadBut" href="index.php#quemsomos">Quem somos</a>
            <a class="HeadBut" href="index.php#servicos">Serviços</a>
            <a class="HeadBut" href="perfil.php">Perfil</a>
            <?php echo '<a class="HeadBut" href="login.php"><img class="perfil" src="'.$foto.'" alt="">'. $userText.'</a>'?>
        </div>
    </header>

<div class="linha_laranja"></div>
<img src="Img/Stone_Pickaxe.png" id="cur-dot" data-hover="Img/Stone_Pickaxe_hover.gif" data-click="Img/Enchanted_Stone_Pickaxe_click.gif" >