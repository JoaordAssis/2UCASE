CREATE DATABASE 2ucase_bd;

use 2ucase_bd;

CREATE TABLE adm_administrador(
	id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	nome VARCHAR(300) NOT NULL COMMENT 'nome do administrador',
	email VARCHAR(300) NOT NULL COMMENT 'email do administrador',
	senha VARCHAR(64) NOT NULL COMMENT 'senha em sha256',
	datahora DATETIME NOT NULL COMMENT 'data e  hora doregistro',
	poder INT(1) NOT NULL COMMENT  'abrangencia do usuario no sistema',
	status INT(1) NOT NULL COMMENT '1 - ativo; 0 - inativo'
);

CREATE TABLE adm_menu(
	id_menu INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	nome_menu VARCHAR(300) NOT NULL,
	link_menu varchar(300) not null,
	status INT(1) NOT NULL COMMENT '1 - ativo; 0 - inativo'
);

CREATE TABLE mod_celular(
	id_modelo INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	marca VARCHAR(300) NOT NULL,
	modelo VARCHAR(64) NOT NULL
);

CREATE TABLE forma_pagamento(
	id_formaPag INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	descricao VARCHAR(64) NOT NULL
);

CREATE TABLE endereco_cliente(
	id_endereco INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	logradouro VARCHAR(900) NOT NULL ,
	bairro VARCHAR(100) NOT NULL ,
	cep VARCHAR(15) NOT NULL ,
	uf VARCHAR(2) NOT NULL ,
	numero int(5) NOT NULL ,
	complemento VARCHAR(150) ,
	ponto_ref VARCHAR(300)
);
CREATE TABLE adm_submenu(
	id_submenu INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	id_menu INT NOT NULL,
	nome_sub VARCHAR(300) NOT NULL,
	link_submenu varchar(300) not null,
	status INT(1) NOT NULL COMMENT '1 - ativo; 0 - inativo',
	FOREIGN KEY ( id_menu ) REFERENCES adm_menu( id_menu )
);
CREATE TABLE produtos(
	id_prod INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	id_modelo INT,
	nome_prod VARCHAR(300) NOT NULL,
	preco VARCHAR(64) NOT NULL,
	descricao VARCHAR(900) NOT NULL,
	imagem VARCHAR(300) NOT NULL,
	quantidade INT NOT NULL,
	garantias VARCHAR(300) NOT NULL COMMENT 'beneficios - ex - garantia 3 dias',
	status INT(1) NOT NULL COMMENT '2 - oferta 1 - disponivel 0 - indisponivel',
	FOREIGN KEY ( id_modelo ) REFERENCES mod_celular( id_modelo )
);

CREATE TABLE imgProdutos(
	id_img INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	id_prod INT NOT NULL,
	nome_img VARCHAR(300) NOT NULL,
	link_img varchar(300) not null,
	status INT(1) NOT NULL COMMENT '1 - ativo; 0 - inativo',
	FOREIGN KEY ( id_prod ) REFERENCES produtos( id_prod )
);



CREATE TABLE cliente(
	id_cliente INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    id_endereco INT NOT NULL,
	nome_completo VARCHAR(300) NOT NULL COMMENT 'nome do cliente',
	email VARCHAR(300) NOT NULL COMMENT 'email do cliente',
	cpf VARCHAR(18) NOT NULL COMMENT 'cpf do cliente',
	telefone VARCHAR(18) NOT NULL COMMENT 'telefone do cliente',
	genero int(1) NOT NULL COMMENT '1 - feminino; 0 - masculino; 2 - não inofmrar',
	senha VARCHAR(64) NOT NULL COMMENT 'senha em sha256',
	datanasc DATE NOT NULL COMMENT 'data de nascimente',
	datareg DATETIME NOT NULL COMMENT 'data e hora do registro',
	status INT(1) NOT NULL COMMENT '1 - ativo; 0 - inativo',
    FOREIGN KEY ( id_endereco ) REFERENCES endereco_cliente( id_endereco )
);


CREATE TABLE vendas(
	id_vendas INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	id_prod INT NOT NULL,
	id_cliente int NOT NULL,
	forma_pag VARCHAR(64) NOT NULL ,
	data_compra DATETIME NOT NULL,
	valor FLOAT NOT NULL,
	poder INT(1) NOT NULL,
	status INT(1) NOT NULL COMMENT '1 - ativo; 0 - inativo',
	FOREIGN KEY ( id_prod ) REFERENCES produtos( id_prod ),
	FOREIGN KEY ( id_cliente ) REFERENCES cliente( id_cliente )
);





CREATE TABLE avaliacao_prod(
	id_av INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	id_prod INT NOT NULL,
	id_cliente INT NOT NULL,
	nota int(1) NOT NULL COMMENT 'avaliação de 1 - 5',
	descricao VARCHAR(900) NOT NULL,
	FOREIGN KEY ( id_prod ) REFERENCES produtos( id_prod ),
	FOREIGN KEY ( id_cliente ) REFERENCES cliente( id_cliente )
);

INSERT INTO adm_administrador(nome,email,senha,datahora,poder,status) VALUES(
'Sophia Santos',
'sophia.santos@adm.com',
'5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5',
now(),
9,
1);

INSERT INTO adm_administrador(nome,email,senha,datahora,poder,status) VALUES(
'Davi Moreira',
'davi.moreira@adm.com',
'5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5',
now(),
9,
1);

INSERT INTO adm_administrador(nome,email,senha,datahora,poder,status) VALUES(
'Davi Moreira',
'davi.moreira@repositor.com',
'5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5',
now(),
8,
1);

INSERT INTO endereco_cliente(logradouro,bairro,cep,uf,numero) VALUES(
'Av. Jurubatuba',
'Vila Cordeiro',
'04583-100',
'SP',
'350'
);

