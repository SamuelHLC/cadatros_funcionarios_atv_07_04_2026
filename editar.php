<?php
include 'config.php';

$id = $_GET['id'];
$result = pg_query($conn, "SELECT * FROM funcionarios WHERE id = $id");
$func = pg_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $cargo = $_POST['cargo'];
    $sql = "UPDATE funcionarios SET nome='$nome', cargo='$cargo' WHERE id=$id";
    if (pg_query($conn, $sql)) {
        header("Location: listagem.php");
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Funcionário</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Editar Funcionário</h2>
    <form method="POST">
        <input type="text" name="nome" class="form-control mb-2" value="<?php echo $func['nome']; ?>">
        <input type="text" name="cargo" class="form-control mb-2" value="<?php echo $func['cargo']; ?>">
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        <a href="listagem.php" class="btn btn-secondary">Cancelar</a>
    </form>
</body>
</html>