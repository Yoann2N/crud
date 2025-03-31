SET NAMES 'utf8';
SET CHARACTER SET utf8;
DROP DATABASE IF EXISTS crud;
CREATE DATABASE crud;
USE crud;

CREATE TABLE Etudiants(
   id INT PRIMARY KEY AUTO_INCREMENT,
   nom VARCHAR(50) NOT NULL,
   prenom VARCHAR(50) NOT NULL,
   email VARCHAR(50) NOT NULL,
   mot_de_passe VARCHAR(120),
   telephone VARCHAR(50) NOT NULL,
   admin BOOLEAN,
   etudiant BOOLEAN,
   professeur BOOLEAN
   
);

CREATE TABLE cours(
   id INT PRIMARY KEY AUTO_INCREMENT,
   nom VARCHAR(50) NOT NULL
   
);

CREATE TABLE inscription(
   id INT PRIMARY KEY AUTO_INCREMENT,
   id_personne INT,
   id_cours INT,
   FOREIGN KEY(id_personne) REFERENCES Etudiants(id),
   FOREIGN KEY(id_cours) REFERENCES cours(id)
);

-- remplissage des tables 

INSERT INTO Etudiants (nom, prenom, email, mot_de_passe, telephone, admin, etudiant, professeur) VALUES
('Dupont', 'Jean', 'jean.dupont@email.com', '$2y$10$c.zlX4T5eecQbKJWUNVpAugroQv3JehcB.HrxwE/HGu1yXDdoWLmO', '0601020304', FALSE, TRUE, FALSE),
('Martin', 'Sophie', 'sophie.martin@email.com', '$2y$10$QXaYNlQ79Lt358rJ1JtQfulVy/01uocWzRMcJ9UgpYpLJfyfyc1na', '0605060708', FALSE, TRUE, FALSE),
('Durand', 'Paul', 'paul.durand@email.com', '$2y$10$3Jq/NmqqUSQlH/vjTXcxmOtyczs4v6qnsih8gLrViDjnJwfv67U4C', '0608091011', TRUE, FALSE, TRUE),
('Bernard', 'Lucie', 'lucie.bernard@email.com', '$2y$10$xRiQfPdsZkWGeIPungDYzeLX.X7dECVdPV6Ir0DMM1k29UjA84TO2', '0611121314', FALSE, TRUE, FALSE),
('Robert', 'Michel', 'michel.robert@email.com', '$2y$10$Ivk4JuANzSV/IwERbe8Ugu7Ntgy1xo7T1bQV31NKFPtrirYYM7GUS', '0614151617', FALSE, TRUE, FALSE),
('Petit', 'Camille', 'camille.petit@email.com', '$2y$10$eU.AISPPKA3iKvs.22Lyr.JiOjfoO8z.gGKh5cpPl9t2I.HmSZ0XS', '0617181920', FALSE, TRUE, FALSE),
('Morel', 'Thomas', 'thomas.morel@email.com', '$2y$10$mkzTYc6l7TX22LmwcnRRgu/HFd1DDMmg0TZLpv2MtcrMfnjgRI0k.', '0620212223', FALSE, TRUE, FALSE),
('Simon', 'Julie', 'julie.simon@email.com', '$2y$10$Lx1OUWkmdqqrGJyf81aziuMOwDkyM/iJky9TRdlWHgcJhqwYA..oO', '0623242526', FALSE, TRUE, FALSE),
('Lefevre', 'Antoine', 'antoine.lefevre@email.com', '$2y$10$mQ0VKCSONCFHQhwfodWnHuC851yKSAHSPkS4gb52TefIe0ETaznde', '0626272829', FALSE, TRUE, FALSE),
('Lemoine', 'Emma', 'emma.lemoine@email.com', '$2y$10$pRaIgz/Eui4RkyxG8yp81ugUb4LsvZ6YcA8eLrmusb/31EcI4nI72', '0630313233', FALSE, TRUE, FALSE);

INSERT INTO cours (nom) VALUES
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
