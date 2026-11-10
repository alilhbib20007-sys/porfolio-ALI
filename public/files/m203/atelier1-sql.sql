-- =====================================================================
-- Atelier 1 SQL Complet - Requetes, Calculs, Optimisation et Securite
-- Theme : gestion commerciale (clients, commandes, produits, paiements)
-- Execute sur MySQL heberge sur Aiven
-- =====================================================================

SELECT '=== CONNEXION ===' AS etape;
SELECT VERSION() AS version_mysql, CURRENT_USER() AS utilisateur, @@hostname AS serveur, NOW() AS date_execution;

-- 1. CONCEPTION DE LA BASE ---------------------------------------------
SELECT '=== 1.1 Creation de la base ===' AS etape;
DROP DATABASE IF EXISTS atelier_commerce;
CREATE DATABASE atelier_commerce;
USE atelier_commerce;
SELECT DATABASE() AS base_courante;

SELECT '=== 1.2 Creation des tables ===' AS etape;
CREATE TABLE clients (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(50),
  ville VARCHAR(50)
);

CREATE TABLE produits (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom_produit VARCHAR(50),
  prix_unitaire DECIMAL(10,2)
);

CREATE TABLE commandes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  client_id INT,
  date_commande DATE,
  FOREIGN KEY (client_id) REFERENCES clients(id)
);

CREATE TABLE details_commandes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  commande_id INT,
  produit_id INT,
  quantite INT,
  FOREIGN KEY (commande_id) REFERENCES commandes(id),
  FOREIGN KEY (produit_id) REFERENCES produits(id)
);

CREATE TABLE paiements (
  id INT AUTO_INCREMENT PRIMARY KEY,
  commande_id INT,
  montant DECIMAL(10,2),
  mode_paiement VARCHAR(30),
  date_paiement DATE,
  FOREIGN KEY (commande_id) REFERENCES commandes(id)
);

SHOW TABLES;

SELECT '=== 1.3 Insertion des donnees ===' AS etape;
INSERT INTO clients (nom, ville)
VALUES ('Alice', 'Paris'), ('Bob', 'Lyon'), ('Charlie', 'Toulouse'), ('Dina', 'Nice');

INSERT INTO produits (nom_produit, prix_unitaire)
VALUES ('Ordinateur', 950), ('Souris', 20), ('Clavier', 45), ('Écran', 250);

INSERT INTO commandes (client_id, date_commande)
VALUES (1, '2025-01-10'), (1, '2025-01-20'), (2, '2025-02-01'), (3, '2025-02-10');

INSERT INTO details_commandes (commande_id, produit_id, quantite)
VALUES (1,1,1), (1,2,2), (2,3,1), (3,4,2), (4,2,3);

INSERT INTO paiements (commande_id, montant, mode_paiement, date_paiement)
VALUES (1, 990, 'Carte', '2025-01-12'), (2, 45, 'Espèces', '2025-01-21'), (3, 500, 'Virement', '2025-02-05');

SELECT 'clients' AS table_name, COUNT(*) AS lignes FROM clients
UNION ALL SELECT 'produits', COUNT(*) FROM produits
UNION ALL SELECT 'commandes', COUNT(*) FROM commandes
UNION ALL SELECT 'details_commandes', COUNT(*) FROM details_commandes
UNION ALL SELECT 'paiements', COUNT(*) FROM paiements;

SELECT * FROM clients;
SELECT * FROM produits;
SELECT * FROM commandes;
SELECT * FROM details_commandes;
SELECT * FROM paiements;

-- 2. REQUETES DE JOINTURES ---------------------------------------------
SELECT '=== 2. INNER JOIN ===' AS etape;
SELECT c.nom, cmd.id AS commande, p.nom_produit, dc.quantite
FROM clients c
INNER JOIN commandes cmd ON c.id = cmd.client_id
INNER JOIN details_commandes dc ON cmd.id = dc.commande_id
INNER JOIN produits p ON dc.produit_id = p.id;

SELECT '=== 2. LEFT JOIN ===' AS etape;
SELECT c.nom, cmd.id AS num_commande
FROM clients c
LEFT JOIN commandes cmd ON c.id = cmd.client_id;

SELECT '=== 2. RIGHT JOIN ===' AS etape;
SELECT c.nom, cmd.id, cmd.date_commande
FROM clients c
RIGHT JOIN commandes cmd ON c.id = cmd.client_id;

SELECT '=== 2. FULL JOIN (simulation MySQL) ===' AS etape;
SELECT c.nom, cmd.id AS num_commande
FROM clients c
LEFT JOIN commandes cmd ON c.id = cmd.client_id
UNION
SELECT c.nom, cmd.id AS num_commande
FROM clients c
RIGHT JOIN commandes cmd ON c.id = cmd.client_id;

-- 3. AGREGATIONS ET CALCULS --------------------------------------------
SELECT '=== 3. Montant total par commande ===' AS etape;
SELECT cmd.id AS commande, SUM(p.prix_unitaire * dc.quantite) AS total_commande
FROM commandes cmd
JOIN details_commandes dc ON cmd.id = dc.commande_id
JOIN produits p ON dc.produit_id = p.id
GROUP BY cmd.id;

