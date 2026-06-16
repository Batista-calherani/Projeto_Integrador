<?php
require_once 'crud.php';
$idFun = $_GET['id'];
if ($idFun <= 0) {
    echo 'ID inválido.';
    exit;
}
$dadosAtualizados = [
    'contrato' => 1,
    'Obra_Local' => $_POST['Obra_Local']
];

$dadosAtualizados2 = [
    'user' => $_POST['user'],
    'acesso' => 'Funcionario',
    'Email' => $_POST['email'],
    'Pass' => '$2a$12$0D0MhlhdoUew8gqPDx4vGOgSI.08jLWG7Lj/RViyxeb9.31d4G.3i'
];

    // Atualiza os dados (sem Foto) primeiro
$linhasAfetadas = update($pdo, 'profissionais', $dadosAtualizados, "id_Prof='" . $idFun . "'");
$linhasAfetadas2 = create($pdo, 'access', $dadosAtualizados2);
if( isset($linhasAfetadas) && isset($linhasAfetadas2) ){
    header('location: ../index.php');
    exit;
}