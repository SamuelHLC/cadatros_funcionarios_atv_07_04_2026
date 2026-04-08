<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $cargo = $_POST['cargo'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    // Inserção no PostgreSQL usando o $conn (pg_connect) que está no seu config
    $sql = "INSERT INTO funcionarios (nome, cargo, email, telefone, situacao) 
            VALUES ('$nome', '$cargo', '$email', '$telefone', 't')";
    
    $result = pg_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Funcionário cadastrado!'); window.location.href='listagem.php';</script>";
    } else {
        echo "Erro ao cadastrar: " . pg_last_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Funcionário</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .container { max-width: 500px; margin-top: 50px; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Cadastrar Funcionário</h2>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Nome Completo</label>
                <input type="text" name="nome" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Cargo</label>
                <input type="text" name="cargo" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">E-mail</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Telefone</label>
                <input type="text" name="telefone" class="form-control">
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Finalizar Cadastro</button>
                <a href="listagem.php" class="btn btn-outline-secondary">Ver Lista</a>
            </div>
        </form>
    </div>
</body>
</html>