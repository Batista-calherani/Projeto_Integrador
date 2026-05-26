<?php
$foto = $_SESSION['foto'] ?? 'Img/perfil.png';
$userText = $_SESSION['user'] ?? 'Default';
?>
<header>
        <div class="inicio"><img class="logo" src="./Img/logo_laranja.png" onclick="window.location.href='index.php'" alt=""></div>
        <div class="cabecalho">
            <a class="HeadBut" href="index.php">Home</a>
            <a class="HeadBut" href="#AboutUs">Quem somos</a>
            <a class="HeadBut" href="buttons.php">Serviços</a>
            <a class="HeadBut" href="perfil.php">Perfil</a>
            <?php echo '<a class="HeadBut" href="login.php"><img class="perfil" src="'.$foto.'" alt="">'. $userText.'</a>'?>
        </div>
    </header>

<div class="linha_laranja"></div>