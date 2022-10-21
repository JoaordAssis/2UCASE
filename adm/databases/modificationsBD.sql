ALTER TABLE user_cliente
    ADD COLUMN telefoneFixo_cliente VARCHAR(16) NOT NULL;

ALTER TABLE `2ucase_bd3`.adm_carrossel
    ADD COLUMN `link_promo_carrossel` VARCHAR(300) NOT NULL;

ALTER TABLE `2ucase_bd3`.user_cliente
    ADD COLUMN `token_email` VARCHAR(60) NOT NULL;

ALTER TABLE `2ucase_bd3`.user_produto
    ADD COLUMN `cod_produto` INT(4) ZEROFILL NOT NULL;

ALTER TABLE `2ucase_bd3`.user_produto
    ADD COLUMN `peso_produto` INT NOT NULL COMMENT 'Peso em Gramas';

ALTER TABLE `2ucase_bd3`.adm_venda
    ADD COLUMN `numero_venda` INT NOT NULL;

-- Criando novo Usuario

INSERT INTO user_cliente (nome_cliente, email_cliente, cpf_cliente, telefone_cliente, telefoneFixo_cliente, genero_cliente, senha_cliente, data_nasc_cliente, status)
VALUES ('Filipe Moreira', 'davisant6@gmail.com', '49471488885', '11996120093','1158313380', '0', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '2006-01-21', 1);


-- Testando a função LAST_INSERT_ID()

select LAST_INSERT_iD();

-- ALTERANDO COLUNAS user_endereco_cliente

ALTER TABLE user_endereco_cliente
    ADD COLUMN nomeR_cliente VARCHAR(250) NOT NULL;

ALTER TABLE user_endereco_cliente
    ADD COLUMN cidade_cliente VARCHAR(250) NOT NULL;


INSERT INTO user_produto(id_modelo_celular, id_categoria, nome_produto, preco_produto,
                         descricao_produto, imagem_principal_produto,
                         quantidade_produto, garantias_produto, status, categoria_special_produto, peso_produto, cod_produto)
VALUES (1, 1, 'Capinha Flamengo 2022 - Selecao Oficial', 385.54,
        'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illum facere aperiam dolor minus laudantium autem soluta eum, officia sunt ducimus sed. Possimus necessitatibus ex molestiae.'
           , '../assets/img/Banner2.png', 68, '3 Meses', 1, 'Novidades', 20, 420);

SET FOREIGN_KEY_CHECKS=0;

alter table `2ucase_bd3`.user_carrinho drop foreign key user_carrinho.fk_user_carrinho_user_endereco_cliente1;

ALTER TABLE `2ucase_bd3`.adm_venda
    ADD COLUMN `frete_carrinho` DECIMAL NOT NULL;

ALTER TABLE `2ucase_bd3`.adm_venda
    ADD COLUMN  `id_endereco` INT NOT NULL;

ALTER TABLE `2ucase_bd3`.adm_venda ADD CONSTRAINT id_fk_endereco
    FOREIGN KEY(id_endereco) REFERENCES user_endereco_cliente (id_endereco);

truncate `2ucase_bd3`.adm_venda;
truncate `2ucase_bd3`.user_carrinho;
truncate `2ucase_bd3`.produto_carrinho;