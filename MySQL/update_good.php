<?php
require_once 'crud.php';

$idFun = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($idFun <= 0) {
    echo 'ID invalido.';
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

$obra = [
    'id_Prof' => $idFun,
    'cliente_nome' => $_POST['cliente_nome'] ?? '',
    'cliente_telefone' => $_POST['cliente_telefone'] ?? '',
    'cliente_email' => $_POST['cliente_email'] ?? '',
    'endereco_obra' => $_POST['Obra_Local'] ?? '',
    'tipo_servico' => $_POST['servicos'] ?? '',
    'descricao_projeto' => $_POST['descricao_projeto'] ?? '',
    'data_inicio' => $_POST['data_inicio'] ?? '',
    'orcamento' => $_POST['orcamento'] ?? '',
    'forma_pagamento' => $_POST['forma_pagamento'] ?? ''
];

$stmtObra = $pdo->prepare("INSERT INTO obras_contratadas (
    id_Prof,
    cliente_nome,
    cliente_telefone,
    cliente_email,
    endereco_obra,
    tipo_servico,
    descricao_projeto,
    data_inicio,
    orcamento,
    forma_pagamento
) VALUES (
    :id_Prof,
    :cliente_nome,
    :cliente_telefone,
    :cliente_email,
    :endereco_obra,
    :tipo_servico,
    :descricao_projeto,
    :data_inicio,
    :orcamento,
    :forma_pagamento
) ON DUPLICATE KEY UPDATE
    cliente_nome = VALUES(cliente_nome),
    cliente_telefone = VALUES(cliente_telefone),
    cliente_email = VALUES(cliente_email),
    endereco_obra = VALUES(endereco_obra),
    tipo_servico = VALUES(tipo_servico),
    descricao_projeto = VALUES(descricao_projeto),
    data_inicio = VALUES(data_inicio),
    orcamento = VALUES(orcamento),
    forma_pagamento = VALUES(forma_pagamento)");
$stmtObra->execute($obra);

$dadosAtualizados = [
    'contrato' => 1,
    'Ativo' => 0,
    'Obra_Local' => $obra['endereco_obra']
];

$dadosAtualizados2 = [
    'user' => $_POST['user'] ?? '',
    'acesso' => 'Funcionario',
    'Email' => $_POST['email'] ?? '',
    'Pass' => '$2a$12$0D0MhlhdoUew8gqPDx4vGOgSI.08jLWG7Lj/RViyxeb9.31d4G.3i'
];

$linhasAfetadas = update($pdo, 'profissionais', $dadosAtualizados, "id_Prof='" . $idFun . "'");
$linhasAfetadas2 = create($pdo, 'access', $dadosAtualizados2);

if (isset($linhasAfetadas) && isset($linhasAfetadas2)) {
    header('location: ../index.php');
    exit;
}
