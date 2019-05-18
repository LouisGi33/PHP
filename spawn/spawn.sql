CREATE TABLE list_spawn(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL
);

CREATE TABLE img_spawn(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL
);

INSERT INTO list_spawn (id, name) VALUES (NULL, 'Alaska');
INSERT INTO img_spawn (id, name) VALUES (NULL, './images/alaska.jpg');

INSERT INTO list_spawn (id, name) VALUES (NULL, 'Bali');
INSERT INTO img_spawn (id, name) VALUES (NULL, './images/bali.jpg');

INSERT INTO list_spawn (id, name) VALUES (NULL, 'Egypte');
INSERT INTO img_spawn (id, name) VALUES (NULL, './images/egypte.jpg');

INSERT INTO list_spawn (id, name) VALUES (NULL, 'Punaauia');
INSERT INTO img_spawn (id, name) VALUES (NULL, './images/punaauia.jpg');

INSERT INTO list_spawn (id, name) VALUES (NULL, 'Tombouctou');
INSERT INTO img_spawn (id, name) VALUES (NULL, './images/tombouctou.jpg');
