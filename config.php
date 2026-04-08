<?php
// Configurações de Conexão com o PostgreSQL
$host     = "localhost";
$port     = "5432";
$dbname   = "cadastro_func"; // Nome do banco que o erro estava pedindo
$user     = "postgres";
$password = ""; // Vazio porque ativamos o 'trust' no pg_hba.conf

// 1. Conexão usando PDO (Mais moderna)
try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
    $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    die("Erro na conexão PDO: " . $e->getMessage());
}

// 2. Conexão usando pg_connect (A que o seu cadastro.php usa)
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Erro na conexão pg_connect: " . pg_last_error());
}
?>