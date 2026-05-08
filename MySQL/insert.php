<?php
require_once 'crud.php';

$novoLivro = [
    'titulo' => $_POST['titulo'],
    'isbn' => $_POST['isbn'],
    'autor' => $_POST['autor'],
    'preco' => $_POST['preco'],
    'situacao' => $_POST['situacao'],
    'categoria' => $_POST['categoria'],
    'capa' => ''
];

$idNovoLivro = create($pdo, 'livros', $novoLivro);

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
    update($pdo,'livros', ['capa' => $capaUrl],"id = $idNovoLivro");
    echo "Livro inserido com sucesso com o ID: $idNovoLivro<br><br>";
    echo "<a href='select.php?id=$idNovoLivro'>Ver Livro</a>";
} else {
    echo "erro em enviar imagem.";
}