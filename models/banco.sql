CREATE DATABASE sistema_livros;

\c sistema_livros;

CREATE TABLE livros (
	id SERIAL PRIMARY KEY,
	titulo VARCHAR(150) NOT NULL,
	autor VARCHAR(100) NOT NULL,
	isbn VARCHAR(20) NOT NULL
);