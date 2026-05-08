<?php 

require_once 'crud.php';
$livros = readAll($pdo, 'livros');
// print_r($livros);

foreach($livros as $livro){
    echo 'ID'. $livro['id'].',Titulo: '.$livro['titulo'].'<br> <br> ';
}

echo '<br><br><br><br><br><br><br>';

$livro = read($pdo, 'livros', "id = ".$_GET['id']);
if($livro){
    echo 'Titulo:'.$livro['titulo'].'<br>';
    echo 'Preço: R$'. $livro['preco'];
    echo "<br><img src='".$livro['capa']."' alt=capa/>";
    echo "<br><a href='form.php'>Inserir Mais Livros</a>";
} else {
    echo 'Livro não encontrado!!';
}

