

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <form action="MySQL/insert.php" method="POST" class="div" enctype="multipart/form-data">
                    <h1 class="Modo" >Entre na Espera por Trabalho</h1>
                    <div class="card">
                        <label> Escreva seu Nome </label>
                        <input type="text" placeholder="Nome" name="Nome" required autocomplete="off" id="user">
                        <label> Mostre qual emprego você está aplicando-se </label>
                        <input type="radio" name="cargo" value="Pedreiro"> Pedreiro
                        <input type="radio" name="cargo" value="Servente"> Servente
                        <input type="radio" name="cargo" value="Mestre"> Mestre de  Obra
                        <label> Selecione os dias que estiver livre. </label>
                        <input type="date" name="Agenda" required autocomplete="off" maxlength="12" minlength="8" id="pass">
                        <input type="Hidden" name="Contrato" required value="0" id="user">
                        <input type="Hidden" name="Status" required value="Disponivel" id="user">
                        <label for="arquivo">Selecione uma imagem da capa:</label>
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
                        <input type="text" name="descri"  required>
                        <button id="btn" type="submit" >Send</button>
                        <p id="p">Preencha os campos do formulário</p>
                    </div>
</form>
</body>
</html>