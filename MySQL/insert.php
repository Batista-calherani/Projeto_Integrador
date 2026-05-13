<?php
require_once 'crud.php';

$novoFun = [
    'Nome' => $_POST['titulo'],
    'cargo' => $_POST['isbn'],
    'Agenda' => $_POST['autor'],
    'contrato' => $_POST['preco'],
    'Foto' => ''
];

$idNovoFun = create($pdo, 'profissionais', $novoFun);

$tipo_permitido = ['image/jpeg','image/png','image/gif'];
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

$dir = "uploads/";
$caminho = $dir."$idNovoLivro/";
$file = $caminho.$novonome;
if(!is_dir($caminho)) {
    mkdir($caminho, 0755, true); //
}

if(move_uploaded_file($_FILES['arquivo']['tmp_name'],$file)){
    $capaUrl = $file;
    update($pdo,'profissionais', ['capa' => $capaUrl],"id = $idNovoFun");
    echo "Profissional inserido com sucesso com o ID: $idNovoFun<br><br>";
    echo "<a href='select.php?id=$idNovoFun'>Ver Resumo</a>";
} else {
    echo "erro em enviar imagem.";
}