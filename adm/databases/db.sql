CREATE DATABASE 2ucase_bd3 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

use 2ucase_bd3;

CREATE TABLE adm_administrador(
	id_adm INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	nome_adm VARCHAR(300) NOT NULL COMMENT 'nome do administrador',
	email_adm VARCHAR(300) NOT NULL COMMENT 'email do administrador',
	senha_adm VARCHAR(64) NOT NULL COMMENT 'senha em sha256',
	poder_adm INT(1) NOT NULL COMMENT  'abrangencia do usuario no sistema',
	status INT(1) NOT NULL COMMENT '1 - ativo; 0 - inativo',
	data_reg_adm DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL  COMMENT 'data e hora do registro'
);

CREATE TABLE adm_menu(
	id_menu INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	nome_menu VARCHAR(300) NOT NULL,
	link_menu varchar(300) not null,
	status INT(1) NOT NULL COMMENT '1 - ativo; 0 - inativo',
	data_reg_menu DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL  COMMENT 'data e hora do registro'

);

CREATE TABLE adm_carrossel(
	id_carrossel INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	nome_carrossel VARCHAR(200) NOT NULL,
	link_carrossel VARCHAR(300) NOT NULL,
	status INT(1) NOT NULL COMMENT '1 - ativo; 0 - inativo',
	data_reg_adm DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL  COMMENT 'data e hora do registro' 
);

CREATE TABLE user_mod_celular(
	id_modelo_celular INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	marca_celular VARCHAR(300) NOT NULL,
	modelo_celular VARCHAR(64) NOT NULL
);

CREATE TABLE user_forma_pagamento(
	id_pagamento INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	descricao_pagamento VARCHAR(64) NOT NULL
);

CREATE TABLE user_cliente(
	id_cliente INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	nome_cliente VARCHAR(300) NOT NULL COMMENT 'nome do cliente',
	email_cliente VARCHAR(300) NOT NULL COMMENT 'email do cliente',
	cpf_cliente VARCHAR(18) NOT NULL COMMENT 'cpf do cliente',
	telefone_cliente VARCHAR(18) NOT NULL COMMENT 'telefone do cliente',
	genero_cliente int(1) NOT NULL COMMENT '1 - feminino; 0 - masculino; 2 - não informar',
	senha_cliente VARCHAR(256) NOT NULL COMMENT 'senha em sha256',
	data_nasc_cliente DATE NOT NULL COMMENT 'data de nascimente',
	data_reg_cliente DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT 'data e hora do registro',
	status INT(1) NOT NULL COMMENT '1 - ativo; 0 - inativo'
);

CREATE TABLE user_endereco_cliente(
	id_endereco INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	id_cliente INT NOT NULL,
	logradouro_cliente VARCHAR(900) NOT NULL ,
	bairro_cliente VARCHAR(100) NOT NULL ,
	cep_cliente VARCHAR(15) NOT NULL ,
	uf_cliente VARCHAR(2) NOT NULL ,
	numero_cliente int(5) NOT NULL ,
	complemento_cliente VARCHAR(150) ,
	ponto_ref_cliente VARCHAR(300),
	data_endereco_cliente DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL  COMMENT 'data e hora do registro',

	FOREIGN KEY ( id_cliente ) REFERENCES user_cliente( id_cliente )

);

CREATE TABLE adm_submenu(
	id_submenu INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	id_menu INT NOT NULL,
	nome_submenu VARCHAR(300) NOT NULL,
	link_submenu varchar(300) not null,
	status INT(1) NOT NULL COMMENT '1 - ativo; 0 - inativo',
	data_reg_submenu DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL  COMMENT 'data e hora do registro',

	FOREIGN KEY ( id_menu ) REFERENCES adm_menu( id_menu )
);

CREATE TABLE user_categoria(
	id_categoria INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	nome_categoria VARCHAR(200) NOT NULL,
	img_categoria VARCHAR(300) NOT NULL,
	data_reg_cupom DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL  COMMENT 'data e hora do registro'
);

CREATE TABLE user_produto(
	id_produto INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	id_modelo_celular INT NOT NULL,
	id_categoria INT NOT NULL,
	nome_produto VARCHAR(300) NOT NULL,
	preco_produto VARCHAR(64) NOT NULL,
	descricao_produto VARCHAR(900) NOT NULL,
	imagem_principal_produto VARCHAR(300) NOT NULL,
	quantidade_produto INT NOT NULL,
	categoria_special_produto VARCHAR(200) NOT NULL,
	garantias_produto VARCHAR(300) NOT NULL COMMENT 'beneficios - ex - garantia 3 dias',
	status INT(1) NOT NULL COMMENT '2 - oferta 1 - disponivel 0 - indisponivel',
	data_reg_produto DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL  COMMENT 'data e hora do registro',

	FOREIGN KEY ( id_modelo_celular ) REFERENCES user_mod_celular( id_modelo_celular ),
	FOREIGN KEY ( id_categoria ) REFERENCES user_categoria( id_categoria )
);

