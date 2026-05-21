<?php
require_once 'Partials/access.php';
require_once 'MySQL/crud.php';

$user = $_SESSION['user'] ?? '';
$where = "user = '" . addslashes($user) . "'";
$information = readAll($pdo, 'access',$where);
$id = readOne($pdo, 'access','id_user',$where);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="CSS/Header.css">
    <link rel="stylesheet" href="CSS/Perfil.css">
    <link rel="icon" type="image/x-icon" href="Img/logo_laranja.ico">
</head>
<body>
    <?php include_once 'partials/header.php';?>
    <div class="cor_fundo">
        <div class="espaco">
            <?php foreach($information as $info){
            if($info['Foto_perfil']){
            echo'
            <img class="imagem" src="'.$info['Foto_perfil'].'" alt="">';}
            else {
            echo'
            <img class="imagem" src="Img/perfil.png" alt="">';
            }
            };
            ?>
            <button class="Perfil-control" onclick="window.location.href='Form.php?id_user=<?php echo $id?>'" >Editar</button>
            <div class="inform" id="AboutUs" >
                <h1>Inform Login</h1>
                <?php foreach($information as $info){
                    echo "<h3>User: ". $info['user'] ."<br>
                    Email: ".$info['email']."
                    </h3>";
                };  ?>
                
            </div>
            <div class="inform" id="AboutUs">
                <h1>Inform Pessoal</h1>
                <h3>Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem
                    Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
                    Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem
                    Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
                    Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum </h3>
            </div>
            <div class="inform" id="AboutUs">
                <h1>Inform Trabalho</h1>
                <h3>Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem
                    Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
                    Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem
                    Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
                    Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem </h3>
            </div> 
            
        </div> 
    
    </div>
 
    <?php include_once 'partials/footer.php'; ?>
</body>
</html>