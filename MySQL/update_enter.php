<?php
require_once 'crud.php';
$idFun = $_GET['id'];
if ($idFun <= 0) {
    echo 'ID inválido.';
    exit;
}
$dadosAtualizados = [
    'Ativo' => 1,
];

    // Atualiza os dados (sem Foto) primeiro
$linhasAfetadas = update($pdo, 'profissionais', $dadosAtualizados, "id_Prof='" . $idFun . "'");

if( isset($linhasAfetadas)){
    header('location: ../total.php');
    exit;
}