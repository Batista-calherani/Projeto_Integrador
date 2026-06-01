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
    <title>Document</title>
    <link rel="stylesheet" href="CSS/contratar.css">
    <link rel="stylesheet" href="CSS/Global.css">
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

            <div class="form">
                <h1>Solicitar <span>contratação</span></h1>
                <div class="nome_telefone">
                    <div class="nome">
                        <p><b>Nome completo</b></p>
                        <input class="campo_1" type="text" placeholder="Digite seu nome completo">
                    </div>

                    <div class="telefone">
                        <p><b>Telefone</b></p>
                        <input class="campo_1" type="number" placeholder="(11) 99999-9999">
                    </div>
                </div>

                <div class="email_endereco">
                    <div class="email">
                        <p><b>E-mail</b></p>
                        <input class="campo_1" type="email" placeholder="exemplo@email.com">
                    </div>

                    <div class="endereco">
                        <p><b>Endereço da obra</b></p>
                        <input class="campo_1" type="text" placeholder="Rua, número, bairro, cidade - UF">
                    </div>
                </div>

                <div class="tipo_servico">

                    <p><b>Tipo de serviços</b></p>
                    <select class="servico" name="servicos" id="servicos">
                        <option selected disabled>
                            Escolha um serviço
                        </option>
                        <option value="">Reforma residencial</option>
                        <option value="">Construção de casas</option>
                        <option value="">Construção de muros</option>
                        <option value="">Ampliação de ambientes</option>
                        <option value="">Fundação e alicerce</option>
                    </select>
                </div>

                <div class="Descricao">
                    <p><b>Descrição do projeto</b></p>
                    <textarea class="servico" name="" id="" placeholder="Descreva seu projeto, detalhes importantes, tamanho da obra, etc..."></textarea>
                </div>

                <div class="data_orcamento">
                    <div class="data">
                        <p><b>Data desejada para início</b></p>
                        <input class="campo_1" type="date" name="" id="">
                    </div>

                    <div class="orcamento">
                        <p><b>Orçamento estimado</b></p>
                        <input class="campo_1" type="text" placeholder="Ex: R$ 5.000,00">
                    </div>
                </div>

                <div class="Forma_pagamento">
                    <p><b>Forma de pagamento</b></p>
                    <select class="servico" name="" id="">
                        <option value="" selected disabled>
                            Selecione a forma de pagamento
                        </option>
                        <option value="">Cartão de Crédito</option>
                        <option value="">Cartão de Débito</option>
                        <option value="">Pix</option>
                    </select>
                </div>

                <div class="botao">
                    <button class="servico_">
                        <img src="./Img/select.png" alt="">
                        <p>Confirmar contratação</p>
                    </button>
                </div>
            </div>

        </div>

<?php require_once 'Partials/footer.php';?>

</body>

</html>