-- =====================================================================
-- Module 3 (M203) - Ateliers 2, 3 et 4 : procedures, fonctions, curseurs
-- Execute sur MySQL heberge sur Aiven
-- Remarques :
--  * DELIMITER // (et non /) : le caractere / sert aussi a la division
--    (inscrits / capacite), le client mysql couperait la requete en deux.
--  * Les fonctions declarent DETERMINISTIC / READS SQL DATA : le journal
--    binaire est actif sur Aiven, MySQL refuse sinon (erreur 1418).
-- =====================================================================

SELECT '=== CONNEXION ===' AS etape;
SELECT VERSION() AS version_mysql, CURRENT_USER() AS utilisateur, NOW() AS date_execution;

-- #####################################################################
-- ATELIER 2 : Procedures et fonctions stockees
-- #####################################################################
SELECT '=== A2 Base et table stagiaires ===' AS etape;
DROP DATABASE IF EXISTS atelier2_procedures;
CREATE DATABASE atelier2_procedures;
USE atelier2_procedures;

CREATE TABLE stagiaires (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    ville VARCHAR(100)
);

INSERT INTO stagiaires (nom, ville) VALUES
('Ali', 'Casablanca'),
('Sara', 'Rabat'),
('Khalid', 'Casablanca'),
('Mouna', 'Marrakech'),
('Youssef', 'Rabat');

SELECT * FROM stagiaires;

SELECT '=== A2 Exemples simples pc1 et somme ===' AS etape;
DELIMITER //
CREATE PROCEDURE pc1()
BEGIN
    SELECT * FROM stagiaires;
END //

CREATE FUNCTION somme(a INT, b INT)
RETURNS INT
DETERMINISTIC NO SQL
BEGIN
    DECLARE s INT;
    SET s = a + b;
    RETURN s;
END //
DELIMITER ;

CALL pc1();
SELECT somme(1, 2) AS `somme(1, 2)`;

SELECT '=== A2 Procedure afficher_stagiaires_par_ville ===' AS etape;
DELIMITER //
CREATE PROCEDURE afficher_stagiaires_par_ville(IN ville_param VARCHAR(100))
BEGIN
    SELECT * FROM stagiaires WHERE ville = ville_param;
END //
DELIMITER ;

CALL afficher_stagiaires_par_ville('Casablanca');

SELECT '=== A2 Procedure compter_stagiaires ===' AS etape;
DELIMITER //
CREATE PROCEDURE compter_stagiaires()
BEGIN
    DECLARE total INT;
    SELECT COUNT(*) INTO total FROM stagiaires;
    SELECT total AS 'Nombre de stagiaires';
END //
DELIMITER ;

CALL compter_stagiaires();

SELECT '=== A2 Fonction nombre_stagiaires_par_ville ===' AS etape;
DELIMITER //
CREATE FUNCTION nombre_stagiaires_par_ville(ville_param VARCHAR(100))
RETURNS INT
READS SQL DATA
BEGIN
    DECLARE total INT;
    SELECT COUNT(*) INTO total FROM stagiaires WHERE ville = ville_param;
    RETURN total;
END //
DELIMITER ;

SELECT nombre_stagiaires_par_ville('Rabat') AS `nombre_stagiaires_par_ville('Rabat')`;

SELECT '=== A2 SHOW PROCEDURE / FUNCTION STATUS ===' AS etape;
SELECT ROUTINE_NAME AS nom, ROUTINE_TYPE AS type, CREATED AS cree_le
FROM information_schema.ROUTINES
WHERE ROUTINE_SCHEMA = DATABASE()
ORDER BY ROUTINE_TYPE, ROUTINE_NAME;

SELECT '=== A2 Facturation de l eau : table et procedure WHILE ===' AS etape;
CREATE TABLE facture (
    id_facture INT AUTO_INCREMENT PRIMARY KEY,
    nom_client VARCHAR(255),
    qte_eau INT
);

DELIMITER //
CREATE PROCEDURE inserer_factures()
BEGIN
    DECLARE compteur INT DEFAULT 1;
    WHILE compteur <= 100 DO
        INSERT INTO facture (nom_client, qte_eau)
        VALUES (CONCAT('Client', compteur), compteur);
        SET compteur = compteur + 1;
    END WHILE;
END //
DELIMITER ;

CALL inserer_factures();
SELECT COUNT(*) AS nb_factures, MIN(qte_eau) AS qte_min, MAX(qte_eau) AS qte_max FROM facture;

