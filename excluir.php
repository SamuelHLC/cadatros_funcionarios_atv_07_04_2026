<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM funcionarios WHERE id = $id";
    $result = pg_query($conn, $sql);

    if ($result) {
        header("Location: listagem.php");
    } else {
        echo "Erro ao excluir: " . pg_last_error($conn);
    }
}
?>