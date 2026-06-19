<?php
require_once 'crud.php';
$idFun = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($idFun <= 0) {
    echo 'ID inválido.';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
    $dadosAtualizados = [
        'Nome' => $_POST['Nome'],
        'cargo' => $_POST['cargo'],
        'Local' => $_POST['Endereco'],
        'contrato' => $_POST['contrato'],
        'Obra_Local' => $_POST['Local_Obra'],
        'Salario' => $_POST['Salario'],
        'Tefone' => $_POST['tefone'],
        'Email' => $_POST['email'],
        'tempo' => $_POST['tempo'],
        'descri' => $_POST['descri'],
        'Idade' => $_POST['Idade'],
        'Status' => $_POST['status']
    ];

    // Atualiza os dados (sem Foto) primeiro
    $linhasAfetadas = update($pdo, 'profissionais', $dadosAtualizados, "id_Prof='" . $idFun . "'");

    // Processar upload somente se um arquivo foi enviado sem erros
    if (isset($_FILES['arquivo']) && $_FILES['arquivo']['error'] === UPLOAD_ERR_OK) {
        $tipo_permitido = ['image/jpeg','image/png','image/gif','image/jpg'];
        if(!in_array($_FILES['arquivo']['type'], $tipo_permitido)) {
            echo "Tipo de arquivo não permitido.";
            exit;
        }

        $tamanho_max = 5 * 1024 * 1024; // 5MB
        if($_FILES['arquivo']['size'] > $tamanho_max) {
            echo "Arquivo muito grande.";
            exit;
        }

        $extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);
        $novonome = "capa_" . uniqid() . "." . $extensao;

        // Caminho físico onde o arquivo será salvo (a partir deste arquivo em MySQL/)
        $dirFisico = __DIR__ . '/../uploads/';
        $caminhoFisico = $dirFisico . $idFun . '/';
        if(!is_dir($caminhoFisico)) {
            mkdir($caminhoFisico, 0755, true);
        }

        $filePath = $caminhoFisico . $novonome;
        if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $filePath)){
            // Caminho relativo usado nas páginas web
            $capaUrl = 'uploads/' . $idFun . '/' . $novonome;
            update($pdo, 'profissionais', ['Foto' => $capaUrl], "id_Prof = " . $idFun);
            echo "Imagem enviada com sucesso.";
        } else {
            echo "Erro ao enviar imagem.";
        }
    }

    if($linhasAfetadas >= 0) {
    header("Location: ../total.php");
    exit();
    }
}
?>
