<?php
// Substitua pelos seus dados de conexão
$host = "localhost";
$port = "5432";
$dbname = "cadastro_db";
$user = "postgres";
$password = "suasenha";

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Erro na conexão com o banco de dados.");
}
?>