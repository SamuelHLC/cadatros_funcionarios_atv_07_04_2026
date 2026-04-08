<?php
session_start();
include('config.php');
if (!isset($_SESSION['usuario'])) header("Location: index.php");

$busca = isset($_GET['busca']) ? pg_escape_string($_GET['busca']) : '';
$sql = "SELECT * FROM funcionarios WHERE nome ILIKE '%$busca%' ORDER BY id ASC";
$res = pg_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <style>
        body { font-family: Arial; background: #f8f9fa; margin: 0; }
        header { background: #3b71ca; color: white; padding: 15px; display: flex; justify-content: space-between; }
        .container { padding: 20px; }
        table { width: 100%; background: white; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; border: 1px solid #dee2e6; text-align: left; }
        th { background: #f2f2f2; }
        .btn-novo { background: #28a745; color: white; padding: 10px; text-decoration: none; border-radius: 4px; }
    </style>
</head>
<body>
    <header>
        <span>Cadastro de Funcionários</span>
        <span>Olá, <?php echo $_SESSION['usuario']; ?> | <a href="logout.php" style="color:white">Sair</a></span>
    </header>
    <div class="container">
        <form method="GET">
            <input type="text" name="busca" value="<?php echo $busca; ?>" placeholder="Buscar funcionário...">
            <button type="submit">Pesquisar</button>
            <a href="cadastro.php" class="btn-novo">Novo Funcionário</a>
        </form>

        <table>
            <tr>
                <th>ID</th><th>Nome</th><th>Cargo</th><th>E-mail</th><th>Situação</th><th>Ações</th>
            </tr>
            <?php while($row = pg_fetch_assoc($res)): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nome']; ?></td>
                <td><?php echo $row['cargo']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['situacao'] == 't' ? 'Ativo' : 'Inativo'; ?></td>
                <td>
                    <a href="editar.php?id=<?php echo $row['id']; ?>">✏️</a>
                    <a href="excluir.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Excluir?')">🗑️</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>