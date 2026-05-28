<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastra-se</title>
    <link rel="stylesheet" href="CSS/Style.css">
    <link rel="stylesheet" href="CSS/Global.css">
    <link rel="icon" type="image/x-icon" href="Img/logo_laranja.ico">
</head>
<body>
<img src="Img/Stone_Pickaxe.png" id="cur-dot" data-hover="Img/Stone_Pickaxe_hover.gif" data-click="Img/Enchanted_Stone_Pickaxe_click.gif" >
    <h1 class="Modo">Entre na Espera por Trabalho</h1>
        <form action="MySQL/insert.php" method="POST" class="div" enctype="multipart/form-data">
                    <div class="card">
                        <label> Escreva seu Nome </label>
                        <input type="text" placeholder="Nome" name="Nome" required autocomplete="off" id="user">
                        <label> Mostre qual emprego você está aplicando-se </label>
                        <input type="radio" name="cargo" value="Pedreiro"> <p class="Modo" > Pedreiro </p>
                        <input type="radio" name="cargo" value="Servente"> <p class="Modo" > Servente </p>
                        <input type="radio" name="cargo" value="Mestre"> <p class="Modo" > Mestre de Obra </p>
                        <label> Indique sua cidade. </label>
                        <input type="text" name="Local" required autocomplete="off" id="pass">
                        <input type="Hidden" name="Contrato" required value="0" id="user">
                        <input type="Hidden" name="Status" required value="Disponivel" id="user">
                        <label>Idade:</label>
                        <input type="number" name="Idade" Placeholder="Ex. 10 anos" required>
                        <label for="arquivo">Selecione uma imagem de perfil:</label>
                        <input type="file" name="arquivo" accept="image/*" required>
                        <label>Selecione uma média que deseja ganhar:</label>
                        <input type="number" step="0.01" name="Salario"  required>
                        <label>Escreva seu telefone para contato</label>
                        <input type="text" name="tefone"  required>
                        <label>Escreva seu Email para contato</label>
                        <input type="email" name="email"  required>
                        <label>Escreva seu tempo de contribuição nesse cargo</label>
                        <input type="text" name="tempo" Placeholder="Ex. 10 anos" required>
                        <label for="arquivo">Escreva uma pequena descrição sua</label>
                        <input type="text" name="descri" maxlegth='100' required>
                        <button type="submit" >Send</button>
                        <p id="p">Preencha os campos do formulário</p>
                    </div>
</form>
<script src="Partials/Top.js"></script>
</body>
</html>