CREATE TABLE user_produtos_img(
	id_img INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	id_produto INT NOT NULL,
	nome_img VARCHAR(300) NOT NULL,
	link_img varchar(300) not null,
	status INT(1) NOT NULL COMMENT '1 - ativo; 0 - inativo',
	data_reg_img DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL  COMMENT 'data e hora do registro',

	FOREIGN KEY ( id_produto ) REFERENCES user_produto( id_produto )
);

CREATE TABLE user_cupom(
	id_cupom INT NOT NULL,
	id_categoria INT NOT NULL,
	nome_cupom INT NOT NULL,
	codigo_cupom INT NOT NULL,
	data_expira_cupom DATE NOT NULL,
	desconto_cupom VARCHAR(4) NOT NULL,
	data_reg_cupom DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT 'data e hora do registro',
	status INT(1) NOT NULL COMMENT '1 - ativo; 0 - inativo',

	FOREIGN KEY ( id_categoria ) REFERENCES user_categoria( id_categoria )
);

CREATE TABLE adm_venda(
	id_venda INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	id_produto INT NOT NULL,
	id_cliente int NOT NULL,
	id_pagamento INT NOT NULL,
	status_venda VARCHAR(200) NOT NULL,
	valor_desconto FLOAT NOT NULL,
	data_venda DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT 'data e hora do registro',
	valor_venda FLOAT NOT NULL,
	status INT(1) NOT NULL COMMENT '1 - ativo; 0 - inativo',

	FOREIGN KEY ( id_produto ) REFERENCES user_produto( id_produto ),
	FOREIGN KEY ( id_pagamento ) REFERENCES user_forma_pagamento( id_pagamento ),
	FOREIGN KEY ( id_cliente ) REFERENCES user_cliente( id_cliente )
);

CREATE TABLE user_avaliacao(
	id_avaliacao INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	id_produto INT NOT NULL,
	id_cliente INT NOT NULL,
	nota_avaliacao int(1) NOT NULL COMMENT 'avaliação de 1 - 5',
	titulo_avaliacao VARCHAR(300) NOT NULL,
	descricao VARCHAR(900) NOT NULL,
	data_avaliacao DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL  COMMENT 'data e hora do registro',
	status INT(1) NOT NULL COMMENT '1 - ativo; 0 - inativo'

	FOREIGN KEY ( id_produto ) REFERENCES user_produto( id_produto ),
	FOREIGN KEY ( id_cliente ) REFERENCES user_cliente( id_cliente )
);

-- INSERTS USUARIOS ADMINISTRATIVOS

		-- Administrador

INSERT INTO adm_administrador(nome_adm, email_adm, senha_adm, poder_adm, status) VALUES(
'Davi Moreira',
'davi@adm.com',
'5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5',
9,
1);

INSERT INTO adm_administrador(nome_adm, email_adm, senha_adm, poder_adm, status) VALUES(
'Filipe Moreira',
'davi@adm.com',
'5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5',
9,
1);

-- INSERTS CLIENTE

INSERT INTO user_cliente (nome_cliente, email_cliente, cpf_cliente, telefone_cliente, genero_cliente, senha_cliente, data_nasc_cliente, status)
VALUES ('Davi Moreira', 'davisant6@gmail.com', '49471488885', '11996120093', '0', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '2006-01-21', 1);

INSERT INTO user_cliente (nome_cliente, email_cliente, cpf_cliente, telefone_cliente, genero_cliente, senha_cliente, data_nasc_cliente, status)
VALUES ('Filipe Moreira', 'davisant6@gmail.com', '49471488885', '11996120093', '0', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '2006-01-21', 1);

INSERT INTO user_cliente (nome_cliente, email_cliente, cpf_cliente, telefone_cliente, genero_cliente, senha_cliente, data_nasc_cliente, status)
VALUES ('Sophia', 'carro@gmail.com', '49471488885', '11996120093', '0', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '2006-01-21', 1);

INSERT INTO user_cliente (nome_cliente, email_cliente, cpf_cliente, telefone_cliente, genero_cliente, senha_cliente, data_nasc_cliente, status)
VALUES ('Davi Moreira', 'davisant6@gmail.com', '49471488885', '118762123', '0', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '2006-01-21', 1);


INSERT INTO user_cliente (nome_cliente, email_cliente, cpf_cliente, telefone_cliente, genero_cliente, senha_cliente, data_nasc_cliente, status)
VALUES ('Filipe Moreira', 'davisant6@gmail.com', '49471488885', '118762123', '0', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '2006-01-21', 1);


