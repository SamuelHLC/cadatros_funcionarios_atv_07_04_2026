<?php
/**
 * Configuração da Conexão com PostgreSQL
 * Este arquivo deve ser incluído em todas as páginas que acessam o banco.
 */

$host     = "localhost";     // Geralmente localhost
$port     = "5432";          // Porta padrão do PostgreSQL
$dbname   = "cadastro_func";   // O nome do banco que você criou no pgAdmin
$user     = "postgres";      // Usuário padrão do sistema
$password = "1234"; // <--- COLOQUE A SENHA DO SEU PGADMIN AQUI

// String de conexão montada
$connection_string = "host=$host port=$port dbname=$dbname user=$user password=$password";

// Executa a tentativa de conexão
$conn = pg_connect($connection_string);

// Verifica se a conexão falhou
if (!$conn) {
    echo "<h3>Erro de Conexão detectado!</h3>";
    echo "Verifique se o serviço do PostgreSQL está rodando e se a senha no config.php está correta.<br>";
    echo "<strong>Detalhes do erro:</strong> " . pg_last_error();
    exit; // Interrompe a execução do script se não conectar
}

// Opcional: Define o charset para evitar problemas com acentuação (PT-BR)
pg_set_client_encoding($conn, "UNICODE");

?>