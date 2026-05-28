<?php 
require_once 'crud.php';
$profissionais = readAll($pdo, 'profissionais');

foreach($profissionais as $profissional){
    echo 'ID'. $profissional['id_prof'].',Nome: '.$profissional['Nome'].'<br> <br> ';
}

echo '<br><br><br><br><br><br><br>';

$Funcionario = read($pdo, 'profissionais', "id_Prof = ".$_GET['id']);
if($Funcionario){
    echo 'Nome:'.$Funcionario['Nome'].'<br>';
    echo 'Disponibilidade: R$'. $Funcionario['Agenda'];
    echo "<br><img src='".$Funcionario['Foto']."' alt=capa/>";
} else {
    echo 'Profissional não encontrado!!';
}

