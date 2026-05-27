<?php
require_once 'MySQL/crud.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $pass = $_POST['password'] ?? '';
    if ($email === '' || $pass === '') {
        echo '<div style="color:red;">Preencha todos os campos.</div>';
    } else {
        $stmt = $conn->prepare("SELECT user, pass FROM access WHERE email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 1) {
            $stmt->bind_result($user,$hash);
            $stmt->fetch();

            if (password_verify($pass, $hash)) {
                $_SESSION['user'] = $user;
                if($_SESSION['user'] == 'Administrador'){
                header('Location: coiso.php');
                exit; 
                }else{
                header("Location: index.php");
                exit;
                }} else {
                echo '<div style="color:red;">Usuário ou senha incorretos.</div>';
            }
        } else {
            echo '<div style="color:red;">Usuário ou senha incorretos.</div>';
        }

        $stmt->close();
    }
};
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="CSS/login.css">
    <link rel="stylesheet" href="CSS/Global.css">
</head>
<body>
    <img src="Img/Stone_Pickaxe.png" id="cur-dot" data-hover="Img/Stone_Pickaxe_hover.gif" data-click="Img/Enchanted_Stone_Pickaxe_click.gif">
    <div class="login">
        <div class="line"><img class="img" src="./Img/logo_laranja.png" alt=""></div>
        <div class="imagem"></div>
    <form class="formulario" action="" method="POST" id="meuFormulario">
        <h1>Bem-vindo a ConGroup</h1>
        <div class="input_grup">
            <h2>Email</h2>
            <input class="campo" type="text" name="email" placeholder="usuário" required >
        </div>

        <div class="input_grup">
            <h2>Senha</h2>
            <input class="campo" type="password" name="password" required maxlength="12" minlength="8" >
            <p>Esqueceu sua senha?<a href="confirmation.php">Clique aqui</p></a>
        </div>

        <div class="botoes">
            <button class="botao_accss">Entrar</button>
            <div class="linha"></div>
           <a href="cadastro.php" class="botao_cadastrar">Cadastre-se</a>
           <a href="Entrada_Proficional.php" class="botao_cadastrar">Cadastro de Profissional</a>
        </div>
    </form>
       
    </div>
    <script src="Partials/Top.js"></script>
</body>
</html>