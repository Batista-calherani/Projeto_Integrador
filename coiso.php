<?php
require_once 'MySQL/crud.php';
$funcionarios = readAll($pdo, 'profissionais');
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
    }
if($_SESSION['user'] != 'Administrador'){
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
    <title>Dashboard</title>
    <link rel="stylesheet" href="./CSS/adm.css">
</head>
<body>
    <img src="Img/Stone_Pickaxe.png" id="cur-dot" data-hover="Img/Stone_Pickaxe_hover.gif" data-click="Img/Enchanted_Stone_Pickaxe_click.gif">
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

                    <li><a href="#" class="botao">
                            <img class="icone_" src="./Img/telefone.png" alt="">
                            <h3>Dashboard</h3>
                        </a>
                    </li>


                    <li><a href="#" class="botao">
                            <img class="icone_" src="./Img/telefone.png" alt="">
                            <h3>Dashboard</h3>
                        </a>
                    </li>


                    <li><a href="#" class="botao">
                            <img class="icone_" src="./Img/telefone.png" alt="">
                            <h3>Dashboard</h3>
                        </a>
                    </li>


                    <li><a href="#" class="botao">
                            <img class="icone_" src="./Img/telefone.png" alt="">
                            <h3>Dashboard</h3>
                        </a>
                    </li>

                    <li><a href="#" class="botao">
                            <img class="icone_" src="./Img/telefone.png" alt="">
                            <h3>Dashboard</h3>
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
                    <img class="foto_perfil" src="./Img/perfil.png" alt="Foto do usuário">

                    <div class="dados_usuario">
                        <h3>Jorge Silva</h3>
                        <p>Administradora</p>
                    </div>
                </div>
            </div>

            <div class="entrada">
                <h1>Bem-vindo, <span>Administrador!</span></h1>
                <P>Aqui está o resumo da gestão de funcionários e obras.</P>
            </div>

            <div class="status">
                <div class="funcionario_ativo">
                    <img class="icone_funcionario" src="./Img/PESSOAS.png" alt="">
                    <div class="informa"><?php $totalAtivos = readTotal($pdo, 'profissionais', 'contrato = 1');?>
                        <h1><span><?php echo $totalAtivos['total']; ?></span></h1>
                        <p>Funcionáios ativos</p>
                    </div>
                </div>

                <div class="funcionario_ativo">
                    <img class="icone_funcionario" src="./Img/EPI.png" alt="">
                    <div class="informa"><?php $totalAtivos = readTotal($pdo, 'profissionais', 'contrato = 1 and cargo = "Pedreiro"');?>
                        <h1><span><?php echo $totalAtivos['total']; ?></span></h1>
                        <p>Pedreiros ativos</p>
                    </div>
                </div>


                <div class="funcionario_ativo">
                    <img class="icone_funcionario" src="./Img/PRANCHETA.png" alt="">
                    <div class="informa"><?php $totalAtivos = readTotal($pdo, 'profissionais', 'contrato = 1 and cargo = "Mestre"');?>
                        <h1><span><?php echo $totalAtivos['total']; ?></span></h1>
                        <p>Mestres ativos</p>
                    </div>
                </div>

                <div class="funcionario_ativo">
                    <img class="icone_funcionario" src="./Img/user.png" alt="">
                    <div class="informa"><?php $totalAtivos = readTotal($pdo, 'profissionais', 'contrato = 1 and cargo = "Servente"');?>
                        <h1><span><?php echo $totalAtivos['total']; ?></span></h1>Serventes ativos</p>
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
                    <h3>Data de Cadastro</h3>
                    <h3>Status</h3>
                    <h3>Ações</h3>
                </div>

                <?php
                foreach ($funcionarios as $funcionario) {
                if($funcionario['contrato'] == 1){
            echo '<div class="conteudo">
                    <div class="coluna_nome">
                        <img class="foto_profissional" src="'.$funcionario['Foto'].'" alt="">
                        <p>'.$funcionario['Nome'].'</p>
                    </div>

                    <p>'.$funcionario['cargo'].'</p>
                    <p>'.$funcionario['Local'].'</p>
                    <p>'.$funcionario['Agenda'].'</p>
                    <div class="status_funcionario">
                        Ativo
                    </div>

                    <div class="acoes">
                        <img src="./Img/OLHO.png" alt="">
                        <img src="./Img/edit.png" alt="">
                        <img onclick=" if(confirm(\'Tem certeza que deseja excluir este funcionário?\')){window.location.href=\'MySQL/delete.php?id='.$funcionario['id_Prof'].'\';} 
                        else {exit;};"  src="./Img/LIXO.png" alt="">
                    </div>
                </div><div>';}
                elseif($funcionario['contrato'] == 0){
                    echo '<div class="conteudo">
                    <div class="coluna_nome">
                        <img class="foto_profissional" src="'.$funcionario['Foto'].'" alt="">
                        <p>'.$funcionario['Nome'].'</p>
                    </div>

                    <p>'.$funcionario['cargo'].'</p>
                    <p>'.$funcionario['Local'].'</p>
                    <p>'.$funcionario['Agenda'].'</p>
                    <div class="status_funcionario_inativo">
                        Inativo
                    </div>

                    <div class="acoes">
                        <img src="./Img/OLHO.png" alt="">
                        <img src="./Img/edit.png" alt="">
                        <img onclick=" if(confirm(\'Tem certeza que deseja excluir este funcionário?\')){window.location.href=\'MySQL/delete.php?id='.$funcionario['id_Prof'].'\';} 
                        else {exit;};"  src="./Img/LIXO.png" alt="">
                    </div></div>';}};?>
</body>

</html>
    <?php require_once 'Partials/footer.php';?>
</body>
</html>