SELECT '=== 3. Montant total depense par client (HAVING > 500) ===' AS etape;
SELECT c.nom, SUM(p.prix_unitaire * dc.quantite) AS total_client
FROM clients c
JOIN commandes cmd ON c.id = cmd.client_id
JOIN details_commandes dc ON cmd.id = dc.commande_id
JOIN produits p ON dc.produit_id = p.id
GROUP BY c.nom
HAVING total_client > 500;

SELECT '=== 3. Montant moyen par produit ===' AS etape;
SELECT p.nom_produit, AVG(p.prix_unitaire) AS prix_moyen
FROM produits p
GROUP BY p.nom_produit;

-- 4. FONCTIONS SQL -----------------------------------------------------
SELECT '=== 4. IF() pour classer les clients ===' AS etape;
SELECT c.nom, SUM(p.prix_unitaire * dc.quantite) AS total,
       IF(SUM(p.prix_unitaire * dc.quantite) > 800, 'Premium', 'Standard') AS categorie
FROM clients c
JOIN commandes cmd ON c.id = cmd.client_id
JOIN details_commandes dc ON cmd.id = dc.commande_id
JOIN produits p ON dc.produit_id = p.id
GROUP BY c.nom;

SELECT '=== 4. Fonctions de date : DATEDIFF() ===' AS etape;
SELECT p.id AS paiement, cmd.id AS commande,
       DATEDIFF(p.date_paiement, cmd.date_commande) AS delai_jours
FROM paiements p
JOIN commandes cmd ON p.commande_id = cmd.id;

SELECT '=== 4. LIMIT ===' AS etape;
SELECT c.nom, SUM(p.prix_unitaire * dc.quantite) AS total
FROM clients c
JOIN commandes cmd ON c.id = cmd.client_id
JOIN details_commandes dc ON cmd.id = dc.commande_id
JOIN produits p ON dc.produit_id = p.id
GROUP BY c.nom
ORDER BY total DESC
LIMIT 2;

-- 5. IN / NOT IN / EXISTS ----------------------------------------------
SELECT '=== 5. IN ===' AS etape;
SELECT nom FROM clients WHERE id IN (
  SELECT client_id FROM commandes WHERE id IN (
    SELECT commande_id FROM paiements));

SELECT '=== 5. NOT IN ===' AS etape;
SELECT nom FROM clients WHERE id NOT IN (
  SELECT client_id FROM commandes WHERE id IN (
    SELECT commande_id FROM paiements));

SELECT '=== 5. EXISTS ===' AS etape;
SELECT nom FROM clients c
WHERE EXISTS (
  SELECT 1 FROM commandes cmd
  JOIN paiements p ON cmd.id = p.commande_id
  WHERE cmd.client_id = c.id);

-- 6. OPTIMISATION : INDEX ET VUES --------------------------------------
SELECT '=== 6. EXPLAIN AVANT index ===' AS etape;
EXPLAIN SELECT * FROM produits WHERE nom_produit = 'Souris';

SELECT '=== 6. Creation des index ===' AS etape;
CREATE INDEX idx_nom_produit ON produits(nom_produit);
CREATE INDEX idx_client_ville ON clients(ville);
SHOW INDEX FROM produits;

SELECT '=== 6. EXPLAIN APRES index ===' AS etape;
EXPLAIN SELECT * FROM produits WHERE nom_produit = 'Souris';

SELECT '=== 6. Vue vue_ventes ===' AS etape;
CREATE VIEW vue_ventes AS
SELECT c.nom, p.nom_produit, dc.quantite, (p.prix_unitaire * dc.quantite) AS montant, pa.mode_paiement
FROM clients c
JOIN commandes cmd ON c.id = cmd.client_id
JOIN details_commandes dc ON cmd.id = dc.commande_id
JOIN produits p ON dc.produit_id = p.id
LEFT JOIN paiements pa ON cmd.id = pa.commande_id;

SELECT * FROM vue_ventes;

SELECT '=== 6. Vue filtree (montant > 200) ===' AS etape;
SELECT * FROM vue_ventes WHERE montant > 200;

-- 7. DCL - GESTION DES UTILISATEURS ------------------------------------
SELECT '=== 7. DCL : creation des utilisateurs ===' AS etape;
DROP USER IF EXISTS 'vendeur'@'localhost';
DROP USER IF EXISTS 'manager'@'localhost';
CREATE USER 'vendeur'@'localhost' IDENTIFIED BY '1234';
CREATE USER 'manager'@'localhost' IDENTIFIED BY 'admin';

SELECT '=== 7. GRANT ===' AS etape;
GRANT SELECT, INSERT, UPDATE ON atelier_commerce.* TO 'vendeur'@'localhost';
GRANT ALL PRIVILEGES ON atelier_commerce.* TO 'manager'@'localhost';
FLUSH PRIVILEGES;

SELECT '=== 7. SHOW GRANTS ===' AS etape;
SHOW GRANTS FOR 'vendeur'@'localhost';
SHOW GRANTS FOR 'manager'@'localhost';

SELECT '=== 7. REVOKE UPDATE (vendeur) ===' AS etape;
REVOKE UPDATE ON atelier_commerce.* FROM 'vendeur'@'localhost';
SHOW GRANTS FOR 'vendeur'@'localhost';

SELECT '=== FIN ===' AS etape;
