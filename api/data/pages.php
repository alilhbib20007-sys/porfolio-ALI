<?php
// Pages d'exercice affichées sur /modules/<slug>.
// Texte détaillé optionnel : api/content/<slug>.html
return [
    'uml-diagramme-de-classes-1' => [
        'titre'       => 'Diagramme de classes (exercice 1)',
        'description' => "Réalisation d'un diagramme de classes dans le cadre de ma formation à l'OFPPT.",
        'images'      => ['/images/td/td1.png'],
        'tags'        => ['UML', 'Modélisation'],
    ],
    'uml-diagramme-de-classes-2' => [
        'titre'       => 'Diagramme de classes (exercice 2)',
        'description' => 'Travail pratique consacré à la modélisation et à la conception UML.',
        'images'      => ['/images/td/td2.png'],
        'tags'        => ['UML', 'Conception'],
    ],
    'mini-projet-uml' => [
        'titre'       => 'Mini projet : conception UML',
        'description' => "Mini projet réalisé pendant ma formation à l'OFPPT (rapport PDF).",
        'pdf'         => '/pdf/mini-projets/mini-projet.pdf',
        'tags'        => ['UML', 'Mini projet'],
    ],
    'figma-prototype-bruce' => [
        'titre'       => 'Rapport de prototypage Figma',
        'description' => "Conception d'un prototype d'application mobile de partage et de messagerie (« Bruce ») sur Figma : profil, liste des conversations, discussion et saisie d'un message.",
        'pdf'         => '/pdf/td/td3-rapport-prototype-figma.pdf',
        'tags'        => ['Figma', 'UX/UI', 'Prototypage'],
    ],
    'mpm-exercice-2' => [
        'titre'       => 'Atelier 1 - Exercice 2 : méthode des potentiels (MPM)',
        'description' => "Construction d'un réseau avec la méthode des potentiels Métra (MPM) : dates au plus tôt / au plus tard de chaque tâche et mise en évidence de deux chemins critiques.",
        'images'      => ['/images/td/td4-atelier1-ex2-mpm-1.jpg', '/images/td/td4-atelier1-ex2-mpm-2.jpg'],
        'tags'        => ['MPM', 'Ordonnancement', 'Chemin critique'],
    ],
    'mpm-exercice-3' => [
        'titre'       => 'Atelier 1 - Exercice 3 : méthode des potentiels (MPM)',
        'description' => "Deuxième réseau de tâches résolu avec la méthode des potentiels Métra (MPM) : dates au plus tôt / au plus tard et identification du chemin critique.",
        'images'      => ['/images/td/td5-atelier1-ex3-mpm.jpg'],
        'tags'        => ['MPM', 'Ordonnancement', 'Chemin critique'],
    ],
    'agile-scrum' => [
        'titre'       => 'Fiche de synthèse : méthode Agile et Scrum',
        'description' => "Notes de cours : principes de l'Agile, rôles Scrum (Product Owner, Scrum Master, équipe de développement), Product Backlog et Sprint Backlog, User Story, Story Points, cérémonies (Sprint Planning, Daily, Review, Rétrospective) et Incrément.",
        'images'      => ['/images/td/td6-agile-scrum-1.jpg', '/images/td/td6-agile-scrum-2.jpg'],
        'tags'        => ['Agile', 'Scrum', 'Kanban'],
    ],
    'atelier-3-bases-git' => [
        'titre'       => 'Atelier 3 - Les bases de Git',
        'description' => "Création d'un dépôt local, suivi des fichiers, staging, commits, git diff et git log : trois commits sur une petite page web, avec les réponses à toutes les questions de l'atelier.",
        'lien'        => 'https://github.com/alilhbib20007-sys/atelier-git',
        'tags'        => ['Git', 'Commit', 'Staging'],
    ],
    'atelier-4-git-collaboratif' => [
        'titre'       => 'Atelier 4 - Git et GitHub : travail collaboratif',
        'description' => "Dépôt distant partagé, branches contact et promotion (deux développeurs), push avec --set-upstream, deux Pull Requests fusionnées dans main et synchronisation avec git pull.",
        'lien'        => 'https://github.com/alilhbib20007-sys/atelier-collaboratif',
        'tags'        => ['GitHub', 'Branches', 'Pull Request'],
    ],
    'atelier-5-examen-git' => [
        'titre'       => 'Atelier 5 - Examen M202 : exercices Git',
        'description' => "Correction de l'examen régional M202 (Approche agile) : depot_local, branches gestion-produits et feature-xyz, fusions, git restore, push vers GitHub et réinitialisation de l'historique.",
        'lien'        => 'https://github.com/alilhbib20007-sys/depot_local',
        'tags'        => ['Git', 'Merge', 'Examen'],
    ],
    'atelier-6-stagiaires' => [
        'titre'       => 'Atelier 6 - Gestion des stagiaires (PHP, Aiven, Cloudinary, Vercel)',
        'description' => "Application Full Stack préparatoire au Sprint 3 de Quick Annonces : formulaire d'inscription, photo envoyée sur Cloudinary, données enregistrées dans MySQL (Aiven, connexion TLS) puis affichage de la liste, déployée sur Vercel depuis GitHub.",
        'images'      => ['/images/mini-projets/atelier6-stagiaires.png'],
        'lien'        => 'https://github.com/alilhbib20007-sys/atelier-stagiaires',
        'demo'        => 'https://atelier-stagiaires-jade.vercel.app',
        'tags'        => ['PHP', 'MySQL', 'Aiven', 'Cloudinary', 'Vercel'],
    ],
    'atelier-7-gitlab-sonarqube' => [
        'titre'       => 'Atelier 7 - Pipeline GitLab CI/CD + SonarQube Cloud',
        'description' => "Mini-site HTML/CSS/JavaScript analysé par SonarQube Cloud dans un pipeline GitLab CI/CD : la V1 correcte passe le Quality Gate et se déploie sur GitLab Pages, la V2 volontairement vulnérable (XSS DOM) est bloquée avant le déploiement.",
        'images'      => ['/images/td/at7-v1-pipeline.jpg', '/images/td/at7-v1-sonar.jpg', '/images/td/at7-v2-pipelines.jpg', '/images/td/at7-v2-sonar.jpg', '/images/td/at7-v2-issue.jpg'],
        'lien'        => 'https://gitlab.com/alilhbib20007/atelier-sonarqube',
        'tags'        => ['GitLab CI/CD', 'SonarQube Cloud', 'Quality Gate', 'XSS', 'GitLab Pages'],
    ],
    'm203-atelier-1-sql' => [
        'titre'       => 'Atelier 1 SQL complet - Requêtes, calculs, optimisation et sécurité',
        'description' => "Base de données de gestion commerciale (clients, commandes, produits, paiements) créée et interrogée sur un serveur MySQL distant Aiven : jointures, agrégations, IF(), DATEDIFF(), LIMIT, sous-requêtes, index vérifiés avec EXPLAIN, vue et droits d'accès (GRANT / REVOKE).",
        'images'      => ['/images/m203/m3-11-aiven-service.jpg', '/images/m203/m3-10-aiven-databases.jpg'],
        'tags'        => ['MySQL', 'Aiven', 'Jointures', 'GROUP BY', 'Index', 'Vues', 'DCL'],
    ],
    'm203-atelier-2-procedures' => [
        'titre'       => 'Atelier 2 - Procédures et fonctions stockées en MySQL',
        'description' => "Procédures et fonctions stockées exécutées sur Aiven : gestion des stagiaires, facturation de l'eau avec une boucle WHILE et une fonction à tranches, paramètres IN, OUT et INOUT.",
        'tags'        => ['MySQL', 'Aiven', 'Procédures', 'Fonctions', 'WHILE', 'IN / OUT / INOUT'],
    ],
    'm203-atelier-3-techlearn' => [
        'titre'       => 'Atelier 3 - Centre de formation TechLearn (procédures et fonctions)',
        'description' => "Base techlearn_db sur Aiven : procédures IN, OUT et INOUT, taux d'occupation, génération de sessions en boucle et défis finaux (sessions_formateur, supprimer_sessions_vides, valider_inscription).",
        'tags'        => ['MySQL', 'Aiven', 'Procédures', 'Fonctions', 'IF', 'WHILE', 'Rapport'],
    ],
    'm203-atelier-4-curseurs' => [
        'titre'       => 'Atelier 4 - Les curseurs en MySQL',
        'description' => "Curseurs exécutés sur Aiven : lecture ligne par ligne, calcul des factures d'eau et attribution automatique d'une mention à chaque étudiant (Excellent, Bien, Passable, Insuffisant).",
        'tags'        => ['MySQL', 'Aiven', 'Curseurs', 'FETCH', 'HANDLER', 'LOOP'],
    ],
];
