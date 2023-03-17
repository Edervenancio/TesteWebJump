DROP DATABASE IF EXISTS webjump;
CREATE DATABASE IF NOT EXISTS webjump;
USE webjump; 



CREATE TABLE categoria (
codigo INT NOT NULL AUTO_INCREMENT,
nome  VARCHAR(255),
PRIMARY KEY (codigo)
);

CREATE TABLE product (
id 		  INT NOT NULL AUTO_INCREMENT,
nome 	     VARCHAR(255),
sku        VARCHAR(255) unique,
descricao  TEXT,
quantidade INT,
preco      DECIMAL(5,2),
categoria  INT,
PRIMARY KEY (id),
FOREIGN KEY (categoria) REFERENCES categoria (codigo)
);

SELECT * FROM product;
SELECT * FROM categoria;

DELETE FROM categoria WHERE codigo >= 15;
DELETE FROM product WHERE id >= 15;

