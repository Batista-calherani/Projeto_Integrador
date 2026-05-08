<?php
require_once 'crud.php';

$idFun = $_GET['id'];

$deleted = delete($pdo, 'Empregados','id ='.$idFun);

if ($deleted) {
    header("Location: select.php");
    exit;
} else {
    echo 'Não foi possivel deletar o funcionário selecionado.';
}
