CREATE DATABASE JOGO;

CREATE TABLE IF NOT EXISTS JOGO.USUARIOS (
    ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    NOME VARCHAR(255) NOT NULL, 
    EMAIL VARCHAR(255) NOT NULL UNIQUE, 
    SENHA VARCHAR(255) NOT NULL, 
    ADM INT NOT NULL DEFAULT 0, 
    SCORE INT NOT NULL DEFAULT 0
);

CREATE TABLE IF NOT EXISTS JOGO.QUESTOES (
    ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    PERGUNTA VARCHAR(255) NOT NULL UNIQUE, 
    OPCOES VARCHAR(255) NOT NULL, 
    CERTA VARCHAR(255) NOT NULL, 
    NIVEL INT NOT NULL DEFAULT 1, 
    CATEGORIA VARCHAR(255) NOT NULL
);

INSERT INTO JOGO.USUARIOS VALUES (
    DEFAULT,
    "ADMIN",
    "admin@gmail.com",
    "$2y$10$KeOP8Tzyr61wyDxDN4ABTucOe4TyQtYpHx.RuENgiksXs/R2EuWMy",
    1,
    DEFAULT
);