<?php
require_once 'crud.php';

$novoFun = [
    'Nome' => $_POST['Nome'],
    'cargo' => $_POST['cargo'],
    'Local' => $_POST['Local'],
    'Agenda' => date('Y-m-d'),
    'Salario' => $_POST['Salario'],
    'Tefone' => $_POST['tefone'],
    'Email' => $_POST['email'],
    'tempo' => $_POST['tempo'],
    'descri' => $_POST['descri'],
    'Idade' => $_POST['Idade'],
    'Foto' => ''
];

$idNovoFun = create($pdo, 'profissionais', $novoFun);

$tipo_permitido = ['image/jpeg','image/png','image/gif','image/jpg'];
if(!in_array($_FILES['arquivo']['type'],$tipo_permitido)) {
    echo "Tipo de arquivo não permitido.";
    exit;
}

$tamanho_max = 5 * 1024 * 1024; // 5MB
if($_FILES['arquivo']['size'] > $tamanho_max) {
    echo "Arquivo muito grande.";
    exit;
}

$extensao = pathinfo($_FILES['arquivo']['name'],PATHINFO_EXTENSION);
$novonome = "capa_".uniqid().".".$extensao;

$dir = "../uploads/";
$caminho = $dir."$idNovoFun/";
$file = $caminho.$novonome;
if(!is_dir($caminho)) {
    mkdir($caminho, 0755, true); //
}

if(move_uploaded_file($_FILES['arquivo']['tmp_name'],$file)){
$dir = "uploads/";
$caminho = $dir."$idNovoFun/";
$file = $caminho.$novonome;
    $capaUrl = $file;
    update($pdo,'profissionais', ['Foto' => $capaUrl],"id_Prof = $idNovoFun");
    echo "Agora espera fi.";
} else {
    echo "erro em enviar imagem.";
}