SELECT '=== A2 Fonction calculer_montant (tranches) ===' AS etape;
DELIMITER //
CREATE FUNCTION calculer_montant(qte INT)
RETURNS DECIMAL(10,2)
DETERMINISTIC NO SQL
BEGIN
    DECLARE montant DECIMAL(10,2);
    IF qte <= 10 THEN
        SET montant = qte * 1;
    ELSEIF qte <= 30 THEN
        SET montant = (10 * 1) + (qte - 10) * 1.5;
    ELSE
        SET montant = (10 * 1) + (20 * 1.5) + (qte - 30) * 2;
    END IF;
    RETURN montant;
END //
DELIMITER ;

SELECT id_facture, nom_client, qte_eau, calculer_montant(qte_eau) AS montant_a_payer
FROM facture
WHERE qte_eau IN (1, 5, 10, 11, 20, 30, 31, 50, 100);

SELECT COUNT(*) AS nb_factures, SUM(calculer_montant(qte_eau)) AS total_a_encaisser FROM facture;

SELECT '=== A2 Parametre IN : supprimer_stagiaire ===' AS etape;
DELIMITER //
CREATE PROCEDURE supprimer_stagiaire(IN p_id INT)
BEGIN
    DELETE FROM stagiaires WHERE id = p_id;
END //
DELIMITER ;

CALL supprimer_stagiaire(5);
SELECT * FROM stagiaires;

SELECT '=== A2 Parametre OUT : compter_stagiaires_out ===' AS etape;
DELIMITER //
CREATE PROCEDURE compter_stagiaires_out(OUT total INT)
BEGIN
    SELECT COUNT(*) INTO total FROM stagiaires;
END //
DELIMITER ;

CALL compter_stagiaires_out(@nb);
SELECT @nb AS total_stagiaires;

SELECT '=== A2 Parametre INOUT : augmenter_stock ===' AS etape;
CREATE TABLE produits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    stock INT
);
INSERT INTO produits (nom, stock) VALUES ('Clavier', 15), ('Souris', 40);

DELIMITER //
CREATE PROCEDURE augmenter_stock(INOUT qte INT, IN p_id INT)
BEGIN
    UPDATE produits SET stock = stock + qte WHERE id = p_id;
    SELECT stock INTO qte FROM produits WHERE id = p_id;
END //
DELIMITER ;

SET @ajout = 10;
CALL augmenter_stock(@ajout, 1);
SELECT @ajout AS nouveau_stock;
SELECT * FROM produits;

SELECT '=== A2 Suppression des procedures et fonctions ===' AS etape;
DROP PROCEDURE IF EXISTS afficher_stagiaires_par_ville;
DROP PROCEDURE IF EXISTS compter_stagiaires;
DROP FUNCTION IF EXISTS nombre_stagiaires_par_ville;
SELECT ROUTINE_NAME AS routines_restantes, ROUTINE_TYPE AS type
FROM information_schema.ROUTINES
WHERE ROUTINE_SCHEMA = DATABASE()
ORDER BY ROUTINE_TYPE, ROUTINE_NAME;

-- #####################################################################
-- ATELIER 3 : Centre de formation TechLearn
-- #####################################################################
SELECT '=== A3 Creation de la base techlearn_db ===' AS etape;
DROP DATABASE IF EXISTS techlearn_db;
CREATE DATABASE techlearn_db;
USE techlearn_db;

CREATE TABLE formateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    specialite VARCHAR(100)
);

CREATE TABLE stagiaires (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    ville VARCHAR(100)
);

CREATE TABLE sessions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    intitule VARCHAR(100),
    formateur_id INT,
    capacite INT,
    inscrits INT DEFAULT 0,
    FOREIGN KEY (formateur_id) REFERENCES formateurs(id)
);

SHOW TABLES;

SELECT '=== A3 Insertion des donnees ===' AS etape;
INSERT INTO formateurs (nom, specialite) VALUES
('Mme Nadia', 'Bases de données'),
('M. Karim', 'Développement Web'),
('Mme Salma', 'Analyse de données');

INSERT INTO stagiaires (nom, ville) VALUES
('Ali', 'Casablanca'),
('Sara', 'Rabat'),
('Mouna', 'Marrakech');

INSERT INTO sessions (intitule, formateur_id, capacite, inscrits) VALUES
('MySQL avancé', 1, 20, 5),
('HTML/CSS', 2, 25, 10),
('Python Data', 3, 15, 8);

SELECT * FROM formateurs;
SELECT * FROM sessions;

SELECT '=== A3 Exercice 1 : parametre IN ===' AS etape;
DELIMITER //
CREATE PROCEDURE afficher_stagiaires_par_ville(IN ville_nom VARCHAR(100))
BEGIN
    SELECT * FROM stagiaires WHERE ville = ville_nom;
END //
DELIMITER ;

CALL afficher_stagiaires_par_ville('Casablanca');

