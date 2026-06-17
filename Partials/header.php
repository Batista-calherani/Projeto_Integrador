<?php
$foto = $_SESSION['foto'] ?? 'Img/perfil_user.png';
$userText = $_SESSION['nome_usuario'] ?? ($_SESSION['user'] ?? 'Default');
?>
<header>
    <div class="inicio"><img class="logo" src="./Img/logo_laranja.png" onclick="window.location.href='index.php'"
            draggable="false" alt=""> <div class="empresa_nome">Con<span>Group</span></div></div>
    <div class="cabecalho">
        <a class="HeadBut" href="index.php#home">Home</a>
        <a class="HeadBut" href="index.php#quemsomos">Quem somos</a>
        <a class="HeadBut" href="index.php#servicos">Serviços</a>
        <?php echo '<a class="HeadBut_" href="login.php"><img class="perfil" src="' . htmlspecialchars($foto, ENT_QUOTES, 'UTF-8') . '" alt=""><span>' . htmlspecialchars($userText, ENT_QUOTES, 'UTF-8') . '</span></a>' ?>
    </div>
</header>

<div class="linha_laranja"></div>
