<?php
require_once "MySQL/crud.php";
$error = '';
if(isset($_POST['user'])){
    // Verifica se confirmação de senha foi enviada e confere
    if(!isset($_POST['Confpass']) || $_POST['pass'] !== $_POST['Confpass']){
        $error = 'As senhas não conferem.';
    } else {
        $Senha = password_hash($_POST['pass'],PASSWORD_DEFAULT);
        $novoLogin = [
            'user' => $_POST['user'],
            'acesso' => 'Cliente',
            'email' => $_POST['email'],
            'pass' => $Senha
        ];

        $good = create($pdo, 'access', $novoLogin);
        if($good){
            header("Location: login.php");
            exit;
        } else {
            $error = 'Erro ao cadastrar.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CADASTRE-SE</title>
    <link rel="stylesheet" href="CSS/cadastro.css">
    <link rel="stylesheet" href="CSS/Global.css">
    <link rel="stylesheet" href="./CSS/footer.css">
</head>
<body>
    <img src="Img/Stone_Pickaxe.png" id="cur-dot" data-hover="Img/Stone_Pickaxe_hover.gif" data-click="Img/Enchanted_Stone_Pickaxe_click.gif" >
     <div class="login">
        <div class="line"><img class="img" src="./Img/logo_laranja.png" alt=""></div>
        <div class="imagem"></div>
        <form class="formulario" action="" method="POST" id="meuFormulario" >
            <?php if(!empty($error)) echo '<p class="error">'.htmlspecialchars($error).'</p>'; ?>
            <div class="centro"><h1>CADASTRO<div class="linha"></div></h1><div>
         
                <div class="input_grup">
                 <h2>Nome Completo</h2>
                 <input class="campo" autocomplete="off" placeholder="Nome" type="text" name="user" required id="user" maxlength="50">
                </div>
                <div class="input_grup">
                 <h2>Email</h2>
                 <input class="campo" autocomplete="off" placeholder="Email" type="email" name="email" required id="email" maxlength="50">
                </div>
                <div class="input_grup">
                 <h2>Senha</h2>
                 <input class="campo" name="pass" placeholder="Pass" type="password" maxlength="12" minlength="8" id="pass" autocomplete="off" required>
                </div>
                <div class="input_grup">
                 <h2>Confirmar Senha</h2>
                 <input class="campo" name="Confpass" type="password" maxlength="12" minlength="8" id="Confpass" autocomplete="off" required >
                 <p id="msgSenha" style="color:#c00;display:none;margin:6px 0 0 0;">Senhas não conferem.</p>
                </div>
                        <br>
                        <div class="botoes">
                        <button class="botao_accss" id="btn" type="submit" >Cadastrar</button>
                        <div class="linha"></div>
                        <a href="login.php" class="botao_cadastrar">Login</a>
                        </div>
    </form>
    <script>
    // Validação cliente: impede envio se as senhas não conferirem
    (function(){
        const form = document.getElementById('meuFormulario');
        const pass = document.getElementById('pass');
        const conf = document.getElementById('Confpass');
        const msg = document.getElementById('msgSenha');
        form.addEventListener('submit', function(e){
            if(pass.value !== conf.value){
                e.preventDefault();
                msg.style.display = 'block';
                conf.focus();
            }
        });
        // esconder mensagem quando o usuário corrige
        conf.addEventListener('input', function(){
            if(pass.value === conf.value) msg.style.display = 'none';
        });
    })();
    </script>
    <script src="Partials/Top.js"></script>
    <?php include_once "Partials/footer.php";?>
</body>
</html>