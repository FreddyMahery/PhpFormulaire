CREATE DATABASE gestion_etudiants;
USE gestion_etudiants;

-- table des etudiant
CREATE TABLE etudiants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenoms VARCHAR(50) NOT NULL,
    parcours VARCHAR(50) NOT NULL,
    sexe ENUM('Homme', 'Femme') NOT NULL,
    date_naissance DATE NOT NULL,
    adresse VARCHAR(255) NOT NULL
);
-- parcour admin
CREATE TABLE parcours (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_parcours VARCHAR(50) NOT NULL
);

INSERT INTO parcours (nom_parcours) VALUES ('Math'), ('Physique'), ('Chimie');
-- pour les ajout admin
CREATE TABLE utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenoms VARCHAR(50) NOT NULL,
    email VARCHAR(255) NOT NULL,
    mdp VARCHAR(255) NOT NULL
);
-- insersion une admin
INSERT INTO utilisateurs (nom,prenoms,email,mdp) VALUES ('freddy','nomena','nom@gmail.com','1598753.');
