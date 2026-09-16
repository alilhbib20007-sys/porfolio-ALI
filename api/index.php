<?php
// Portfolio de Ali EL Habib
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ali EL Habib | Digital Developer</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, sans-serif;
            background: #050816;
            color: #ffffff;
            line-height: 1.6;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: auto;
        }

        /* NAVBAR */
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            background: rgba(5, 8, 22, 0.96);
            border-bottom: 1px solid rgba(0, 229, 255, 0.2);
        }

        nav {
            min-height: 75px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .logo {
            font-size: 26px;
            font-weight: bold;
            color: #00e5ff;
        }

        .logo span {
            color: #a855f7;
        }

        .nav-links {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            gap: 22px;
            list-style: none;
        }

        .nav-links a {
            font-size: 14px;
            color: #d1d5db;
            transition: 0.3s;
        }

        .nav-links a:hover {
            color: #00e5ff;
        }

        /* HERO */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding-top: 110px;

            background:
                radial-gradient(
                    circle at top right,
                    rgba(168, 85, 247, 0.2),
                    transparent 35%
                ),
                radial-gradient(
                    circle at bottom left,
                    rgba(0, 229, 255, 0.12),
                    transparent 35%
                );
        }

        .hero-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            gap: 60px;
        }

        .hero h1 {
            font-size: 52px;
            line-height: 1.2;
            margin-bottom: 20px;
        }

        .hero h1 span {
            color: #00e5ff;
        }

        .hero p {
            color: #cbd5e1;
            font-size: 18px;
            max-width: 550px;
            margin-bottom: 30px;
        }

        .hero-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.3s;
            cursor: pointer;
        }

        .btn-primary {
            color: #ffffff;
            background: linear-gradient(90deg, #00e5ff, #a855f7);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 0 20px rgba(0, 229, 255, 0.4);
        }

        .btn-outline {
            color: #00e5ff;
            border: 1px solid #00e5ff;
        }

        .btn-outline:hover {
            background: #00e5ff;
            color: #050816;
        }

        .hero-visual {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .cube {
            width: 260px;
            height: 260px;
            display: flex;
            align-items: center;
            justify-content: center;

            border: 2px solid #00e5ff;
            border-radius: 30px;
            transform: rotate(12deg);

            box-shadow:
                0 0 30px rgba(0, 229, 255, 0.3),
                inset 0 0 30px rgba(168, 85, 247, 0.2);

            color: #00e5ff;
            font-size: 90px;
        }

        /* SECTIONS */
        section {
            padding: 100px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-title h2 {
            font-size: 36px;
            margin-bottom: 10px;
        }

        .section-title h2 span {
            color: #00e5ff;
        }

        .section-title p {
            color: #94a3b8;
        }

        /* ABOUT */
        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        .about-card {
            padding: 30px;
            background: #0b1128;
            border: 1px solid rgba(0, 229, 255, 0.2);
            border-radius: 15px;
        }

        .about-card h3 {
            color: #00e5ff;
            margin-bottom: 15px;
        }

        .about-card p {
            color: #cbd5e1;
        }

        /* SKILLS */
        .skills-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .skill-card {
            padding: 25px;
            text-align: center;
            background: #0b1128;
            border: 1px solid rgba(168, 85, 247, 0.3);
            border-radius: 12px;
            transition: 0.3s;
        }

        .skill-card:hover {
            transform: translateY(-5px);
            border-color: #00e5ff;
        }

        .skill-card h3 {
            color: #00e5ff;
            margin-bottom: 8px;
        }

        .skill-card p {
            color: #cbd5e1;
            font-size: 14px;
        }

        /* PROJECTS */
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
        }

        .project-card {
            overflow: hidden;
            background: #0b1128;
            border: 1px solid rgba(0, 229, 255, 0.2);
            border-radius: 15px;
            transition: 0.3s;
        }

        .project-card:hover {
            transform: translateY(-5px);
            border-color: #00e5ff;
        }

        .project-image {
            width: 100%;
            height: 230px;
            object-fit: contain;
            padding: 15px;
            background: #111827;
        }

        .project-content {
            padding: 25px;
        }

        .project-content h3 {
            color: #00e5ff;
            margin-bottom: 10px;
        }

        .project-content p {
            color: #cbd5e1;
            margin-bottom: 15px;
        }

        .tag {
            display: inline-block;
            padding: 5px 10px;
            margin: 3px;
            border-radius: 5px;
            background: rgba(0, 229, 255, 0.1);
            color: #00e5ff;
            font-size: 12px;
        }

        /* FORMATION */
        .formation-card {
            max-width: 800px;
            margin: auto;
            padding: 35px;
            text-align: center;
            background: #0b1128;
            border: 1px solid rgba(168, 85, 247, 0.3);
            border-radius: 15px;
        }

        .formation-card h3 {
            color: #00e5ff;
            margin-bottom: 10px;
        }

        .formation-card p {
            color: #cbd5e1;
        }

        /* CONTACT */
        .contact-content {
            max-width: 700px;
            margin: auto;
            text-align: center;
        }

        .contact-content p {
            color: #cbd5e1;
            margin-bottom: 25px;
        }

        /* FOOTER */
        footer {
            padding: 25px;
            text-align: center;
            background: #03050e;
            border-top: 1px solid rgba(0, 229, 255, 0.2);
            color: #94a3b8;
        }

        /* RESPONSIVE */
        @media (max-width: 900px) {
            .hero-content,
            .about-content {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .hero p {
                margin-left: auto;
                margin-right: auto;
            }

            .hero-buttons {
                justify-content: center;
            }

            .skills-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .projects-grid {
                grid-template-columns: 1fr;
            }

            nav {
                flex-direction: column;
                justify-content: center;
                padding: 15px 0;
            }
        }

        @media (max-width: 500px) {
            .hero h1 {
                font-size: 36px;
            }

            .section-title h2 {
                font-size: 28px;
            }

            .skills-grid {
                grid-template-columns: 1fr;
            }

            .nav-links {
                gap: 10px;
            }

            .nav-links a {
                font-size: 11px;
            }

            .cube {
                width: 200px;
                height: 200px;
                font-size: 70px;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <header>
        <div class="container">
            <nav>

                <a href="#accueil" class="logo">
                    Ali<span>.</span>
                </a>

                <ul class="nav-links">
                    <li><a href="#accueil">Accueil</a></li>
                    <li><a href="#apropos">À propos</a></li>
                    <li><a href="#competences">Compétences</a></li>
                    <li><a href="#projets">Projets</a></li>
                    <li><a href="#formation">Formation</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>

            </nav>
        </div>
    </header>


    <!-- HERO -->
    <section class="hero" id="accueil">
        <div class="container">

            <div class="hero-content">

                <div>
                    <h1>
                        Bonjour, je suis<br>
                        <span>Ali EL Habib</span>
                    </h1>

                    <p>
                        Étudiant en développement digital,
                        passionné par la programmation web
                        et la création de solutions numériques.
                    </p>

                    <div class="hero-buttons">

                        <a href="#projets" class="btn btn-primary">
                            Voir mes projets
                        </a>

                        <a href="#contact" class="btn btn-outline">
                            Me contacter
                        </a>

                    </div>
                </div>

                <div class="hero-visual">
                    <div class="cube">
                        &lt;/&gt;
                    </div>
                </div>

            </div>

        </div>
    </section>


    <!-- À PROPOS -->
    <section id="apropos">
        <div class="container">

            <div class="section-title">
                <h2>À <span>propos</span></h2>
                <p>Découvrez mon parcours et mes objectifs.</p>
            </div>

            <div class="about-content">

                <div class="about-card">

                    <h3>Qui suis-je ?</h3>

                    <p>
                        Je suis Ali EL Habib, étudiant à l’OFPPT de Tanger
                        dans le domaine du développement digital.
                        Je m’intéresse à la création de sites web,
                        aux applications et aux nouvelles technologies.
                    </p>

                </div>

                <div class="about-card">

                    <h3>Mon objectif</h3>

                    <p>
                        Développer mes compétences techniques,
                        réaliser des projets professionnels
                        et construire des solutions numériques
                        modernes, efficaces et accessibles.
                    </p>

                </div>

            </div>

        </div>
    </section>


    <!-- COMPÉTENCES -->
    <section id="competences">
        <div class="container">

            <div class="section-title">
                <h2>Mes <span>Compétences</span></h2>
                <p>Les technologies que j’étudie.</p>
            </div>

            <div class="skills-grid">

                <div class="skill-card">
                    <h3>HTML</h3>
                    <p>Structure des pages web.</p>
                </div>

                <div class="skill-card">
                    <h3>CSS</h3>
                    <p>Design et responsive design.</p>
                </div>

                <div class="skill-card">
                    <h3>JavaScript</h3>
                    <p>Interactions et fonctionnalités web.</p>
                </div>

                <div class="skill-card">
                    <h3>PHP</h3>
                    <p>Développement côté serveur.</p>
                </div>

                <div class="skill-card">
                    <h3>Python</h3>
                    <p>Programmation et automatisation.</p>
                </div>

                <div class="skill-card">
                    <h3>SQL</h3>
                    <p>Gestion des bases de données.</p>
                </div>

                <div class="skill-card">
                    <h3>Git</h3>
                    <p>Gestion des versions.</p>
                </div>

                <div class="skill-card">
                    <h3>GitHub</h3>
                    <p>Partage et hébergement du code.</p>
                </div>

            </div>

        </div>
    </section>


    <!-- PROJETS -->
    <section id="projets">
        <div class="container">

            <div class="section-title">
                <h2>Mes <span>Projets</span></h2>
                <p>Quelques travaux réalisés pendant ma formation.</p>
            </div>

            <div class="projects-grid">

                <!-- TD1 -->
                <div class="project-card">

                    <img
                        src="/images/class-diagram.png"
                        alt="Diagramme de classes TD1"
                        class="project-image"
                    >

                    <div class="project-content">

                        <h3>TD1 - Diagramme de classes</h3>

                        <p>
                            Réalisation d’un diagramme de classes
                            dans le cadre de ma formation à l’OFPPT.
                        </p>

                        <span class="tag">UML</span>
                        <span class="tag">OFPPT</span>
                        <span class="tag">Modélisation</span>

                    </div>

                </div>


                <!-- TD2 + PDF -->
                <div class="project-card">

                    <img
                        src="/images/ClassDiagram1.png"
                        alt="Diagramme de classes TD2"
                        class="project-image"
                    >

                    <div class="project-content">

                        <h3>TD2 - Diagramme de classes</h3>

                        <p>
                            Travail pratique consacré à la modélisation
                            et à la conception UML.
                        </p>

                        <span class="tag">UML</span>
                        <span class="tag">OFPPT</span>
                        <span class="tag">Conception</span>

                        <br><br>

                        <!-- DOWNLOAD PDF -->
                        <a
                            href="/images/pdf/mini-projet.pdf"
                            class="btn btn-primary"
                            download
                        >
                            ⬇ Télécharger le PDF
                        </a>

                    </div>

                </div>

            </div>

        </div>
    </section>


    <!-- FORMATION -->
    <section id="formation">
        <div class="container">

            <div class="section-title">
                <h2>Ma <span>Formation</span></h2>
                <p>Mon parcours académique.</p>
            </div>

            <div class="formation-card">

                <h3>OFPPT - Tanger</h3>

                <p>
                    Formation en Développement Digital
                </p>

                <p>
                    Apprentissage du développement web,
                    de la programmation et des bases de données.
                </p>

            </div>

        </div>
    </section>


    <!-- CONTACT -->
    <section id="contact">
        <div class="container">

            <div class="section-title">
                <h2>Me <span>Contacter</span></h2>
                <p>N’hésitez pas à me contacter.</p>
            </div>

            <div class="contact-content">

                <p>
                    Vous pouvez me contacter pour discuter
                    d’un projet ou d’une opportunité.
                </p>

                <a
                    href="mailto:contact@example.com"
                    class="btn btn-primary"
                >
                    ✉ Envoyer un email
                </a>

            </div>

        </div>
    </section>


    <!-- FOOTER -->
    <footer>
        <p>
            © 2026 Ali EL Habib. Tous droits réservés.
        </p>
    </footer>

</body>
</html>