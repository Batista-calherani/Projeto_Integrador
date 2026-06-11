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

    // Atualiza os dados (sem Foto) primeiro
$linhasAfetadas = update($pdo, 'profissionais', $dadosAtualizados, "id_Prof='" . $idFun . "'");

if( isset($linhasAfetadas)){
    header('location: ../index.php');
    exit;
}