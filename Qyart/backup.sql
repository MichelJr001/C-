/* ARQUIVO DE CRIANÇÃO DO BANCO DE DADOS E SUAS TABELAS */

CREATE DATABASE qyart(
	CREATE TABLE usuarios(
		id_usuario 	INTEGER PRIMARY KEY AUTO_INCREMENT,
		nome VARCHAR(100),
		email VARCHAR(100) UNIQUE,
		senha VARCHAR(100),
		data_nascimento DATE,
		sexo VARCHAR(1),
		data_cadastro DATETIME,
		ip TEXT,
		stats BIT(1) DEFAULT 0
	);

	CREATE TABLE posts(
		id_post INTEGER PRIMARY KEY AUTO_INCREMENT,
		id_user INTEGER,
		post TEXT,
		data DATETIME,
		stats BIT(1) DEFAULT 0
	);
);

