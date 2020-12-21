CREATE DATABASE teste_rte;

use teste_rte;

CREATE TABLE pessoas(
		id INT(4) auto_increment PRIMARY KEY,
        nome VARCHAR(100) NOT NULL
        );

CREATE TABLE filhos(
		id int(4) auto_increment PRIMARY KEY,
        pessoa_id int(4),
        nome VARCHAR(100) NOT NULL,
        KEY filhos_pessoa_id (`pessoa_id`),
		CONSTRAINT `filhos_pessoa_id` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoas` (`id`)
        );