SELECT '=== A3 Exercice 2 : parametre OUT ===' AS etape;
DELIMITER //
CREATE PROCEDURE compter_sessions(OUT total INT)
BEGIN
    SELECT COUNT(*) INTO total FROM sessions;
END //
DELIMITER ;

CALL compter_sessions(@nb);
SELECT @nb AS nombre_total_sessions;

SELECT '=== A3 Exercice 3 : parametre INOUT ===' AS etape;
DELIMITER //
CREATE PROCEDURE inscrire_stagiaire(INOUT nb_inscrits INT, IN session_id INT)
BEGIN
    UPDATE sessions SET inscrits = inscrits + 1 WHERE id = session_id;
    SELECT inscrits INTO nb_inscrits FROM sessions WHERE id = session_id;
END //
DELIMITER ;

SET @nouveau = 0;
CALL inscrire_stagiaire(@nouveau, 1);
SELECT @nouveau AS nouveau_nombre_inscrits;

SELECT '=== A3 Exercice 4 : fonction taux_occupation ===' AS etape;
DELIMITER //
CREATE FUNCTION taux_occupation(id_session INT)
RETURNS DECIMAL(5,2)
READS SQL DATA
BEGIN
    DECLARE taux DECIMAL(5,2);
    SELECT (inscrits / capacite) * 100 INTO taux FROM sessions WHERE id = id_session;
    RETURN taux;
END //
DELIMITER ;

SELECT intitule, inscrits, capacite, taux_occupation(id) AS taux FROM sessions;

SELECT '=== A3 Exercice 5 : boucle generer_sessions ===' AS etape;
DELIMITER //
CREATE PROCEDURE generer_sessions(IN formateur INT)
BEGIN
    DECLARE i INT DEFAULT 1;
    WHILE i <= 10 DO
        INSERT INTO sessions (intitule, formateur_id, capacite, inscrits)
        VALUES (CONCAT('Session ', i, ' - Formateur ', formateur), formateur, 20, 0);
        SET i = i + 1;
    END WHILE;
END //
DELIMITER ;

CALL generer_sessions(2);
SELECT id, intitule, formateur_id, capacite, inscrits FROM sessions;

SELECT '=== A3 Defi 1 : fonction sessions_formateur ===' AS etape;
DELIMITER //
CREATE FUNCTION sessions_formateur(nom_formateur VARCHAR(100))
RETURNS INT
READS SQL DATA
BEGIN
    DECLARE nb INT;
    SELECT COUNT(*) INTO nb
    FROM sessions s
    JOIN formateurs f ON f.id = s.formateur_id
    WHERE f.nom = nom_formateur;
    RETURN nb;
END //
DELIMITER ;

SELECT nom, sessions_formateur(nom) AS nb_sessions FROM formateurs;

SELECT '=== A3 Defi 2 : procedure supprimer_sessions_vides ===' AS etape;
DELIMITER //
CREATE PROCEDURE supprimer_sessions_vides()
BEGIN
    DECLARE nb INT;
    SELECT COUNT(*) INTO nb FROM sessions WHERE inscrits = 0;
    DELETE FROM sessions WHERE inscrits = 0;
    SELECT CONCAT(nb, ' session(s) vide(s) supprimée(s)') AS resultat;
END //
DELIMITER ;

CALL supprimer_sessions_vides();
SELECT * FROM sessions;

SELECT '=== A3 Defi 3 : procedure valider_inscription ===' AS etape;
DELIMITER //
CREATE PROCEDURE valider_inscription(IN session_id INT)
BEGIN
    DECLARE v_inscrits INT;
    DECLARE v_capacite INT;
    SELECT inscrits, capacite INTO v_inscrits, v_capacite
    FROM sessions WHERE id = session_id;
    IF v_inscrits >= v_capacite THEN
        SELECT 'Session complète' AS message, v_inscrits AS inscrits, v_capacite AS capacite;
    ELSE
        UPDATE sessions SET inscrits = inscrits + 1 WHERE id = session_id;
        SELECT 'Inscription validée' AS message, v_inscrits + 1 AS inscrits, v_capacite AS capacite;
    END IF;
END //
DELIMITER ;

CALL valider_inscription(2);
UPDATE sessions SET inscrits = capacite WHERE id = 3;
CALL valider_inscription(3);
SELECT intitule, inscrits, capacite, taux_occupation(id) AS taux FROM sessions;

SELECT '=== A3 Recapitulatif des routines ===' AS etape;
SELECT ROUTINE_NAME AS nom, ROUTINE_TYPE AS type
FROM information_schema.ROUTINES
WHERE ROUTINE_SCHEMA = DATABASE()
ORDER BY ROUTINE_TYPE, ROUTINE_NAME;

