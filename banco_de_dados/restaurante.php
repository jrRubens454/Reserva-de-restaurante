<<?php 
CREATE TABLE cadastro_usuario (
    id_usuario INT PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(100),
    telefone VARCHAR(20),
    senha VARCHAR(20)
);
CREATE TABLE login_usuario (
    id_login INT PRIMARY KEY,
    id_usuario INT,
    email VARCHAR(100),
    senha VARCHAR(20),
    FOREIGN KEY (id_usuario) REFERENCES cadastro_usuario(id_usuario)
);
CREATE TABLE restaurante (
    id_restaurante INT PRIMARY KEY,
    cardapio TEXT,
    endereco VARCHAR(200),
    mesa INT,
    data_hora DATETIME
);
CREATE TABLE restaurante (
    id_restaurante INT PRIMARY KEY,
    cardapio TEXT,
    endereco VARCHAR(200),
    mesa INT,
    data_hora DATETIME
);
CREATE TABLE reserva (
    id_reserva INT PRIMARY KEY,
    id_restaurante INT,
    id_usuario INT,
    mesa INT,
    data_hora DATETIME,
    numero_pessoas INT,
    FOREIGN KEY (id_restaurante) REFERENCES restaurante(id_restaurante),
    FOREIGN KEY (id_usuario) REFERENCES cadastro_usuario(id_usuario)
);


?>