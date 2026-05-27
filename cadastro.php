<?php
require_once "MySQL/crud.php";
if(isset($_POST['user'])){
$novoLogin = [
    'user' => $_POST['user'],
    'acesso' => 'Cliente',
    'email' => $_POST['email'],
    'pass' => password_hash($_POST['pass'],PASSWORD_DEFAULT)
];

$good = create($pdo, 'access', $novoLogin);
if($good){
    header("Location: login.php");
    exit;
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
</head>
<body>

     <div class="login">
        <div class="line"><img class="img" src="./Img/logo_laranja.png" alt=""></div>
        <div class="imagem"></div>
    <form class="formulario" action="" method="POST" id="meuFormulario" >
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
                 <input class="campo" type="password" maxlength="12" minlength="8" id="Confpass" autocomplete="off" required >
                </div>
                        <br>
                        <div class="botoes">
                        <button class="botao_accss" id="btn" type="submit" >Send</button>
                        </div>
    </form>
    
</body>
</html>