INSERT INTO user_cliente (nome_cliente, email_cliente, cpf_cliente, telefone_cliente, genero_cliente, senha_cliente, data_nasc_cliente, status)
VALUES ('Carlos', 'davisant6@gmail.com', '55848621', '118762123', '0', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '2006-01-21', 0);

-- INSERTS ENDEREÇO CLIENTE

INSERT INTO user_endereco_cliente(logradouro_cliente, bairro_cliente, cep_cliente, uf_cliente ,numero_cliente, complemento_cliente, id_cliente) VALUES(
'Rua Ciclades',
'Jardim Guaruja',
'05876-040',
'SP',
'30',
'Casa 4',
1
);

-- INSERTS CATEGORIA

INSERT INTO user_categoria (nome_categoria, img_categoria) VALUES ('Times', '../assets/img/Banner1.png');
INSERT INTO user_categoria (id_categoria, nome_categoria, img_categoria) VALUES (1, 'Animacoes', '../assets/img/Banner2.png');


-- INSERTS CUPOM

INSERT INTO user_cupom (id_cupom, id_categoria, nome_cupom, codigo_cupom, data_expira_cupom, desconto_cupom, status) VALUES (3, 0, 'So para quem me quiser', 'CARENTE25', '2022-09-30', '25', 1);
INSERT INTO user_cupom (id_categoria, nome_cupom, codigo_cupom, data_expira_cupom, desconto_cupom, status) VALUES (1, 'So para quem não me quiser', 'CARENTENAO50', '2022-09-30', '50', 1);


-- INSERTS MENU E SUBMENU

INSERT INTO adm_menu(nome_menu, link_menu, status) VALUES ('Teste delete', './categoria.php', 1);
INSERT INTO adm_submenu(id_menu, nome_submenu, link_submenu, status) VALUES (1, 'Teste delete2', './categoria.php', 1);
INSERT INTO adm_submenu(id_menu, nome_submenu, link_submenu, status) VALUES (1, 'Teste delete3', './categoria.php', 1);
INSERT INTO adm_submenu(id_menu, nome_submenu, link_submenu, status) VALUES (1, 'Teste', './categoria.php', 1);

-- INSERT INTO CARROSSEL

INSERT INTO adm_carrossel (nome_carrossel, link_carrossel, status) VALUES ('Time Qualquer', '../assets/img/Banner1.png', 1);

INSERT INTO adm_carrossel (nome_carrossel, link_carrossel, status) VALUES ('Time Qualquer', '../assets/img/Banner2.png', 1);

INSERT INTO adm_carrossel (nome_carrossel, link_carrossel, status) VALUES ('Time Qualquer', '../assets/img/Banner3.png', 1);



--INSERT INTO MODELO CELULAR

INSERT INTO user_mod_celular (marca_celular, modelo_celular) VALUES ('Iphone', 'Iphone 13 Pro Max');


--INSERT INTO PRODUTO

INSERT INTO user_produto(id_modelo_celular, id_categoria, nome_produto, preco_produto, descricao_produto, imagem_principal_produto, quantidade_produto, garantias_produto, status)
VALUES (1, 0, 'Capinha Flamengo 2022 - Seleção Oficial', 25.94, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illum facere aperiam dolor minus laudantium autem soluta eum, officia sunt ducimus sed. Possimus necessitatibus ex molestiae.', '../assets/img/Banner1.png', 10, '2 Meses', 1);


-- INSERT INTO AVALIAÇÕES

INSERT INTO user_avaliacao(id_produto, id_cliente,nota_avaliacao, titulo_avaliacao, descricao, status) VALUES (67, 5, 4, 'ótimo produto melhor que já comprei', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere dicta obcaecati ea eos sunt vel sequi non, harum hic possimus doloremque, inventore eaque, culpa veniam facilis libero mollitia laudantium numquam!', 1);


-- ALTERAÇÕES

ALTER TABLE user_cupom
MODIFY COLUMN id_cupom INT AUTO_INCREMENT NOT NULL PRIMARY KEY;

ALTER TABLE user_cupom
MODIFY COLUMN nome_cupom VARCHAR(200) NOT NULL;

ALTER TABLE user_cupom
MODIFY COLUMN codigo_cupom VARCHAR(200) NOT NULL;

ALTER TABLE user_produto
ADD COLUMN categoria_special_produto VARCHAR(200) NOT NULL;

ALTER TABLE user_avaliacao
ADD COLUMN titulo_avaliacao VARCHAR(300) NOT NULL;

ALTER TABLE user_avaliacao
ADD COLUMN status INT(1) NOT NULL COMMENT '1 - ativo; 0 - inativo';


ALTER DATABASE 2ucase_bd2 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci; 