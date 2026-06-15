<?php
require_once 'crud.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../Entrada_Proficional.php');
    exit;
}

function postValue($key) {
    return isset($_POST[$key]) ? trim($_POST[$key]) : '';
}

function salarioDecimal($valor) {
    $valor = str_replace(['R$', ' '], '', trim($valor));

    if (strpos($valor, ',') !== false) {
        $valor = str_replace('.', '', $valor);
        $valor = str_replace(',', '.', $valor);
    }

    return is_numeric($valor) ? $valor : '1518.05';
}

$camposObrigatorios = ['Nome', 'cargo', 'Local', 'cpf', 'Salario', 'tefone', 'email', 'tempo', 'descri', 'Idade'];
foreach ($camposObrigatorios as $campo) {
    if (postValue($campo) === '') {
        echo "Preencha todos os campos obrigatorios.";
        exit;
    }
}

$arquivoEnviado = isset($_FILES['arquivo']) && $_FILES['arquivo']['error'] !== UPLOAD_ERR_NO_FILE;
if ($arquivoEnviado) {
    if ($_FILES['arquivo']['error'] !== UPLOAD_ERR_OK) {
        echo "Erro ao enviar imagem.";
        exit;
    }

    $tipoPermitido = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg'];
    if (!in_array($_FILES['arquivo']['type'], $tipoPermitido)) {
        echo "Tipo de arquivo nao permitido.";
        exit;
    }

    $tamanhoMaximo = 5 * 1024 * 1024;
    if ($_FILES['arquivo']['size'] > $tamanhoMaximo) {
        echo "Arquivo muito grande.";
        exit;
    }
}

$novoFun = [
    'Nome' => postValue('Nome'),
    'cargo' => postValue('cargo'),
    'Local' => postValue('Local'),
    'cpf' => postValue('cpf'),
    'Agenda' => date('Y-m-d'),
    'Salario' => salarioDecimal(postValue('Salario')),
    'Tefone' => postValue('tefone'),
    'Email' => postValue('email'),
    'tempo' => postValue('tempo'),
    'descri' => postValue('descri'),
    'Idade' => (int) postValue('Idade'),
    'Foto' => ''
];

$idNovoFun = create($pdo, 'profissionais', $novoFun);

if (!$arquivoEnviado) {
    header('Location: ../index.php');
    exit;
}

$extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);
$novoNome = "capa_" . uniqid() . "." . $extensao;

$diretorioFisico = __DIR__ . '/../uploads/';
$caminhoFisico = $diretorioFisico . $idNovoFun . '/';
if (!is_dir($caminhoFisico)) {
    mkdir($caminhoFisico, 0755, true);
}

$arquivoFisico = $caminhoFisico . $novoNome;
if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $arquivoFisico)) {
    $capaUrl = 'uploads/' . $idNovoFun . '/' . $novoNome;
    update($pdo, 'profissionais', ['Foto' => $capaUrl], "id_Prof = $idNovoFun");
    header('Location: ../index.php');
    exit;
}

echo "Erro ao enviar imagem.";
