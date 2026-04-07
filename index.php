<?php
session_start();
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = pg_escape_string($_POST['usuario']);
    $senha = $_POST['senha']; // Em sistemas reais, use password_verify

    $result = pg_query($conn, "SELECT * FROM usuarios WHERE login = '$usuario' AND senha = '$senha'");
    
    if (pg_num_rows($result) > 0) {
        $_SESSION['usuario'] = $usuario;
        header("Location: listagem.php");
    } else {
        $erro = "Usuário ou senha inválidos!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <style>
        body { background: #f0f2f5; font-family: Arial; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .login-card { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); width: 350px; text-align: center; }
        input { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background: #3b71ca; color: white; border: none; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
    <div class="login-card">
        <h2>Cadastro de Funcionários</h2>
        <form method="POST">
            <input type="text" name="usuario" placeholder="Usuário" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit">Entrar</button>
            <?php if(isset($erro)) echo "<p style='color:red'>$erro</p>"; ?>
        </form>
    </div>
</body>
</html>