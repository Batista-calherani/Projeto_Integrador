<?php
session_start();
$id = $_GET['id'];
include_once 'MySQL/crud.php';
$pedidos = readAll($pdo, 'profissionais','id_Prof = ' . $id);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição</title>
    <link rel="stylesheet" href="./CSS/gestao.css">
    <link rel="icon" type="image/x-icon" href="Img/logo_laranja.ico">
</head>

<body>
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


                    <li><a href="Contrato_funcionario.php" class="botao">
                            <img class="icone_" src="./Img/contrato.png" alt="">
                            <h3>Gestão de contratação</h3>
                        </a>
                    </li>

                </ul>

                <div class="sair">
                    <div class="user">
                        <a href="Login.php">
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
                
                    <img class="foto_perfil" src="" alt="Foto do usuário">

                    <div class="dados_usuario">
                        <h3></h3>
                        <p>Administradora</p>
                    </div>
                </div>
            </div>

            <div class="entrada">
                <div>
                    <h1>Bem-vindo, <span>Administrador!</span></h1>
                    <P>Aqui está o resumo da gestão de funcionários e obras.</P>
                </div>
            </div>

            <div class="perfil_profiissional">
                <?php foreach($pedidos as $pedido){
                    echo '
                <div class="foto">
                    <img class="foto_profissional" src="'.$pedido['Foto'].'" alt="">
                </div>

                <div class="dados_">
                    <h1>'.$pedido['Nome'].'</h1>
                    <p>Cargo desejado</p>
                    <H3>'.$pedido['cargo'].'</H3>
                </div>

                <div class="dados_pessoais">
                    <p>Data de solicitação</p>
                    <h3>'.$pedido['Agenda'].'</h3>
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
                        <P>'.$pedido['Tefone'].'</P>
                    </div>
                    <div class="email">
                        <img class="icone_contato" src="./Img/email.png" alt="">
                        <p class="infor_">'.$pedido['Email'].'</p>
                    </div>
                    <div class="endereco">
                        <img class="icone_contato" src="./Img/localização.png" alt="">
                        <p>'.$pedido['Local'].'</p>
                    </div>
                </div>
            </div>


            <div class="quadrado">
                <div class="informacoes_profissional">
                    <div class="categoria">
                        <img class="icone_dados" src="./Img/dados_pessoais.png" alt="">
                        <h3 class="titulo_categoria">Dados Pessoais</h3>
                    </div>
                    <div class="nome_profissional">
                        <p class="informacaos">NOME COMPLETO:</p>
                        <p>'.$pedido['Nome'].'</p>
                    </div>

                    <div class="nome_profissional">
                        <p class="informacaos">TELEFONE:</p>
                        <p>'.$pedido['Tefone'].'</p>
                    </div>

                    <div class="nome_profissional">
                        <p class="informacaos">IDADE:</p>
                        <p>'.$pedido['Idade'].'</p>
                    </div>

                    <div class="nome_profissional">
                        <p class="informacaos">EMAIL:</p>
                        <p>'.$pedido['Email'].'</p>
                    </div>

                    <div class="nome_profissional">
                        <p class="informacaos">CPF:</p>
                        <p>'.$pedido['cpf'].'</p>
                    </div>
                </div>

                <div class="informacoes_profissional">
                    <div class="categoria">
                        <img class="icone_dados" src="./Img/pasta_trabalho.png" alt="">
                        <h3 class="titulo_categoria">Dados Profissionais</h3>
                    </div>

                    <div class="nome_profissional">
                        <p class="informacaos">TEMPO DE EXPERIÊNCIA:</p>
                        <p>'.$pedido['tempo'].'</p>
                    </div>

                    <div class="nome_profissional">
                        <p class="informacaos">ENDEREÇO:</p>
                        <p>'.$pedido['Local'].'</p>
                    </div>

                    <div class="nome_profissional">
                        <p class="informacaos">SALÁRIO:</p>
                        <p>'.$pedido['Salario'].'</p>
                    </div>

                    <div class="nome_profissional">
                        <p class="informacaos">CARGO:</p>
                        <p>'.$pedido['cargo'].'</p>
                    </div>

                </div>

                <div class="informacoes_profissional">
                    <div class="categoria">
                        <img class="icone_dados" src="./Img/file.png" alt="">
                        <h3 class="titulo_categoria">Dados Biografia</h3>
                    </div>

                    <div class="sobre_mim">
                        <div class="bio">
                            <p id="">'.$pedido['descri'].'</p>
                        </div>
                    </div>
                </div>

            </div>


            <div class="parte_escolha">
                <div class="escolha">
                    <div class="categoria_">
                        <img class="icone_dados_" src="./Img/send.png" alt="">
                        <h3 class="titulo_escolha">Documentos Enviados</h3>
                    </div>
                    <div class="botao_escolha">
                        <div class="nova_contratacao">

                            <a class="botao_contratacao_aprovado" href="MySQL/update_enter.php?id='.$pedido['id_Prof'].'">
                                <div >
                                    <h3>Aprovar</h3>
                                </div>
                            </a>

                        </div>

                        <div class="nova_contratacao_rejeitado">
                                <a class="nova_contratacao_rejeitado" href="MySQL/delete.php?id='.$pedido['id_Prof'].'">
                                    <div >
                                        <h3>Rejeitar</h3>
                                    </div>
                                </a>
                        </div>

                    </div>
                </div>

            </div>


';};?>
        </div>
<script src="Partials/Top.js"></script>

</body>

<?php include_once "Partials/footer.php";?>

</html>
