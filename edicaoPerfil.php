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
    <link rel="stylesheet" href="./CSS/edicao_perfil.css">
    <link rel="stylesheet" href="CSS/footer.css">
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


                    <li><a href="#" class="botao">
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
                        <h3><?php print $_SESSION['user'] ?></h3>
                        <p>Administradora</p>
                    </div>
                </div>
            </div>

            <div class="entrada">
                <div>
                    <h1>Bem-vindo, <span>Administrador!</span></h1>
                    <P>Aqui está o resumo da gestão de funcionários e obras.</P>
                </div>

                <div class="nova_contratacao">
                    <div class="botao_cancelar">
                        <a href="total.php">
                            <h3>Cancelar</h3>
                        </a>
                    </div>
                    <form action="MySQL/update_fun.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
                    <div class="nova_contratacao">
                        <div class="botao_contratacao">
                            <button type="submit">
                                <h3>Salvar alterações</h3>
                            </button>
                        </div>
                    </div>
                </div>

            </div>

            <div class="informacoes">
                <?php foreach($funcionarios as $funcionario){
                echo '
                
                <div class="parte_foto">
                    <h3>Foto do Funcionários</h3>
                    <img style="border-radius: 100%;" class="foto_funcionario" src="'.$funcionario['Foto'].'" alt="">
                    <input type="file" name="arquivo"></input>
                </div>

                <div class="dados_profissional">
                    <h3 class="titulo_"><img class="icone_dado" src="./Img/dados_pessoais.png" alt="">Dados Pessoais</h3>

                    <div class="campos">
                        <div class="campo_nome">
                            <b>
                                <p>Nome completo</p>
                            </b>
                            <input class="nomeCompleto" placeholder="'.$funcionario['Nome'].'" name="Nome" type="text">
                        </div>

                        <div class="idade">
                            <b>
                                <p>Idade</p>
                            </b>
                            <input placeholder="'.$funcionario['Idade'].'" class="idade_" name="Idade" type="text">
                        </div>

                    </div>

                    <div class="campos">
                        <div class="campo_nome">
                            <b>
                                <p>Endereço</p>
                            </b>
                            <input class="nomeCompleto" placeholder="'.$funcionario['Local'].'" name="Endereco" type="text">
                        </div>

                        <div class="idade">
                            <b>
                                <p>Telefone</p>
                            </b>
                            <input class="idade_" type="text" placeholder="'.$funcionario['Tefone'].'" name="tefone">
                        </div>

                    </div>


                    <div class="campos">
                        <div class="campo_nome">
                            <b>
                                <p>Email</p>
                            </b>
                            <input class="nomeCompleto" placeholder="'.$funcionario['Email'].'" type="email" name="email">
                        </div>

                        <div class="idade">
                            <b>
                                <p>CPF</p>
                            </b>
                            <input class="idade_" placeholder="'.$funcionario['cpf'].'" type="text" name="cpf">
                        </div>

                    </div>
                </div>
            </div>

            <div class="segundo_dados">
                <div class="dados_servico">
                    <h3 class="titulo_"> <img class="icone_dado"  src="./Img/pasta_trabalho.png" alt=""> Dados Profissionais</h3>

                    <div class="dados_funcionario">
                        <div class="select_funcao">
                            <b>
                                <p>Função</p>
                            </b>';
                            if($funcionario['cargo'] == 'Servente'){
                                echo '<select class="job" name="cargo" id="">
                                <option value="Servente" selected>Servente</option>
                                <option value="Pedreiro">Pedreiro</option>
                                <option value="Mestre">Mestre de obra</option>
                            </select>';
                            }elseif($funcionario['cargo'] == 'Pedreiro'){
                                echo '<select class="job" name="cargo" id="">
                                <option value="Servente">Servente</option>
                                <option value="Pedreiro" selected>Pedreiro</option>
                                <option value="Mestre">Mestre de obra</option>
                            </select>';
                            }elseif($funcionario['cargo'] == 'Mestre'){
                                echo '<select class="job" name="cargo" id="">
                                <option value="Servente">Servente</option>
                                <option value="Pedreiro">Pedreiro</option>
                                <option value="Mestre" selected>Mestre de obra</option>
                            </select>';}
                        echo '
                        </div>

                        <div class="idade">
                            <b>
                                <p>Data de Admissão</p>
                            </b>
                            <input class="idade" type="text" disabled placeholder="'.$funcionario['Agenda'].'">
                        </div>

                    </div>

                    <div class="dados_funcionario">
                        <div class="idade">
                            <b>
                                <p>Local Da Obra</p>
                            </b>
                            <input class="idade" name="Local" placeholder="null" type="text" name="Obra_Local">
                        </div>

                        <div class="idade">
                            <b>
                                <p>Salario</p>
                            </b>
                            <input class="idade" name="Salario" placeholder="'.$funcionario['Salario'].'" type="text">
                        </div>

                    </div>  

                    <div class="dados_funcionario">
                        <div class="select_funcao">
                            <b>
                                <p>Status</p>
                            </b>';
                                if($funcionario['Status'] == 'Disponivel'){
                                    echo '<select class="job" name="status" id="">
                                    <option value="Disponivel" selected>Disponível</option>
                                    <option value="Em Serviço">Em Serviço</option>
                                </select>';
                                }else{
                                    echo '<select class="job" name="status" id="">
                                    <option value="Disponivel">Disponível</option>
                                    <option value="Em Serviço" selected>Em Serviço</option>
                                </select>';
                                };
                            echo '
                        </div>

                        <div class="idade">
                            <b>
                                <p>Tempo de experincia</p>
                            </b>
                            <input class="idade" type="text" placeholder="'.$funcionario['tempo'].' ano(s)" name="tempo">
                        </div>
                    </div>



                </div>

                <div class="dados_servico">
                    <div class="biografia">
                        <img class="icone_dado" src="./Img/file.png" alt="">
                          <h3 class="titulo_">Biografia dados profissional</h3>
                    </div>

                    <div class="sobre">
                        <textarea maxlength="500" placeholder="'.$funcionario['descri'].'" name="descri" id=""></textarea>
                    </div>

                </div>

            </div>
            </form>
';}?>

</div>
<script src="Partials/Top.js"></script>
<?php include_once "Partials/footer.php";?>
</body>

</html>