CREATE DATABASE IF NOT EXISTS 'anguelina_levchenko_iticdesk';
USE 'anguelina_levchenko_iticdesk';

CREATE USER 'anguelina'@'localhost' IDENTIFIED BY 'anguelina';
GRANT ALL PRIVILEGES ON anguelina_levchenko_iticdesk.* TO 'anguelina'@'localhost';
FLUSH PRIVILEGES;

DROP TABLE incidencies;
DROP TABLE usuaris;

CREATE TABLE usuaris (
    id INT AUTO_INCREMENT PRIMARY KEY,
    dni VARCHAR(9),
    nom VARCHAR(50),
    cognom VARCHAR(50),
    correu VARCHAR(100),
    password VARCHAR(100),
    rol ENUM('professor', 'administrador')
);

CREATE TABLE incidencies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    prioritat ENUM('Crítica', 'Urgent', 'Lleu', 'No urgent') NOT NULL,
    titol VARCHAR(100) NOT NULL,
    descripcio VARCHAR(100) NOT NULL,
    id_usuari INT NOT NULL,
    data DATE  NOT NULL,
    estat ENUM('Oberta', 'Gestió', 'Tancada', 'Reoberta') NOT NULL,
    FOREIGN KEY (id_usuari) REFERENCES usuaris(id)
);

INSERT INTO usuaris VALUES (NULL, '12345678A', 'anguelina', 'levchenko', 'al@gmail.com', 'al', 'administrador');

INSERT INTO usuaris VALUES (NULL, '91011121B', 'anna', 'lea', 'annalea@gmail.com', 'annalea', 'professor');
