<!-- <header>
    <img src="Img/logo.png" class="logo"/>
    <ul class="Header">
        <li><a href="index.php">Home</a></li>
        <li><a href="login.php" >Login</a></li>
        <li><a href="cadastro.php" >Cadastro</a></li>
        <li><a href="AboutUs.php" >Sobre nós</a></li>
        <li><a href="buttons.php" >Tabela</a></li>
        <li><a href="Entrada_Proficional.php" >Procurar Emprego</a></li>
    </ul>
</header> -->

<header>
        <div class="inicio"><img class="logo" src="./Img/logo_laranja.png" onclick="window.location.href='index.php'" alt=""></div>
        <div class="cabecalho">
            <a class="HeadBut" href="index.php">Home</a>
            <a class="HeadBut" href="#AboutUs">Quem somos</a>
            <a class="HeadBut" href="buttons.php">Serviços</a>
            <a class="HeadBut" href="login.php"><img class="perfil" src="./Img/perfil.png" alt=""><?php echo $_SESSION['user'] ?? 'Default'  ?></a>
        </div>
    </header>

<div class="linha_laranja"></div>