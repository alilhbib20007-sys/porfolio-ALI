<?php
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ali EL Habib | Développeur Digital</title>

    <meta
        name="description"
        content="Portfolio de Ali EL Habib - Développeur Digital"
    >

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #07111f;
            color: #ffffff;
            line-height: 1.6;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .container {
            width: min(1150px, 90%);
            margin: auto;
        }

        /* NAVBAR */

        nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 72px;
            z-index: 1000;

            background: rgba(7, 17, 31, 0.9);
            backdrop-filter: blur(15px);

            border-bottom: 1px solid rgba(255,255,255,0.08);
        }

        .nav-container {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            font-size: 24px;
            font-weight: 800;
        }

        .logo span {
            color: #4da3ff;
        }

        .nav-links {
            display: flex;
            gap: 28px;
            list-style: none;
        }

        .nav-links a {
            color: #aab6c5;
            font-size: 14px;
            transition: 0.3s;
        }

        .nav-links a:hover {
            color: #4da3ff;
        }

        /* HERO */

        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;

            padding-top: 72px;

            background:
                radial-gradient(
                    circle at 80% 20%,
                    rgba(77,163,255,0.16),
                    transparent 35%
                ),
                radial-gradient(
                    circle at 20% 80%,
                    rgba(120,80,255,0.12),
                    transparent 35%
                );
        }

        .hero-content {
            max-width: 800px;
        }

        .badge {
            display: inline-block;

            padding: 8px 15px;

            border: 1px solid rgba(77,163,255,0.4);
            border-radius: 30px;

            color: #4da3ff;

            background: rgba(77,163,255,0.08);

            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1px;

            margin-bottom: 25px;
        }

        .hero h1 {
            font-size: clamp(48px, 8vw, 82px);
            line-height: 1.05;
            margin-bottom: 25px;
        }

        .hero h1 span {
            color: #4da3ff;
        }

        .hero p {
            color: #aab6c5;
            font-size: 18px;
            max-width: 680px;
            margin-bottom: 35px;
        }

        .buttons {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            padding: 13px 22px;
            border-radius: 8px;
            font-weight: 700;
            transition: 0.3s;
        }

        .btn-primary {
            background: #4da3ff;
            color: #06101d;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
        }

        .btn-secondary {
            border: 1px solid rgba(255,255,255,0.15);
            color: white;
        }

        .btn-secondary:hover {
            border-color: #4da3ff;
            color: #4da3ff;
        }

        /* SECTIONS */

        section {
            padding: 110px 0;
        }

        .label {
            color: #4da3ff;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 2px;
            margin-bottom: 12px;
        }

        .section-title {
            font-size: 42px;
            margin-bottom: 18px;
        }

        .section-description {
            color: #95a3b5;
            max-width: 700px;
            margin-bottom: 45px;
        }

        /* ABOUT */

        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 45px;
        }

        .about-text p {
            color: #aab6c5;
            margin-bottom: 18px;
        }

        .about-card {
            padding: 30px;

            border-radius: 15px;

            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.08);
        }

        .info {
            display: flex;
            justify-content: space-between;

            padding: 15px 0;

            border-bottom: 1px solid rgba(255,255,255,0.07);
        }

        .info:last-child {
            border-bottom: none;
        }

        .info span {
            color: #718096;
        }

        /* SKILLS */

        .skills {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
        }

        .skill {
            padding: 25px;

            border-radius: 13px;

            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.08);

            transition: 0.3s;
        }

        .skill:hover {
            transform: translateY(-5px);
            border-color: rgba(77,163,255,0.5);
        }

        .skill h3 {
            margin-bottom: 8px;
        }

        .skill p {
            color: #8290a2;
            font-size: 13px;
        }

        /* PROJECT */

        .project {
            overflow: hidden;

            border-radius: 18px;

            background: #0b1728;

            border: 1px solid rgba(255,255,255,0.08);
        }

        .diagram {
            padding: 20px;
            background: #030912;
        }

        .diagram img {
            width: 100%;
            max-height: 650px;

            display: block;

            object-fit: contain;

            border-radius: 10px;
        }

        .project-info {
            padding: 35px;
        }

        .project-info h3 {
            font-size: 30px;
            margin-bottom: 15px;
        }

        .project-info p {
            color: #95a3b5;
            margin-bottom: 22px;
        }

        .tags {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .tag {
            padding: 7px 12px;

            border-radius: 20px;

            color: #70b8ff;

            background: rgba(77,163,255,0.08);

            border: 1px solid rgba(77,163,255,0.2);

            font-size: 12px;
        }

        /* CONTACT */

        .contact {
            text-align: center;

            padding: 60px 30px;

            border-radius: 20px;

            background:
                linear-gradient(
                    135deg,
                    rgba(77,163,255,0.12),
                    rgba(120,80,255,0.08)
                );

            border: 1px solid rgba(255,255,255,0.08);
        }

        .contact p {
            color: #95a3b5;
            max-width: 600px;
            margin: 15px auto 30px;
        }

        /* FOOTER */

        footer {
            padding: 30px 0;

            border-top: 1px solid rgba(255,255,255,0.08);

            text-align: center;

            color: #718096;

            font-size: 13px;
        }

        /* RESPONSIVE */

        @media (max-width: 850px) {

            .about-grid {
                grid-template-columns: 1fr;
            }

            .skills {
                grid-template-columns: repeat(2, 1fr);
            }

            .nav-links {
                gap: 15px;
            }
        }

        @media (max-width: 600px) {

            .nav-links {
                display: none;
            }

            .skills {
                grid-template-columns: 1fr;
            }

            .hero h1 {
                font-size: 50px;
            }

            .section-title {
                font-size: 34px;
            }

            section {
                padding: 80px 0;
            }
        }

    </style>
</head>

<body>

<!-- NAVIGATION -->

<nav>

    <div class="container nav-container">

        <a href="#accueil" class="logo">
            ALI<span>.</span>
        </a>

        <ul class="nav-links">

            <li>
                <a href="#accueil">Accueil</a>
            </li>

            <li>
                <a href="#apropos">À propos</a>
            </li>

            <li>
                <a href="#competences">Compétences</a>
            </li>

            <li>
                <a href="#projet">Projet</a>
            </li>

            <li>
                <a href="#contact">Contact</a>
            </li>

        </ul>

    </div>

</nav>


<!-- HERO -->

<section class="hero" id="accueil">

    <div class="container">

        <div class="hero-content">

            <span class="badge">
                DÉVELOPPEUR DIGITAL
            </span>

            <h1>
                Bonjour, je suis
                <span>Ali EL Habib.</span>
            </h1>

            <p>
                Étudiant en développement digital à l'OFPPT de Tanger,
                passionné par le développement web, la programmation
                et la conception de solutions numériques modernes.
            </p>

            <div class="buttons">

                <a href="#projet" class="btn btn-primary">
                    Voir mon projet
                </a>

                <a href="#contact" class="btn btn-secondary">
                    Me contacter
                </a>

            </div>

        </div>

    </div>

</section>


<!-- ABOUT -->

<section id="apropos">

    <div class="container">

        <div class="label">
            01 — À PROPOS
        </div>

        <h2 class="section-title">
            À propos de moi
        </h2>

        <div class="about-grid">

            <div class="about-text">

                <p>
                    Je suis <strong>Ali EL Habib</strong>, étudiant en
                    développement digital à l'OFPPT de Tanger.
                </p>

                <p>
                    Je développe mes compétences dans le domaine du
                    développement web et de la programmation.
                </p>

                <p>
                    Mon objectif est de créer des solutions numériques
                    modernes, simples et efficaces tout en continuant
                    à améliorer mes compétences techniques.
                </p>

            </div>

            <div class="about-card">

                <div class="info">
                    <span>Nom</span>
                    <strong>Ali EL Habib</strong>
                </div>

                <div class="info">
                    <span>Domaine</span>
                    <strong>Développement Digital</strong>
                </div>

                <div class="info">
                    <span>Formation</span>
                    <strong>OFPPT</strong>
                </div>

                <div class="info">
                    <span>Spécialité</span>
                    <strong>Développement Web</strong>
                </div>

            </div>

        </div>

    </div>

</section>


<!-- SKILLS -->

<section id="competences">

    <div class="container">

        <div class="label">
            02 — COMPÉTENCES
        </div>

        <h2 class="section-title">
            Mes compétences
        </h2>

        <p class="section-description">
            Les principales technologies et outils étudiés
            dans mon parcours de développement digital.
        </p>

        <div class="skills">

            <div class="skill">
                <h3>HTML5</h3>
                <p>Création de structures web modernes.</p>
            </div>

            <div class="skill">
                <h3>CSS3</h3>
                <p>Design responsive et interfaces modernes.</p>
            </div>

            <div class="skill">
                <h3>JavaScript</h3>
                <p>Interactions et fonctionnalités dynamiques.</p>
            </div>

            <div class="skill">
                <h3>PHP</h3>
                <p>Développement web côté serveur.</p>
            </div>

            <div class="skill">
                <h3>Python</h3>
                <p>Programmation et développement.</p>
            </div>

            <div class="skill">
                <h3>SQL</h3>
                <p>Gestion des bases de données.</p>
            </div>

            <div class="skill">
                <h3>Git</h3>
                <p>Gestion des versions des projets.</p>
            </div>

            <div class="skill">
                <h3>StarUML</h3>
                <p>Analyse et modélisation UML.</p>
            </div>

        </div>

    </div>

</section>


<!-- PROJECT -->

<section id="projet">

    <div class="container">

        <div class="label">
            03 — PROJET
        </div>

        <h2 class="section-title">
            Conception UML
        </h2>

        <p class="section-description">
            Projet de conception et de modélisation réalisé avec
            StarUML.
        </p>

        <div class="project">

            <div class="diagram">

                <img
                    src="/images/ClassDiagram1.png"
                    alt="Class Diagram UML"
                >

            </div>

            <div class="project-info">

                <h3>
                    Système de gestion académique
                </h3>

                <p>
                    Modélisation d'un système académique permettant
                    de représenter les différentes entités et leurs
                    relations : académie, école, département,
                    enseignant, étudiant, matière et salle.
                </p>

                <div class="tags">

                    <span class="tag">StarUML</span>

                    <span class="tag">UML</span>

                    <span class="tag">
                        Class Diagram
                    </span>

                    <span class="tag">
                        Modélisation
                    </span>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- CONTACT -->

<section id="contact">

    <div class="container">

        <div class="contact">

            <div class="label">
                04 — CONTACT
            </div>

            <h2 class="section-title">
                Me contacter
            </h2>

            <p>
                Vous souhaitez échanger avec moi à propos d'un projet
                ou de mon parcours ? N'hésitez pas à me contacter.
            </p>

            <a
                href="mailto:alilhb20007@gmail.com"
                class="btn btn-primary"
            >
                Envoyer un email
            </a>

        </div>

    </div>

</section>


<!-- FOOTER -->

<footer>

    <div class="container">

        © 2026 Ali EL Habib — Portfolio Développement Digital

    </div>

</footer>

</body>
</html>