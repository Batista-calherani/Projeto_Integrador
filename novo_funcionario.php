<?php
require_once 'MySQL/crud.php';

session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

if ($_SESSION['user'] != 'Administrador') {
    echo "<script> if(confirm('Somente pessoal autorizado, deseja retornar?')){
        window.location.href = 'index.php';} else {
        window.location.href = 'login.php';};</script>";
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $camposObrigatorios = ['Nome', 'email', 'tefone', 'Idade', 'cpf', 'cargo', 'Salario', 'tempo', 'Local', 'descri'];
    foreach ($camposObrigatorios as $campo) {
        if (postValue($campo) === '') {
            die('Preencha todos os campos obrigatorios.');
        }
    }

    $arquivoEnviado = isset($_FILES['arquivo']) && $_FILES['arquivo']['error'] !== UPLOAD_ERR_NO_FILE;
    if ($arquivoEnviado) {
        if ($_FILES['arquivo']['error'] !== UPLOAD_ERR_OK) {
            die('Erro ao enviar imagem.');
        }

        $tipoPermitido = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg'];
        if (!in_array($_FILES['arquivo']['type'], $tipoPermitido)) {
            die('Tipo de arquivo nao permitido.');
        }

        $tamanhoMaximo = 5 * 1024 * 1024;
        if ($_FILES['arquivo']['size'] > $tamanhoMaximo) {
            die('Arquivo muito grande.');
        }
    }

    $novoFuncionario = [
        'Nome' => postValue('Nome'),
        'cargo' => postValue('cargo'),
        'Local' => postValue('Local'),
        'cpf' => postValue('cpf'),
        'Agenda' => date('Y-m-d'),
        'Idade' => (int) postValue('Idade'),
        'contrato' => 1,
        'Ativo' => 1,
        'Status' => 'Disponivel',
        'Salario' => salarioDecimal(postValue('Salario')),
        'Tefone' => postValue('tefone'),
        'Email' => postValue('email'),
        'tempo' => postValue('tempo'),
        'descri' => postValue('descri'),
        'Foto' => ''
    ];

    $idNovoFuncionario = create($pdo, 'profissionais', $novoFuncionario);

    if ($arquivoEnviado) {
        $extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);
        $novoNome = 'capa_' . uniqid() . '.' . $extensao;
        $caminhoFisico = __DIR__ . '/uploads/' . $idNovoFuncionario . '/';

        if (!is_dir($caminhoFisico)) {
            mkdir($caminhoFisico, 0755, true);
        }

        $arquivoFisico = $caminhoFisico . $novoNome;
        if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $arquivoFisico)) {
            $capaUrl = 'uploads/' . $idNovoFuncionario . '/' . $novoNome;
            update($pdo, 'profissionais', ['Foto' => $capaUrl], 'id_Prof = ' . $idNovoFuncionario);
        }
    }

    header('Location: total.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Funcionario</title>
    <link rel="stylesheet" href="./CSS/nova_contratacao.css">
    <link rel="icon" type="image/x-icon" href="Img/logo_laranja.ico">
</head>

<body>
    <div class="espaco_dashboard">
        <aside>
            <div class="dentro">
                <div class="logo_nome">
                    <img class="logo" src="./Img/logo_laranja.png" alt="ConGroup">
                    <h1>Con<span>Group</span></h1>
                </div>

                <div class="linha"></div>

                <ul class="forma">
                    <li><a href="coiso.php" class="botao">
                            <img class="icone_" src="./Img/home.png" alt="">
                            <h3>Dashboard</h3>
                        </a>
                    </li>

                    <li><a href="total.php" class="botao">
                            <img class="icone_" src="./Img/PESSOAS.png" alt="">
                            <h3>Funcionarios</h3>
                        </a>
                    </li>

                    <li><a href="contrato_funcionario.php" class="botao">
                            <img class="icone_" src="./Img/contrato.png" alt="">
                            <h3>Gestao de contratacao</h3>
                        </a>
                    </li>
                </ul>

                <div class="sair">
                    <div class="user">
                        <a href="login.php">
                            <h1>sair</h1>
                        </a>
                    </div>
                </div>
            </div>
        </aside>

        <div class="espaco">
            <div class="cabecalho">
                <div class="linha_"></div>
                <div class="pagina">
                    <div class="page_select">
                        <h3><span>Dashboard</span></h3>
                    </div>

                    <h3>Visao geral do sistema</h3>
                    <div></div>
                </div>

                <div class="perfil">
                    <img class="foto_perfil" src="./Img/perfil.png" alt="Foto do usuario">

                    <div class="dados_usuario">
                        <h3><?php echo $_SESSION['user']; ?></h3>
                        <p>Administrador(a)</p>
                    </div>
                </div>
            </div>

            <main class="main">
                <div class="content">
                    <div class="page-title">
                        <h2>Novo <span>Funcionario</span></h2>
                        <p>Cadastre um novo colaborador ativo no sistema</p>
                    </div>

                    <div class="card">
                        <form id="form-novo-funcionario" class="form-layout" action="novo_funcionario.php" method="POST" enctype="multipart/form-data">
                            <div class="form-fields">
                                <div class="form-row row-2">
                                    <div class="field">
                                        <label for="nome">Nome Completo</label>
                                        <input type="text" id="nome" name="Nome" placeholder="Ex.: Jorge Silva" required>
                                    </div>
                                    <div class="field">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" placeholder="Ex.: jorge.silva@email.com" required>
                                    </div>
                                </div>

                                <div class="form-row row-3">
                                    <div class="field">
                                        <label for="telefone">Telefone</label>
                                        <input type="tel" id="telefone" name="tefone" placeholder="Ex.: (27) 99999-9999" required>
                                    </div>
                                    <div class="field">
                                        <label for="idade">Idade</label>
                                        <input type="number" id="idade" name="Idade" placeholder="Ex.: 32" min="16" max="99" required>
                                    </div>
                                    <div class="field">
                                        <label for="cpf">CPF</label>
                                        <input type="text" id="cpf" name="cpf" placeholder="Ex.: 123.456.789-00" maxlength="14" required>
                                    </div>
                                </div>

                                <div class="form-row row-3">
                                    <div class="field">
                                        <label for="cargo">Cargo</label>
                                        <select id="cargo" name="cargo" required>
                                            <option value="" disabled selected>Selecione o cargo</option>
                                            <option value="Servente">Servente</option>
                                            <option value="Pedreiro">Pedreiro</option>
                                            <option value="Mestre">Mestre de Obra</option>
                                        </select>
                                    </div>
                                    <div class="field">
                                        <label for="salario">Salario</label>
                                        <input type="text" id="salario" name="Salario" placeholder="Ex.: R$ 3.500,00" required>
                                    </div>
                                    <div class="field">
                                        <label for="experiencia">Tempo de Experiencia</label>
                                        <input type="text" id="experiencia" name="tempo" placeholder="Ex.: 5 anos" required>
                                    </div>
                                </div>

                                <div class="form-row row-1">
                                    <div class="field">
                                        <label for="endereco">Endereco</label>
                                        <input type="text" id="endereco" name="Local" placeholder="Ex.: Rua das Flores, 123 - Centro, Vitoria - ES" required>
                                    </div>
                                </div>

                                <div class="form-row row-1">
                                    <div class="field">
                                        <label for="sobre">Sobre Mim</label>
                                        <textarea id="sobre" name="descri" placeholder="Fale um pouco sobre o profissional..." required></textarea>
                                    </div>
                                </div>

                                <div class="form-footer">
                                    <button class="btn-submit" type="submit">
                                        <svg viewBox="0 0 24 24" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                            <line x1="12" y1="5" x2="12" y2="19"/>
                                            <line x1="5" y1="12" x2="19" y2="12"/>
                                        </svg>
                                        Adicionar Funcionario
                                    </button>
                                </div>
                            </div>

                            <div class="photo-section">
                                <span class="photo-label">Foto de Perfil</span>
                                <div class="photo-preview">
                                    <svg viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="40" cy="40" r="40" fill="#e2e6ea"/>
                                        <circle cx="40" cy="30" r="14" fill="#b0bac5"/>
                                        <ellipse cx="40" cy="68" rx="22" ry="14" fill="#b0bac5"/>
                                    </svg>
                                </div>
                                <label class="btn-foto">
                                    <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none" stroke="currentColor">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                        <polyline points="17 8 12 3 7 8"/>
                                        <line x1="12" y1="3" x2="12" y2="15"/>
                                    </svg>
                                    Escolher Foto
                                    <input type="file" name="arquivo" accept="image/*">
                                </label>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
