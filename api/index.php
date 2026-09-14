<?php
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ali EL Habib — Développeur Digital</title>

    <meta name="description" content="Portfolio de Ali EL Habib, développeur digital spécialisé dans le développement web.">

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
            color: #f5f7fa;
            line-height: 1.6;
        }

        a {
            color: inherit;
            text-decoration: none;
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
            z-index: 1000;
            background: rgba(7, 17, 31, 0.88);
            backdrop-filter: blur(15px);
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }

        .nav-content {
            height: 75px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 24px;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .logo span {
            color: #4da3ff;
        }

        .nav-links {
            display: flex;
            gap: 30px;
            list-style: none;
        }

        .nav-links a {
            color: #b9c5d4;
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
            padding-top: 75px;
            background:
                radial-gradient(circle at 80% 20%, rgba(77,163,255,0.16), transparent 35%),
                radial-gradient(circle at 20% 80%, rgba(120,80,255,0.12), transparent 35%);
        }

        .hero-content {
            max-width: 800px;
        }

        .tag {
            display: inline-block;
            padding: 8px 15px;
            border: 1px solid rgba(77,163,255,0.35);
            border-radius: 30px;
            color: #4da3ff;
            background: rgba(77,163,255,0.08);
            font-size: 13px;
            margin-bottom: 25px;
        }

        .hero h1 {
            font-size: clamp(48px, 8vw, 85px);
            line-height: 1;
            margin-bottom: 25px;
        }

        .hero h1 span {
            color: #4da3ff;
        }

        .hero p {
            color: #aeb9c8;
            font-size: 19px;
            max-width: 650px;
            margin-bottom: 35px;
        }

        .buttons {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn {
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
            color: #fff;
        }

        .btn-secondary:hover {
            border-color: #4da3ff;
            color: #4da3ff;
        }

        /* SECTIONS */

        section {
            padding: 110px 0;
        }

        .section-label {
            color: #4da3ff;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 2px;
            margin-bottom: 12px;
        }

        .section-title {
            font-size: 42px;
            margin-bottom: 20px;
        }

        .section-description {
            color: #9eabbc;
            max-width: 700px;
            margin-bottom: 45px;
        }

        /* ABOUT */

        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
        }

        .about-text p {
            color: #aeb9c8;
            margin-bottom: 20px;
        }

        .info-card {
            padding: 30px;
            border: 1px solid rgba(255,255,255,0.08);
            background: rgba(255,255,255,0.03);
            border-radius: 15px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding: 15px 0;
            border-bottom: 1px solid rgba(255,255,255,0.07);
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-row span:first-child {
            color: #7f8c9e;
        }

        /* SKILLS */

        .skills-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
        }

        .skill {
            padding: 25px;
            border-radius: 12px;
            border: 1px solid rgba(255,255,255,0.08);
            background: rgba(255,255,255,0.03);
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
            color: #8795a7;
            font-size: 14px;
        }

        /* PROJECT */

        .project-card {
            overflow: hidden;
            border-radius: 18px;
            border: 1px solid rgba(255,255,255,0.09);
            background: #0b1728;
        }

        .project-image {
            width: 100%;
            background: #030912;
            padding: 20px;
        }

        .project-image img {
            display: block;
            width: 100%;
            max-height: 600px;
            object-fit: contain;
            border-radius: 10px;
        }

        .project-content {
            padding: 35px;
        }

        .project-content h3 {
            font-size: 30px;
            margin-bottom: 15px;
        }

        .project-content p {
            color: #9eabbc;
            max-width: 800px;
            margin-bottom: 20px;
        }

        .technologies {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 25px;
        }

        .tech {
            padding: 7px 12px;
            background: rgba(77,163,255,0.1);
            border: 1px solid rgba(77,163,255,0.2);
            border-radius: 20px;
            color: #6eb5ff;
            font-size: 12px;
        }

        /* CONTACT */

        .contact-box {
            text-align: center;
            padding: 60px 30px;
            border-radius: 20px;
            background: linear-gradient(
                135deg,
                rgba(77,163,255,0.12),
                rgba(120,80,255,0.08)
            );
            border: 1px solid rgba(255,255,255,0.08);
        }

        .contact-box p {
            color: #9eabbc;
            margin: 15px auto 30px;
            max-width: 600px;
        }

        /* FOOTER */

        footer {
            padding: 30px 0;
            border-top: 1px solid rgba(255,255,255,0.08);
            color: #738093;
            text-align: center;
            font-size: 13px;
        }

        /* MOBILE */

        @media (max-width: 800px) {

            .nav-links {
                gap: 12px;
            }

            .nav-links a {
                font-size: 12px;
            }

            .about-grid {
                grid-template-columns: 1fr;
            }

            .skills-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .hero h1 {
                font-size: 55px;
            }

            .section-title {
                font-size: 34px;
            }
        }

        @media (max-width: 500px) {

            .nav-content {
                height: 65px;
            }

            .logo {
                font-size: 19px;
            }

            .nav-links {
                display: none;
            }

            .skills-grid {
                grid-template-columns: 1fr;
            }

            .hero p {
                font-size: 16px;
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
    <div class="container nav-content">

        <a href="#accueil" class="logo">
            ALI<span>.</span>
        </a>

        <ul class="nav-links">
            <li><a href="#accueil">Accueil</a></li>
            <li><a href="#apropos">À propos</a></li>
            <li><a href="#competences">Compétences</a></li>
            <li><a href="#projets">Projet</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>

    </div>
</nav>


<!-- HERO -->

<section class="hero" id="accueil">

    <div class="container">

        <div class="hero-content">

            <span class="tag">
                DÉVELOPPEUR DIGITAL
            </span>

            <h1>
                Bonjour, je suis<br>
                <span>Ali EL Habib.</span>
            </h1>

            <p>
                Étudiant en développement digital, passionné par la
                création d'interfaces web modernes, la programmation
                et la conception de solutions numériques.
            </p>

            <div class="buttons">
                <a href="#projets" class="btn btn-primary">
                    Voir mon projet
                </a>

                <a href="#contact" class="btn btn-secondary">
                    Me contacter
                </a>
            </div>

        </div>

    </div>

</section>


<!-- À PROPOS -->

<section id="apropos">

    <div class="container">

        <div class="section-label">
            01 — À PROPOS
        </div>

        <h2 class="section-title">
            Qui suis-je ?
        </h2>

        <div class="about-grid">

            <div class="about-text">

                <p>
                    Je suis <strong>Ali EL Habib</strong>, étudiant en
                    développement digital à l'OFPPT de Tanger.
                </p>

                <p>
                    Je m'intéresse particulièrement au développement
                    web et à la conception d'applications modernes,
                    avec une approche orientée vers la simplicité,
                    la performance et l'expérience utilisateur.
                </p>

                <p>
                    Mon objectif est de continuer à développer mes
                    compétences techniques et de construire des
                    projets numériques professionnels.
                </p>

            </div>

            <div class="info-card">

                <div class="info-row">
                    <span>Nom</span>
                    <strong>Ali EL Habib</strong>
                </div>

                <div class="info-row">
                    <span>Domaine</span>
                    <strong>Développement Digital</strong>
                </div>

                <div class="info-row">
                    <span>Formation</span>
                    <strong>OFPPT</strong>
                </div>

                <div class="info-row">
                    <span>Spécialité</span>
                    <strong>Développement Web</strong>
                </div>

            </div>

        </div>

    </div>

</section>


<!-- COMPÉTENCES -->

<section id="competences">

    <div class="container">

        <div class="section-label">
            02 — COMPÉTENCES
        </div>

        <h2 class="section-title">
            Technologies
        </h2>

        <p class="section-description">
            Les principales technologies et outils que j'utilise
            dans mon parcours de développement digital.
        </p>

        <div class="skills-grid">

            <div class="skill">
                <h3>HTML5</h3>
                <p>Structure et intégration des interfaces web.</p>
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
                <p>Développement côté serveur et logique web.</p>
            </div>

            <div class="skill">
                <h3>Python</h3>
                <p>Programmation et développement de solutions.</p>
            </div>

            <div class="skill">
                <h3>SQL</h3>
                <p>Gestion et manipulation des bases de données.</p>
            </div>

            <div class="skill">
                <h3>Git</h3>
                <p>Gestion des versions et suivi des projets.</p>
            </div>

            <div class="skill">
                <h3>StarUML</h3>
                <p>Analyse, modélisation et conception UML.</p>
            </div>

        </div>

    </div>

</section>


<!-- PROJET -->

<section id="projets">

    <div class="container">

        <div class="section-label">
            03 — PROJET
        </div>

        <h2 class="section-title">
            Projet de conception UML
        </h2>

        <p class="section-description">
            Un projet de modélisation réalisé avec StarUML pour
            analyser et représenter la structure d'une application.
        </p>


        <div class="project-card">

            <div class="project-image">

                <img
                    src="/images/class-diagram.png"
                    alt="Diagramme de classes UML réalisé avec StarUML"
                >

            </div>


            <div class="project-content">

                <h3>
                    Système de gestion académique
                </h3>

                <p>
                    Conception d'un système académique permettant
                    de représenter les relations entre l'académie,
                    les écoles, les départements, les enseignants,
                    les étudiants, les matières et les salles.
                </p>

                <div class="technologies">

                    <span class="tech">StarUML</span>
                    <span class="tech">UML</span>
                    <span class="tech">Diagramme de classes</span>
                    <span class="tech">Modélisation</span>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- CONTACT -->

<section id="contact">

    <div class="container">

        <div class="contact-box">

            <div class="section-label">
                04 — CONTACT
            </div>

            <h2 class="section-title">
                Travaillons ensemble
            </h2>

            <p>
                Vous souhaitez échanger avec moi à propos d'un projet
                ou de mon parcours ? N'hésitez pas à me contacter.
            </p>

            <a
                href="mailto:alilhb20007@gmail.com"
                class="btn btn-primary"
            >
                Me contacter
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