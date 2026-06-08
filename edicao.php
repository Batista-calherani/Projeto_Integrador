<?php
session_start();
$id = $_GET['id'];
include_once('MySQL/crud.php');
$funcionarios = readAll($pdo, 'profissionais','id_Prof = ' . $id);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./CSS/edicao.css">
    <!-- <link rel="stylesheet" href="./CSS/adm.css"> -->
</head>

<body>
    <img src="Img/Stone_Pickaxe.png" id="cur-dot" data-hover="Img/Stone_Pickaxe_hover.gif" data-click="Img/Enchanted_Stone_Pickaxe_click.gif">
    <div class="espaco_dashboard">
        <aside>
            <div class="dentro">
                <div class="logo_nome">
                    <img class="logo" src="./Img/logo_laranja.png">
                    <h1>Con<span>Group</span></h1>
                </div>

                <div class="linha"></div>

                <ul class="forma">

                    <li><a href="coiso.php" class="botao">
                            <img class="icone_" src="./Img/home.png" alt="">
                            <h3>Dashboard</h3>
                        </a>
                    </li>


                    <li><a href="total.php" class="botao">
                            <img class="icone_" src="./Img/PESSOAS.png" alt="">
                            <h3>Funcionários</h3>
                        </a>
                    </li>


                    <li><a href="Contrato_funcionario.html" class="botao">
                            <img class="icone_" src="./Img/contrato.png" alt="">
                            <h3>Gestão de contratação</h3>
                        </a>
                    </li>

                </ul>

                <div class="sair">
                    <div class="user">
                        <a href="login.php">
                            <h1>sair</h1>
                        </a>
                    </div>
                </div>
            </div>
        </aside>


        <div class="espaco">
            <div class="cabecalho">
                <div class="linha_"></div>
                <div class="pagina">
                    <div class="page_select">
                        <h3><span>Dashboard</span></h3>
                    </div>

                    <h3>Visão geral do sistema</h3>
                    <div></div>

                </div>

                <div class="perfil">
                    <img class="foto_perfil" src="./Img/perfil.png" alt="Foto do usuário">

                    <div class="dados_usuario">
                        <h3><?php print $_SESSION['user'] ?>    </h3>
                        <p>Administradora</p>
                    </div>
                </div>
            </div>
<?php foreach($funcionarios as $funcionario){echo'
            <div class="perfil_profiissional">
                <div class="foto">
                    <img class="foto_profissional" src="' . $funcionario['Foto'] . '" alt="">
                </div>

                <div class="dados_">
                    <h1>' . $funcionario['Nome'] . '</h1>
                    <p>Cargo desejado</p>
                    <H3>' . $funcionario['cargo'] . '</H3>
                </div>

                <div class="dados_pessoais">
                    <p>Data de solicitação</p>
                    <h3>' . $funcionario['Agenda'] . '</h3>
                </div>

                <div class="dados_pessoais">
                    <p>Status de solicitação</p>
                    <div class="status_funcionario">
                        Em análise
                    </div>
                </div>

                <div class="contato">
                    <div class="fone">
                        <img class="icone_contato" src="./Img/telefone.png" alt="">
                        <p>' . $funcionario['Tefone'] . '</p>
                    </div>
                    <div class="email">
                        <img class="icone_contato" src="./Img/email.png" alt="">
                        <p class="infor_">' . $funcionario['Email'] . '</p>
                    </div>
                    <div class="endereco">
                        <img class="icone_contato" src="./Img/localização.png" alt="">
                        <p>' . $funcionario['Local'] . '</p>
                    </div>
                </div>
            </div>


            <div class="quadrado">
                <div class="informacoes_profissional">
                    <div class="categoria">
                        <img class="icone_dados" src="./Img/PESSOAS.png" alt="">
                        <h3 class="titulo_categoria">Dados Pessoais</h3>
                    </div>
                    <div class="nome_profissional">
                        <p>Nome completo:</p>
                        <p>Jorge Silva</p>
                    </div>

                    <div class="nome_profissional">
                        <p>Nome completo:</p>
                        <p>Jorge Silva</p>
                    </div>

                    <div class="nome_profissional">
                        <p>Nome completo:</p>
                        <p>Jorge Silva</p>
                    </div>

                    <div class="nome_profissional">
                        <p>Nome completo:</p>
                        <p>Jorge Silva</p>
                    </div>
                </div>

                <div class="informacoes_profissional">
                    <div class="categoria">
                        <img class="icone_dados" src="./Img/PESSOAS.png" alt="">
                        <h3 class="titulo_categoria">Dados Pessoais</h3>
                    </div>
                    <div class="nome_profissional">
                        <p>Nome completo:</p>
                        <p>Jorge Silva</p>
                    </div>

                    <div class="nome_profissional">
                        <p>Nome completo:</p>
                        <p>Jorge Silva</p>
                    </div>

                    <div class="nome_profissional">
                        <p>Nome completo:</p>
                        <p>Jorge Silva</p>
                    </div>

                    <div class="nome_profissional">
                        <p>Nome completo:</p>
                        <p>Jorge Silva</p>
                    </div>
                </div>

                <div class="informacoes_profissional">
                    <div class="categoria">
                        <img class="icone_dados" src="./Img/PESSOAS.png" alt="">
                        <h3 class="titulo_categoria">Dados Pessoais</h3>
                    </div>

                    <div class="sobre_mim">
                        <div class="bio">
                            <p>
                                '.$funcionario['descri'].'
                            </p>
                        </div>
                    </div>
                </div>

            </div>
            ';}?>
            <div class="escolha">
                <div class="categoria_">
                    <img class="icone_dados" src="./Img/PESSOAS.png" alt="">
                    <h3 class="titulo_categoria">Dados Pessoais</h3>
                </div>
                <div class="botao_escolha">
                    <div class="nova_contratacao">
                        <div class="botao_contratacao_aprovado">
                            <a href="#">
                                <h3>Aprovar</h3>
                            </a>
                        </div>
                    </div>

                    <div class="nova_contratacao_rejeitado">
                        <div class="botao_contratacao">
                            <a href="#">
                                <h3>Rejeitar</h3>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>




</body>

</html>