CREATE TABLE brand(
id INT  AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255) NOT NULL
);

--creamos registros

INSERT INTO brand (name) VALUES ('Minerva'), 
('superior'),
('Modelo'),
('Leones')


--agregamos la columna de fk en la hija beer

ALTER TABLE beer 
ADD COLUMN brand_id INT;


--AGREGAMOS LA RESTRICCION FK 
ALTER TABLE beer 
ADD CONSTRAINT fk_brand
FOREIGN KEY (brand_id) REFERENCES brand(id);

--agregamos valores a esa columna

UPDATE beer 
SET brand_id=1
WHERE id IN(2,5,6);

