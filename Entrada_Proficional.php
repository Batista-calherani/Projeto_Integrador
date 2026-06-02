<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastra-se</title>
    <link rel="stylesheet" href="CSS/formulario_profissional.css">
    <link rel="stylesheet" href="CSS/Global.css">
    <link rel="icon" type="image/x-icon" href="Img/logo_laranja.ico">
</head>
<body>
<img src="Img/Stone_Pickaxe.png" id="cur-dot" data-hover="Img/Stone_Pickaxe_hover.gif" data-click="Img/Enchanted_Stone_Pickaxe_click.gif" >
    <div class="cor_fundo">
        <div class="titulo">
            <h1>Contratar <span>profissionais</span></h1>
            <p>Preencha os dados abaixo para solicitar a contratação deste Profissional</p>
        </div>
        <form action="MySQL/insert.php" method="POST" class="form" enctype="multipart/form-data">
            <h1>Envie suas <span>informações</span></h1>
            <div class="nome_telefone">
                <div class="nome">
                    <p><b>Nome completo</b></p>
                    <input class="campo_1" name="Nome" type="text" placeholder="Digite seu nome completo">
                </div>

                <div class="telefone">
                    <p><b>Telefone</b></p>
                    <input class="campo_1" name="tefone" type="text" placeholder="(11) 99999-9999">
                </div>
            </div>

            <div class="email_endereco">
                <div class="email">
                    <p><b>E-mail</b></p>
                    <input class="campo_1" name="email" type="email" placeholder="exemplo@email.com">
                </div>

                <div class="endereco">
                    <p><b>Endereço</b></p>
                    <input class="campo_1" name="Local" type="text" placeholder="Rua, número, bairro, cidade - UF">
                </div>
            </div>

            
            <div class="email_endereco">
                <div class="email">
                    <p><b>Idade</b></p>
                    <input class="campo_1" name="Idade" type="number" placeholder="Ex:30">
                </div>

                <div class="endereco">
                    <p><b>Tempo de experiência</b></p>
                    <input class="campo_1" name="tempo" type="text" placeholder="Ex:15 anos">
                </div>
            </div>

            <div class="tipo_servico">

                <p><b>Cargos</b></p>
                <select class="servico" name="cargo" id="servicos">
                    <option selected disabled>
                        Escolha sua área
                    </option>
                    <option value="Servente">Servente</option>
                    <option value="Pedreiro">Pedreiro</option>
                    <option value="Mestre">Mestre de Obra</option>
                </select>

                <div class="endereco">
                    <p><b>Expectativa salárial</b></p>
                    <input class="campo_1" name="Salario" type="text" placeholder="2.000,00">
                </div>
            </div>
            <div class="endereco">
                    <p><b>Foto</b></p>
                    <input class="campo_1" name="arquivo" type="file" accept="image/*">
                </div>
            <div class="Descricao">
                <p><b>Biografia</b></p>
                <textarea class="servico" name="descri" id="" placeholder="Nós fale um pouco sobre você"></textarea>
            </div>



            <div class="botao">
                <button  class="servico_">
                    <img src="../Img/select.png" alt="">
                    <p>Confirmar contratação</p>
                </button>
            </div>
        </form>

    </div>
    </div>

    <footer class="rodape"></footer>
<script src="Partials/Top.js"></script>
</body>
</html>