<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirme</title>
    <link rel="stylesheet" href="CSS/cadastro.css">
    <link rel="stylesheet" href="CSS/Global.css">
    <link rel="stylesheet" href="./CSS/footer.css">
</head>

<body>
    <div class="login">
        <div class="line"><img class="img" src="./Img/logo_laranja.png" alt=""></div>
        <div class="imagem"></div>
        <form class="formulario" action="MySQL/update.php" method="GET" id="meuFormulario">
            <h1 Style="color: white;font-size: 30px;">Escreva seu email para atualizar sua senha.</h1>
            <div class="input_grup">
                <h2>Email</h2>
                <input class="campo" type="text" name="email" placeholder="usuário" required>
            </div>

            <div class="botoes">
                <button class="botao_accss">Confirmar</button>
                <div class="linha"></div>
                <button class="botao_accss">Voltar</button>
            </div>
        </form>

    </div>


</body>

</html>