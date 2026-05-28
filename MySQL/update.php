<?php
require_once 'crud.php';
$idFun = $_GET['email'];
if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
$dadosAtualizados = [
    'pass' => addslashes(password_hash($_POST['pass'],PASSWORD_DEFAULT))
];

$linhasAfetadas = update($pdo, 'access',$dadosAtualizados, "email='" .$idFun."'");

if($linhasAfetadas > 0) {
    echo 'Senha Atualizada com sucesso!';
} else {
    echo 'Um Erro Ocorreu!';
}};
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualização de Senha</title>
    <link rel="stylesheet" href="../CSS/cadastro.css">
</head>
<body>
    <div class="login">
        <div class="line"><img class="img" src="../Img/logo_laranja.png" alt=""></div>
        <div class="imagem"></div>
    <form class="formulario" action="" method="POST" id="meuFormulario">
        <h1 Style="color: white;font-size: 30px;" >Escreva sua nova senha.</h1>
        <div class="input_grup">
            <h2>Senha</h2>
            <input class="campo" type="password" name="pass" placeholder="Senha Atualizada" required >
        </div>

        <div class="botoes">
            <button class="botao_accss">Confirmar</button>
            <div class="linha"></div>
        </div>
    </form>
       <a href="../Login.php">Voltar</a>
    </div>
</body>
</html>