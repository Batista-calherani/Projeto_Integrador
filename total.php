<?php
require_once 'MySQL/crud.php';
$cargo = $_GET['cargo'] ?? '';
$funcionarios = readAll($pdo, 'profissionais','contrato = 1 or contrato = 0 and Ativo = 1 order by Nome asc');
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

if($_SESSION['user'] != 'ADM'){
    header('Location: 404.php');
}


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionários</title>
    <link rel="stylesheet" href="./CSS/pageFuncionarios.css">
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


                    <li><a href="" class="botao">
                            <img class="icone_" src="./Img/PESSOAS.png" alt="">
                            <h3>Funcionários</h3>
                        </a>
                    </li>


                    <li><a href="contrato_funcionario.php" class="botao">
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
                        <h3><span>Funcionários</span></h3>
                    </div>

                </div>

                <div class="perfil">
                    <img class="foto_perfil" src="./Img/perfil.png" alt="Foto do usuário">

                    <div class="dados_usuario">
                        <h3><?php print $_SESSION['user']?></h3>
                        <p>Administrador(a)</p>
                    </div>
                </div>
            </div>

            <div class="entrada">
                <h1>Bem-vindo, <span>Administrador!</span></h1>
                <P>Aqui mostra todos os profissionais.</P>
            </div>

            <div class="filtro">
                <div class="botao_filtro">
                    <a href="total.php?cargo="><h3>Todos</h3></a>
                </div>

                <div class="botao_filtro">
                    <a href="total.php?cargo=Servente"><h3>Servente</h3></a>
                </div>
                
                <div class="botao_filtro">
                    <a href="total.php?cargo=Pedreiro"><h3>Pedreiro</h3></a>
                </div>
                
                <div class="botao_filtro">
                    <a href="total.php?cargo=Mestre"><h3>Mestre de obra</h3></a>
                </div>
                

            </div>

              <div class="tabela">
                <div class="adicionados">
                    <h3>Funcionários adicionados</h3>
                </div>
                <div class="linha_colunas">
                    <h3>Nome</h3>
                    <h3>Função</h3>
                    <h3>Obra</h3>
                    <h3>Data de adimissão</h3>
                    <h3>Status</h3>
                    <h3>Ações</h3>
                </div>
                <?php
                foreach($funcionarios as $funcionario){
                if($funcionario['cargo'] == $cargo || $cargo == '' ){
                if($funcionario['contrato'] == 1){
                echo '
                <div class="conteudo">
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
                       
                        <img onclick="window.location.href=\'edicaoPerfil.php?id='.$funcionario['id_Prof'].'\'" src="./Img/edit.png" alt="">
                        <img onclick=" if(confirm(\'Tem certeza que deseja excluir este funcionário?\')){window.location.href=\'MySQL/delete.php?id='.$funcionario['id_Prof'].'\';} 
                        else {exit;};"  src="./Img/LIXO.png" alt="">
                    </div>
                </div>';
                }else {
                    echo '
                <div class="conteudo">
                    <div class="coluna_nome">
                        <img class="foto_profissional" src="'.$funcionario['Foto'].'" alt="">
                        <p>'.$funcionario['Nome'].'</p>
                    </div>

                    <p>'.$funcionario['cargo'].'</p>
                    <p>'.$funcionario['Local'].'</p>
                    <p>'.$funcionario['Agenda'].'</p>

                    <div class="status_funcionario_Inativo">
                        Inativo
                    </div>

                    <div class="acoes">
                       
                        <img onclick="window.location.href=\'edicaoPerfil.php?id='.$funcionario['id_Prof'].'\'" src="./Img/edit.png" alt="">
                        <img onclick=" if(confirm(\'Tem certeza que deseja excluir este funcionário?\')){window.location.href=\'MySQL/delete.php?id='.$funcionario['id_Prof'].'\';} 
                        else {exit;};"  src="./Img/LIXO.png" alt="">
                    </div>
                </div>';
                }}};?>