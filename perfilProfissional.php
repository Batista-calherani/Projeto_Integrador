<?php
session_start();
require_once 'MySQL/crud.php';
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
    }
$email = $_GET['email'];
$funcionarios = readAll($pdo, 'profissionais',"Email ='".$email."'");

if($_SESSION['user'] != 'Funcionario'){
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
    <title>Perfil do Profissional</title>
    <link rel="stylesheet" href="./CSS/pageProfissional.css">
</head>

<body>

    <aside class="sidebar">
        <div class="logo">
            <div class="logo_nome">
                <img class="logo_empresa" src="./Img/logo_laranja.png">
                <h1><span>Con</span>Group</h1>
            </div>
        </div>

        <nav>
            <a href="perfilProfissional.php" class="ativo">Seu perfil</a>
            <a href="./html/informacao_obra.html">Obras</a>

        </nav>

        <div class="sair">
            <div class="user">
                <a href="login.html">
                    <h1>sair</h1>
                </a>
            </div>
        </div>
    </aside>

    <main class="container">

        <h1>Perfil do <span>Profissional</span></h1>

        <section class="perfil">

            <div class="card-foto">
                <img src="./Img/perfil.png" alt="Profissional">

                <h2>João Carlos da Silva</h2>
                <span class="cargo">Pedreiro</span>

                <button class="btn-contratar">
                    <a href="edicao_funcionario.php">
                        Editar Perfil
                    </a>
                </button>

            </div>

            <div class="card-info">

                <h3>Informações Pessoais</h3>
<?php foreach($funcionarios as $fun){ echo'
                <div class="info">
                    <span>Nome Completo</span>
                    <p>'.$fun['Nome'].'</p>
                </div>

                <div class="info">
                    <span>Telefone</span>
                    <p>'.$fun['Tefone'].'</p>
                </div>

                <div class="info">
                    <span>Email</span>
                    <p>'.$fun['Email'].'</p>
                </div>

                <div class="info">
                    <span>Endereço</span>
                    <p>'.$fun['Local'].'</p>
                </div>

                <div class="info">
                    <span>Idade</span>
                    <p>'.$fun['Idade'].'</p>
                </div>

                <div class="info">
                    <span>Tempo de Experiência</span>
                    <p>'.$fun['tempo'].'</p>
                </div>

                <div class="info">
                    <span>Cargo</span>
                    <p>'.$fun['cargo'].'</p>
                </div>

                <div class="info">
                    <span>CPF</span>
                    <p>'.$fun['cpf'].'</p>
                </div>

                <div class="info">
                    <span>Salário</span>
                    <p>'.$fun['Salario'].'</p>
                </div>
';};?>
            </div>

        </section>

        <section class="biografia">
            <h3>Biografia</h3>

            <p>
                Profissional com mais de 10 anos de experiência na construção
                civil, especializado em alvenaria, reboco e acabamento.
                Comprometido com qualidade e pontualidade em todos os projetos.
            </p>
        </section>

    </main>

</body>

</html>