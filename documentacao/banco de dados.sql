CREATE DATABASE	 cabeleleiraLeila;

USE cabeleleiraLeila; 

CREATE TABLE pessoa (
	id INT PRIMARY KEY AUTO_INCREMENT,
    tipoPessoa VARCHAR(20),
    nome VARCHAR(100) NOT NULL, 
    login VARCHAR(100) NOT NULL, 
    senha VARCHAR(100) NOT NULL, 
    wpp BOOL,
    celular VARCHAR(9) NOT NULL
);

CREATE TABLE servico(
	id INT PRIMARY KEY AUTO_INCREMENT,
    nomeServico VARCHAR(20) NOT NULL, 
    descricao VARCHAR(100) NOT NULL, 
    preco DECIMAL(10, 2) NOT NULL,
    duracao INT,
    imagem VARCHAR(100)
);

CREATE TABLE agendamento(
	id INT PRIMARY KEY AUTO_INCREMENT,
    idCliente INT NOT NULL, 
    idServico INT NOT NULL, 
    totalServico DECIMAL (10,2) NOT NULL,
    FOREIGN KEY (idCliente) REFERENCES pessoa(id), 
    FOREIGN KEY (idServico) REFERENCES servico(id)
);

ALTER TABLE agendamento ADD COLUMN  situacao VARCHAR(10);

SELECT * FROM AGENDAMENTO; 

INSERT INTO servico (nome, descricao, preco, duracao, imagem) 
VALUES ('Maquiagem', 'Maquiagem com os melhores produtos do mercado para poder aproveitar o seu momento', 75, 60, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQFVJUDZBzce8OF2LHujK8UtkfY1m32xm-oxA&s');