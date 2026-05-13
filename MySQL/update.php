<?php
require_once 'crud.php';

$idFun = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
$dadosAtualizados = [
    'Nome' => $_POST['titulo'],
    'cargo' => $_POST['isbn'],
    'Agenda' => $_POST['autor'],
    'contrato' => $_POST['preco'],
    'Foto' => ''
];

$linhasAfetadas = update($pdo, 'profissionais',$dadosAtualizados, 'id_Prof =' .$idFun);

if($linhasAfetadas > 0) {
    echo 'Musica Atualizada com sucesso!';
} else {
    echo 'Um Erro Ocorreu!';
}
}
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$Profissionais = readAll($pdo, 'Profissionais');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="./css/Style.css">
    <title>Document</title>
</head>
<body>
    <main class="align-text">
        <div class="manager_box">
            <?php
            foreach($Musicas as $Musica) {
                if ($Musica['id'] == $_GET['id']) {
                    
                    // 1. Display Product Details
                    echo ' <h1 class="Title-manager"> Nome: ' . $Musica['Titulo'] . ' <p class="Title-prod"> Autor: ' . $Musica['autor'] . ' </p> </h1> <br>
                    <div class="Title-prod"><b class="nope" > Album: </b>' . $Musica['Album'] . '<div class="legend2">  <b class="nope" > <audio controls>
        <source src="'. $Musica['Audio'] . '" type="audio/mpeg"></audio><br><a href="delete.php?id='.$_GET['id'].'" >Remover</a> </div></div> ';
                    break; // Stops the loop immediately after finding it
                }   
            }
            ?>
        </div>
    </main>
    <form action="" method="POST" class="div" >
        <div class="conteiner-login">
            <div class="conteiner-login">         
                <div class="div-login">
                    <div class="col-d">
                        <div class="Pai">
                    <h1 class="Modo" >Atualize os dados da musica na Playlist!</h1>
                    <div class="logs">
                        <div class="circulo">
                            <img src="img/cloudflare.png" id="a" draggable="false" >
                        </div>
                        <div class="circulo">
                            <img src="img/deezer.png" id="b" draggable="false" >
                            </div>
                        <div class="circulo">
                            <img src="img/spotify.png" id="c" draggable="false" >
                        </div>
                    </div>
                    <div class="card">
                        <input type="text" placeholder="Titulo" name="Titulo" required autocomplete="off">
                        <input type="number" placeholder="Duração(em Segundos)" name="Duracao" required  autocomplete="off">
                        <input type="text" placeholder="Autor" name="Autor" required autocomplete="off">
                        <input type="text" placeholder="Album" name="Album"  autocomplete="off">
                        <input type="text" placeholder="Genêro" name="Genero" >
                        <br>
                        <button id="btn" type="submit" >Send</button>
                        <p id="p">Preencha os campos do formulário</p>
                    </div>
                </div>
                    </div>
                </div>
            </div>
        </div>
</form>
<a href="index.php">Back</a>
</body>
</html>