-- #####################################################################
-- ATELIER 4 : Les curseurs
-- #####################################################################
SELECT '=== A4 Base et exemple de curseur ===' AS etape;
DROP DATABASE IF EXISTS atelier4_curseurs;
CREATE DATABASE atelier4_curseurs;
USE atelier4_curseurs;

CREATE TABLE stagiaires (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100)
);
INSERT INTO stagiaires (nom) VALUES ('Ali'), ('Sara'), ('Mouna');

DELIMITER //
CREATE PROCEDURE exemple_curseur()
BEGIN
    DECLARE var1 INT;
    DECLARE var2 VARCHAR(100);
    DECLARE fin_curseur BOOLEAN DEFAULT FALSE;
    DECLARE mon_curseur CURSOR FOR
        SELECT id, nom FROM stagiaires;
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET fin_curseur = TRUE;

    OPEN mon_curseur;
    boucle_lecture: LOOP
        FETCH mon_curseur INTO var1, var2;
        IF fin_curseur THEN
            LEAVE boucle_lecture;
        END IF;
        SELECT CONCAT('Lecture du stagiaire : ', var2) AS message;
    END LOOP;
    CLOSE mon_curseur;
END //
DELIMITER ;

CALL exemple_curseur();

SELECT '=== A4 Cas pratique : facture avec curseur ===' AS etape;
CREATE TABLE IF NOT EXISTS facture (
    id_facture INT AUTO_INCREMENT PRIMARY KEY,
    nom_client VARCHAR(100),
    qte_eau INT,
    montant DECIMAL(10, 2)
);

INSERT INTO facture (nom_client, qte_eau) VALUES
('Client 1', 9),
('Client 2', 15),
('Client 3', 25);

SELECT * FROM facture;

DELIMITER //
CREATE PROCEDURE calculer_factures()
BEGIN
    DECLARE v_id INT;
    DECLARE v_qte INT;
    DECLARE v_montant DECIMAL(10,2);
    DECLARE fin BOOLEAN DEFAULT FALSE;
    DECLARE curseur_facture CURSOR FOR
        SELECT id_facture, qte_eau FROM facture;
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET fin = TRUE;

    OPEN curseur_facture;
    boucle_factures: LOOP
        FETCH curseur_facture INTO v_id, v_qte;
        IF fin THEN
            LEAVE boucle_factures;
        END IF;
        SET v_montant = v_qte * 1.25;
        UPDATE facture SET montant = v_montant WHERE id_facture = v_id;
    END LOOP;
    CLOSE curseur_facture;
END //
DELIMITER ;

CALL calculer_factures();
SELECT * FROM facture;

SELECT '=== A4 Exercice notes : table et donnees ===' AS etape;
CREATE TABLE notes (
    id_note INT AUTO_INCREMENT PRIMARY KEY,
    nom_etudiant VARCHAR(100),
    note DECIMAL(4,2),
    mention VARCHAR(20)
);

INSERT INTO notes (nom_etudiant, note) VALUES
('Ali', 17.50),
('Sara', 14.25),
('Khalid', 11.00),
('Mouna', 8.75),
('Youssef', 19.00),
('Imane', 9.99),
('Omar', 16.00);

SELECT * FROM notes;

SELECT '=== A4 Exercice notes : procedure avec curseur ===' AS etape;
DELIMITER //
CREATE PROCEDURE attribuer_mentions()
BEGIN
    DECLARE v_id INT;
    DECLARE v_note DECIMAL(4,2);
    DECLARE v_mention VARCHAR(20);
    DECLARE fin BOOLEAN DEFAULT FALSE;
    DECLARE curseur_notes CURSOR FOR
        SELECT id_note, note FROM notes;
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET fin = TRUE;

    OPEN curseur_notes;
    boucle_notes: LOOP
        FETCH curseur_notes INTO v_id, v_note;
        IF fin THEN
            LEAVE boucle_notes;
        END IF;

        IF v_note >= 16 THEN
            SET v_mention = 'Excellent';
        ELSEIF v_note >= 14 THEN
            SET v_mention = 'Bien';
        ELSEIF v_note >= 10 THEN
            SET v_mention = 'Passable';
        ELSE
            SET v_mention = 'Insuffisant';
        END IF;

        UPDATE notes SET mention = v_mention WHERE id_note = v_id;
    END LOOP;
    CLOSE curseur_notes;
END //
DELIMITER ;

CALL attribuer_mentions();
SELECT * FROM notes;

SELECT '=== A4 Synthese par mention ===' AS etape;
SELECT mention, COUNT(*) AS nb_etudiants, MIN(note) AS note_min, MAX(note) AS note_max
FROM notes
GROUP BY mention
ORDER BY note_min DESC;

SELECT '=== FIN ===' AS etape;
