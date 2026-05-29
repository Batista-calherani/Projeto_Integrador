<?php
$test = mail('admin@localhost','Teste Muito Foda','Vamos Ver se funciona.');

if($test){
    echo 'vai lá ver se foi';
}