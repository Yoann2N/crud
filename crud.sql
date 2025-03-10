SET NAMES 'utf8';
SET CHARACTER SET utf8;
DROP DATABASE IF EXISTS crud;
CREATE DATABASE crud;
USE crud;

CREATE TABLE Etudiants(
   id_ INT PRIMARY KEY AUTO_INCREMENT,
   nom VARCHAR(50) NOT NULL,
   prenom VARCHAR(50) NOT NULL,
   email VARCHAR(50) NOT NULL,
   mot_de_passe VARCHAR(120),
   telephone VARCHAR(50) NOT NULL,
   admin BOOLEAN,
   etudiant BOOLEAN,
   professeur BOOLEAN
   
);

CREATE TABLE cours_(
   id INT PRIMARY KEY AUTO_INCREMENT,
   nom VARCHAR(50) NOT NULL
   
);

CREATE TABLE inscription(
   id INT PRIMARY KEY AUTO_INCREMENT,
   id_personne INT,
   id_cours INT,
   FOREIGN KEY(id_personne) REFERENCES Etudiants(id_),
   FOREIGN KEY(id_cours) REFERENCES cours_(id)
);

-- remplissage des tables 

INSERT INTO Etudiants (nom, prenom, email, mot_de_passe, telephone, admin, etudiant, professeur) VALUES
('Dupont', 'Jean', 'jean.dupont@email.com', 'mdp123', '0601020304', FALSE, TRUE, FALSE),
('Martin', 'Sophie', 'sophie.martin@email.com', 'mdp456', '0605060708', FALSE, TRUE, FALSE),
('Durand', 'Paul', 'paul.durand@email.com', 'mdp789', '0608091011', TRUE, FALSE, TRUE),
('Bernard', 'Lucie', 'lucie.bernard@email.com', 'mdp147', '0611121314', FALSE, TRUE, FALSE),
('Robert', 'Michel', 'michel.robert@email.com', 'mdp258', '0614151617', FALSE, TRUE, FALSE),
('Petit', 'Camille', 'camille.petit@email.com', 'mdp369', '0617181920', FALSE, TRUE, FALSE),
('Morel', 'Thomas', 'thomas.morel@email.com', 'mdp159', '0620212223', FALSE, TRUE, FALSE),
('Simon', 'Julie', 'julie.simon@email.com', 'mdp753', '0623242526', FALSE, TRUE, FALSE),
('Lefevre', 'Antoine', 'antoine.lefevre@email.com', 'mdp456', '0626272829', FALSE, TRUE, FALSE),
('Lemoine', 'Emma', 'emma.lemoine@email.com', 'mdp852', '0630313233', FALSE, TRUE, FALSE);

INSERT INTO cours_ (nom) VALUES
('Mathématiques'),
('Informatique'),
('Physique'),
('Chimie'),
('Histoire');

INSERT INTO inscription (id_personne, id_cours) VALUES
(1, 1), (1, 2), (1, 3),
(2, 2), (2, 3), (2, 4),
(3, 3), (3, 4), (3, 5),
(4, 1), (4, 5),
(5, 2), (5, 3),
(6, 1), (6, 4),
(7, 2), (7, 5),
(8, 3), (8, 4),
(9, 1), (9, 5),
(10, 2), (10, 3);
