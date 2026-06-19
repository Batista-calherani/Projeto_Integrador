<?php
require_once 'MySQL/crud.php';

session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

if ($_SESSION['user'] != 'ADM') {
    header('Location: 404.php');
    exit;
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id <= 0) {
    header('Location: coiso.php');
    exit;
}

$pdo->exec("CREATE TABLE IF NOT EXISTS obras_contratadas (
    id_obra int auto_increment,
    id_Prof int not null,
    cliente_nome varchar(100) not null,
    cliente_telefone varchar(20) not null,
    cliente_email varchar(100) not null,
    endereco_obra varchar(255) not null,
    tipo_servico varchar(100) not null,
    descricao_projeto varchar(500) not null,
    data_inicio date not null,
    orcamento varchar(50) default null,
    forma_pagamento varchar(100) not null,
    criado_em timestamp default current_timestamp,
    primary key(id_obra),
    unique key obra_profissional_unica (id_Prof)
)");

$stmt = $pdo->prepare("SELECT
        p.Nome as profissional_nome,
        p.Tefone as profissional_telefone,
        p.Email as profissional_email,
        p.Obra_Local,
        o.cliente_nome,
        o.cliente_telefone,
        o.cliente_email,
        o.endereco_obra,
        o.tipo_servico,
        o.descricao_projeto,
        o.data_inicio,
        o.orcamento,
        o.forma_pagamento
    FROM profissionais p
    LEFT JOIN obras_contratadas o ON o.id_Prof = p.id_Prof
    WHERE p.id_Prof = :id
    LIMIT 1");
$stmt->execute([':id' => $id]);
$obra = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$obra) {
    header('Location: coiso.php');
    exit;
}

function mostrar($valor) {
    $valor = trim((string) $valor);
    return htmlspecialchars($valor !== '' ? $valor : 'Nao informado', ENT_QUOTES, 'UTF-8');
}

function dataBr($data) {
    if (!$data) {
        return 'Nao informado';
    }

    $timestamp = strtotime($data);
    return $timestamp ? date('d/m/Y', $timestamp) : $data;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informacoes da Obra</title>
    <link rel="stylesheet" href="CSS/informacao_obra.css">
    <link rel="icon" type="image/x-icon" href="Img/logo_laranja.ico">
</head>

<body>

     <aside class="sidebar">
        <div class="logo">
             <div class="logo_nome">
                    <img class="logo_empresa" src="Img/logo_laranja.png">
                    <h1><span>Con</span>Group</h1>
                </div>
        </div>


          <div class="sair">
                    <div class="user">
                        <a href="coiso.php">
                            <h1>sair</h1>
                        </a>
                    </div>
                </div>
    </aside>

    <main class="container">

        <div class="card-topo">
            <div class="icone">🏗️</div>

            <div>
                <h2>Detalhes da Obra</h2>
                <p>
                    Parabens administrador - seu colaborador foi contratado.<br><b>Entre em contato com ele e informe sobre a obra.</b>
                </p>
            </div>
        </div>

        <section class="card-obra">

            <div class="info">
                <span>Nome Completo</span>
                <p><?php echo mostrar($obra['cliente_nome']); ?></p>
            </div>

            <div class="info">
                <span>Telefone</span>
                <p><?php echo mostrar($obra['cliente_telefone']); ?></p>
            </div>

            <div class="info">
                <span>Email</span>
                <p><?php echo mostrar($obra['cliente_email']); ?></p>
            </div>

            <div class="info">
                <span>Endereco da Obra</span>
                <p><?php echo mostrar($obra['endereco_obra'] ?: $obra['Obra_Local']); ?></p>
            </div>

            <div class="info">
                <span>Tipo de Servico</span>
                <p><?php echo mostrar($obra['tipo_servico']); ?></p>
            </div>

            <div class="info descricao">
                <span>Descricao do Projeto</span>
                <p><?php echo mostrar($obra['descricao_projeto']); ?></p>
            </div>

            <div class="info">
                <span>Data Desejada para Inicio</span>
                <p><?php echo htmlspecialchars(dataBr($obra['data_inicio']), ENT_QUOTES, 'UTF-8'); ?></p>
            </div>

            <div class="info">
                <span>Orcamento Estimado</span>
                <p><?php echo mostrar($obra['orcamento']); ?></p>
            </div>

            <div class="info">
                <span>Forma de Pagamento</span>
                <p><?php echo mostrar($obra['forma_pagamento']); ?></p>
            </div>

            <div class="info">
                <span>Profissional Contratado</span>
                <p><?php echo mostrar($obra['profissional_nome']); ?></p>
            </div>

            <div class="info">
                <span>Telefone do Profissional</span>
                <p><?php echo mostrar($obra['profissional_telefone']); ?></p>
            </div>

            <div class="info">
                <span>E-mail do Profissional</span>
                <p><?php echo mostrar($obra['profissional_email']); ?></p>
            </div>

        </section>

    </main>

</body>

</html>
