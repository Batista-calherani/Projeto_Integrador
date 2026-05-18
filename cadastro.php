<?php
require_once "MySQL/crud.php";
if(isset($_POST['user'])){
$novoLogin = [
    'user' => $_POST['user'],
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
    <title>Cadastro</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="icon" type="image/x-icon" href="Img/logo.bran.ico">
</head>
<body>
    <form action="" method="POST" class="div" >
                    <h1 class="Modo" >Crie um cadastro</h1>
                    <div class="card">
                        <input type="text" placeholder="Nome" name="user" required autocomplete="off" id="user" maxlength="50">
                        <input type="password" placeholder="Pass" name="pass" required autocomplete="off" maxlength="12" minlength="8" id="pass">
                        <br>
                        <button id="btn" type="submit" >Send</button>
                        <p id="p">Preencha os campos do formulário</p>
                    </div>
</form>
</body>
</html>