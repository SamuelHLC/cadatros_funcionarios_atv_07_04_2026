-- 1. Criar a tabela de usuários (Para o Sistema de Login)
CREATE TABLE usuarios (
    id SERIAL PRIMARY KEY,
    login VARCHAR(50) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL
);

-- 2. Criar a tabela de funcionários (Para o Cadastro e Listagem)
CREATE TABLE funcionarios (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cargo VARCHAR(100),
    email VARCHAR(100),
    telefone VARCHAR(20),
    situacao CHAR(1) DEFAULT 't' -- 't' para Ativo (true), 'f' para Inativo (false)
);

-- 3. Inserir um usuário inicial para você conseguir logar no sistema
-- IMPORTANTE: Use esses dados no formulário de login (Tela 1)
INSERT INTO usuarios (login, senha) 
VALUES ('admin', '123456');

-- 4. Inserir alguns dados de exemplo (opcional, para testar a listagem)
INSERT INTO funcionarios (nome, cargo, email, telefone, situacao) 
VALUES ('João Silva', 'Administrador', 'joao@empresa.com', '11999999999', 't');

INSERT INTO funcionarios (nome, cargo, email, telefone, situacao) 
VALUES ('Ana Mendes', 'Gerente', 'ana@empresa.com', '11888888888', 't');