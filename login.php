<?php
require_once 'MySQL/crud.php';
session_start();
    
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = trim($_POST['user'] ?? '');
    $pass = $_POST['password'] ?? '';
    if ($user === '' || $pass === '') {
        echo '<div style="color:red;">Preencha todos os campos.</div>';
    } else {
        $stmt = $conn->prepare("SELECT pass FROM access WHERE user = ?");
        $stmt->bind_param('s', $user);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 1) {
            $stmt->bind_result($hash);
            $stmt->fetch();

            if (password_verify($pass, $hash)) {
                $_SESSION['user'] = $user;
                header("Location: index.php");
                exit;
            } else {
                echo '<div style="color:red;">Usuário ou senha incorretos.</div>';
            }
        } else {
            echo '<div style="color:red;">Usuário ou senha incorretos.</div>';
        }

        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="icon" type="image/x-icon" href="Img/logo.bran.ico">
</head>
<body>
    <form method="post">
        <div class="card">
        <input type="text" name="user" placeholder="Usuário" required>
        <input type="password" name="password" placeholder="Senha" required>
        <button type="submit">Entrar</button>
        </div>
    </form>
</body>
</html>