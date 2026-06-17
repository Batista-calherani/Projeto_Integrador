<?php
require_once 'MySQL/crud.php';
$cargo = $_GET['cargo'] ?? '';
$pedidos = readAll($pdo, 'profissionais','Ativo = 0 order by Nome asc');
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
    }
if($_SESSION['user'] != 'ADM'){
    echo "<script> if(confirm('Somente pessoal autorizado, deseja retornar?')){
        window.location.href = 'index.php';} else {
        window.location.href = 'login.php';};</script>";
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Contratações</title>
    <link rel="stylesheet" href="./CSS/contrato_funcionario.css">
    <link rel="stylesheet" href="./CSS/footer.css">
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


                    <li><a href="" class="botao">
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
                        <h3><span>Gestão de contratação</span></h3>
                    </div>

                    <h3>Visão geral do sistema</h3>
                    <div></div>

                </div>

                <div class="perfil">
                    <img class="foto_perfil" src="./Img/perfil.png" alt="Foto do usuário">

                    <div class="dados_usuario">
                        <h3>Jorge Silva</h3>
                        <p>Administradora</p>
                    </div>
                </div>
            </div>

            <div class="entrada">
                <div class="texto">
                    <h1>Gestão de <span>Contratação</span></h1>
                    <P>Acompanhe e gerencie todas as solicitações de contratação.</P>
                </div>

                <div class="nova_contratacao">
                    <div class="botao_contratacao">
                        <a href="novo_funcionario.php">
                            <h3>+ Nova contratação</h3>
                        </a>
                    </div>

                </div>
            </div>

            <div class="status">
                <div class="funcionario_ativo">
                    <img class="icone_funcionario" src="./Img/PESSOAS.png" alt="">
                    <div class="informa"><?php $totalPendente = readTotal($pdo, 'profissionais', 'Ativo = 0');?>
                        <h1><span><?php echo $totalPendente['total']; ?></span></h1>
                        <h3>Pendente</h3>
                        <p>Funcionários Pendentes</p>
                    </div>
                </div>



                <div class="funcionario_ativo">
                    <img class="icone_funcionario" src="./Img/PRANCHETA.png" alt="">
                    <div class="informa"><?php $totalPendente = readTotal($pdo, 'profissionais', 'Ativo = 0');?>
                        <h1><span><?php echo $totalPendente['total']; ?></span></h1>
                        <h3>Pedidos</h3>
                        <p>Pedidos Totais</p>
                    </div>
                </div>

                <div class="funcionario_ativo">
                    <img class="icone_funcionario" src="./Img/user.png" alt="">
                    <div class="informa"><?php $totalAtivos = readTotal($pdo, 'profissionais', 'contrato = 1 and Ativo = 1');?>
                        <h1><span><?php echo $totalAtivos['total']; ?></span></h1>
                        <h3>Ativos</h3>
                        <p>Funcionáios ativos</p>
                    </div>
                </div>
            </div>

            <div class="filtro_funcionario">

                <div class="filter">
                    <div class="filtro_nome">
                        <div class="campo_1">
                            <p><b>Nome Funcionário</b></p>
                            <input class="campo_2" type="text" placeholder="Ex:Jorge Silva">
                        </div>
                    </div>

                    <div class="filtros">
                        <p><b>Cargos</b></p>
                        <select class="campo_1" type="servicos" placeholder="Ex:30">
                            <option selected disabled>
                                Escolha sua área
                            </option>
                            <option value="">Servente</option>
                            <option value="">Pedreiro</option>
                            <option value="">Mestre de Obra</option>
                        </select>
                    </div>

                    <div class="buscar">
                        <div class="botao_buscar">
                            <a href="#">
                                <img class="icone_buscar" src="./Img/buscar.png" alt="">
                                <h3>Buscar</h3>
                            </a>
                        </div>
                    </div>

                    <div class="buscar">
                        <div class="botao_buscar">
                            <a href="#">
                                <img class="icone_buscar" src="./Img/limpar.png" alt="">
                                <h3>Limpar</h3>
                            </a>
                        </div>
                    </div>

                </div>

            </div>

            <div class="tabela">
                <div class="adicionados">
                    <h3>Últimos funcionários adicionados</h3>
                </div>
                <div class="linha_colunas">
                    <h3>Nome</h3>
                    <h3>Função</h3>
                    <h3>Obra</h3>
                    <h3>Data de solicitações</h3>
                    <h3>Status</h3>
                    <h3>Ações</h3>
                </div>

                <?php foreach($pedidos as $pedido){
                    echo '<div class="conteudo">
                    <div class="coluna_nome">
                        <img class="foto_profissional" src="'.$pedido['Foto'].'" alt="">
                        <p>'.$pedido['Nome'].'</p>
                    </div>

                    <p>'.$pedido['cargo'].'</p>
                    <p>'.$pedido['cargo'].'</p>
                    <p>'.$pedido['Agenda'].'</p>

                    <div class="status_funcionario_pendente">
                        Pendentes
                    </div>

                    <div class="acoes">

                        <a href="edicao.php?id='.$pedido['id_Prof'].'"><img src="./Img/OLHO.png" alt=""></a>

                    </div>
                </div>';};?>


            </div>
        </div>
    </div>

</body>

</html>
