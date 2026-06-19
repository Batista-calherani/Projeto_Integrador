<?php
require_once 'Partials/access.php';
require_once 'MySQL/crud.php';
$id = $_GET['id_Prof'];
$profissionais = read($pdo, 'profissionais','id_Prof='.$id);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes</title>
    <link rel="stylesheet" href="CSS/contratar.css">
    <link rel="stylesheet" href="CSS/Global.css">
    <link rel="stylesheet" href="CSS/footer.css">
    <link rel="icon" type="image/x-icon" href="Img/logo_laranja.ico">
    
</head>

<body>
<?php include_once 'Partials/header.php';?>
    <div class="linha_laranja"></div>

    <div class="cor_fundo">
        <div class="espaco">
            <div class="titulo">
                <h1>Contratar <span>profissionais</span></h1>
                <p>Preencha os dados abaixo para solicitar a contratação deste Profissional</p>    
            </div>
            <div class="voltar">
                <img class="img" src="Img/seta.png" alt="">
                <a href="profissionais.html">Voltar para profissionais</a>

            </div>
        </div>

        <div class="quadrado">

            <div class="perfil_profissional">
            <?php
            echo'
                <div class="foto_nome">
                    <img class="foto" src="'.$profissionais['Foto'].'" alt="">

                    <div class="informa">
                        <h2>'.$profissionais['Nome'].'</h2>
                        <div class="cargo">
                            <img class="cargo_img" src="Img/cargo.png" alt="">
                            <p>'.$profissionais['cargo'].'</p>
                        </div>
                    </div>
                </div>

                <div class="dados">
                    <div class="dados_nome">
                        <span>Profissional</span>
                        <strong>'.$profissionais['Nome'].'</strong>
                    </div>

                    <div class="infor">
                        <img class="icone" src="Img/localização.png" alt="">
                        <p>'.$profissionais['Local'].'</p>
                    </div>

                    <div class="infor">
                        <img class="icone" src="Img/calendario.png" alt="">
                        <p>'.$profissionais['Idade'].'</p>
                    </div>

                    <div class="infor">
                        <img class="icone" src="Img/telefone.png" alt="">
                        <p>'.$profissionais['Tefone'].'</p>
                    </div>

                    <div class="infor">
                        <img class="icone" src="Img/email.png" alt="">
                        <p>'.$profissionais['Email'].'</p>
                    </div>
                </div>';
                ?>
                <div class="verificacao">
                    <img class="icone_verificacao" src="Img/security.png" alt="">
                    <div>
                        <h3>Profissional verificado</h3>
                        <p>Todos os nossos profissionais passam por um processo de verificação</p>
                    </div>
                </div>
            </div>

            <form class="form" action='MySQL/update_good.php?id=<?php echo $id; ?>' method='POST' >
                <h1>Solicitar <span>contratação</span></h1>
                <div class="nome_telefone">
                    <div class="nome">
                        <p><b>Nome completo</b></p>
                        <input class="campo_1" type="text" name="cliente_nome" placeholder="Digite seu nome completo" required>
                    </div>


                    <div class="telefone">
                        <p><b>Telefone</b></p>
                        <input class="campo_1" type="text" name="cliente_telefone" placeholder="(11) 99999-9999" required>
                    </div>
                </div>

                <div class="email_endereco">
                    <div class="email">
                        <p><b>E-mail</b></p>
                        <input class="campo_1" type="email" name="cliente_email" placeholder="exemplo@email.com" required>
                    </div>

                    <div class="endereco">
                        <p><b>Endereço da obra</b></p>
                        <input class="campo_1" type="text" name="Obra_Local" placeholder="Rua, número, bairro, cidade - UF">
                    </div>
                </div>

                <div class="tipo_servico">

                    <p><b>Tipo de serviços</b></p>
                    <select class="servico" name="servicos" id="servicos">
                        <option value="" selected disabled>
                            Escolha um serviço
                        </option>
                        <option value="Reforma residencial">Reforma residencial</option>
                        <option value="Construção de casas">Construção de casas</option>
                        <option value="Construção de muros">Construção de muros</option>
                        <option value="Ampliação de ambientes">Ampliação de ambientes</option>
                        <option value="Fundação e alicerce">Fundação e alicerce</option>
                    </select>
                </div>

                <div class="Descricao">
                    <p><b>Descrição do projeto</b></p>
                    <textarea class="servico" name="descricao_projeto" id="" placeholder="Descreva seu projeto, detalhes importantes, tamanho da obra, etc..." required></textarea>
                </div>

                <div class="data_orcamento">
                    <div class="data">
                        <p><b>Data desejada para início</b></p>
                        <input class="campo_1" type="date" name="data_inicio" id="" required>
                    </div>

                    <div class="orcamento">
                        <p><b>Orçamento estimado</b></p>
                        <input class="campo_1" type="text" name="orcamento" placeholder="Ex: R$ 5.000,00">
                    </div>
                </div>

                <div class="Forma_pagamento">
                    <p><b>Forma de pagamento</b></p>
                    <select class="servico" name="forma_pagamento" id="" required>
                        <option value="" selected disabled>
                            Selecione a forma de pagamento
                        </option>
                        <option value="Cartão de Crédito">Cartão de Crédito</option>
                        <option value="Cartão de Débito">Cartão de Débito</option>
                        <option value="Pix">Pix</option>
                    </select>
                </div>
                <input name='email' type="hidden" value='<?php echo $profissionais['Email'] ?>' >
                <input name='user' type="hidden" value='<?php echo $profissionais['Nome'] ?>' >
                <div class="botao">
                    <button  class="servico_" type='submit' >
                        <img src="./Img/select.png" alt="">
                        <p>Confirmar contratação</p>
                    </button>
                </div>

            </form>
        </div>
    </div>

<?php require_once 'Partials/footer.php';?>
</body>
</html>
