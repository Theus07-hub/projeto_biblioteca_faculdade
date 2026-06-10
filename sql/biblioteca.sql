CREATE DATABASE biblioteca_projeto;

USE biblioteca_projeto;

CREATE TABLE usuario (
	id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(245) NOT NULL,
    email VARCHAR(245) NOT NULL UNIQUE,
    senha VARCHAR(245) NOT NULL,
    role VARCHAR(245) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE livro (
	id INT NOT NULL AUTO_INCREMENT,
	titulo VARCHAR(245) NOT NULL,
    autor VARCHAR(245) NOT NULL,
    categoria VARCHAR(245) NOT NULL,
    ano INT NOT NULL,
    quantidade INT(2) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE autor (
	id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(245) NOT NULL,
    livro_id INT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(livro_id) REFERENCES livro(id)
);

CREATE TABLE emprestimos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    livro_id INT,
    data_emprestimo DATE,
    data_devolucao DATE

    FOREIGN KEY (usuario_id) REFERENCES usuario(id),
    FOREIGN KEY (livro_id) REFERENCES livro(id)
);

INSERT INTO usuario(id, nome, email, senha, role)
	VALUES
		(DEFAULT, 'Matheus Oliveira Campos', 'matheuscampos@gmail.com', 'MatheusNine13', 'Admin'),
        (DEFAULT, 'Bruno Melo de Morais', 'bruno@gmail.com', 'BrunoMelo123', 'User'),
        (DEFAULT, 'Ester Alvez de Souza', 'ester@gmail.com', 'Ester@1123', 'User'),
        (DEFAULT, 'Guilherme Santos Alvez', 'guilherme@gmail.com','guilher123','User');
        

INSERT INTO livro(id, titulo, autor, categoria, ano, quantidade)
	VALUES
		(DEFAULT, 'Codigo limpo', 'Robert C. Martin', 'Programação e Estudos', 2008, 2),
        (DEFAULT, 'Outros jeitos de usar a boca', 'Rupi Kaur','Poesia', 2014, 2),
        (DEFAULT, 'Mitologia Nordica', 'Neil Gaiman', 'Mitologia, Fantasia', 2017, 9),
        (DEFAULT, 'O que o sol faz com as flores', 'Rupi Kaur', 'Poesia', 2017, 5);

INSERT INTO autor(id, nome, livro_id)
	VALUES
		(DEFAULT, 'Robert C. Martin', 1),
        (DEFAULT, 'Rupi Kaur', 2),
		(DEFAULT, 'Neil Gaiman', 3),
        (DEFAULT, 'Rupi Kaur', 4);
        
SELECT * FROM usuario;
SELECT * FROM emprestimos