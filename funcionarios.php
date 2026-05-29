<?php
require_once 'Partials/access.php';
require_once 'MySQL/crud.php';
$profissionais = readAll($pdo, 'profissionais');
$categoria = ['Servente','Pedreiro','Mestre'];
$legal = 0
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo</title>
    <link rel="stylesheet" href="CSS/profissionais.css">
    <link rel="stylesheet" href="CSS/Global.css">
    <link rel="icon" type="image/x-icon" href="Img/logo_laranja.ico">

</head>
<body>
    <?php include_once "Partials/header.php";?>
     <div class="cor_fundo">
        <div class="titulo">
                <h1>Funcionários <span>disponíveis</span></h1>
                <p>Encontre profissionais qualidicados para sua obra</p>
            </div>

<?php foreach($profissionais as $funcionarios){ 
    if($funcionarios['cargo'] == $_GET['cargo'] && $funcionarios['contrato'] == $legal){
    echo '
        <div class="espaco">
            <div class="perfil_profissional">
                <div><img class="foto" src="'.$funcionarios['Foto'].'" alt=""></div>
                <div class="informarcao">
                    <h1><span>'.$funcionarios['Nome'].'</span></h1>
                    <div class="cargo">
                        <img class="cargo_img" src="./Img/cargo.png" alt="">
                        <p>'.$funcionarios['cargo'].'</p>
                    </div>
                    <div class="descricao">
                        <p>'.$funcionarios['descri'].'</p>
                    </div>
                </div>
                <div class="espaco_linha">
                    <div class="linha_separador"></div>
                </div>

                <div class="informarcao_contato">
                    <div class="infor">
                        <img class="icone" src="./Img/localização.png" alt="">
                        <p>'.$funcionarios['Local'].'</p>
                    </div>

                    <div class="infor">
                        <img class="icone" src="./Img/calendario.png" alt="">
                        <p>'.$funcionarios['Idade'].' Anos</p>
                    </div>

                    <div class="infor">
                        <img class="icone" src="./Img/telefone.png" alt="">
                        <p>'.$funcionarios['Tefone'].'</p>
                    </div>

                    <div class="infor">
                        <img class="icone" src="./Img/email.png" alt="">
                        <p>'.$funcionarios['Email'].'</p>


                    </div>
                </div>

                <div class="espaco_linha">
                    <div class="linha_separador"></div>
                </div>

                <div class="informarcao_salario">
                    <div class="infor_salario">
                        <h2>Salário pretendido</h2>
                        <h1><span>R$ '.$funcionarios['Salario'].'</span></h1>
                    </div>

                    <button onclick="window.location.href=\'detalhes.php?id_Prof='.$funcionarios['id_Prof'].'\'"class="btn-contratar">
                        <img src="./Img/select.png" alt="">
                        Contratar
                    </button>
                </div>
        </div>
    </div>
';}};?>

</div>
    <?php include_once "Partials/footer.php";?>
</body>
</html>