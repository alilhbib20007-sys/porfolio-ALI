<?php
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Portfolio | Développeur Digital</title>

    <meta name="description" content="Portfolio professionnel d'un étudiant en développement digital.">
    <meta name="author" content="Ali">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #0a0f1f;
            color: #ffffff;
            line-height: 1.6;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .container {
            width: 90%;
            max-width: 1150px;
            margin: auto;
        }

        /* NAVBAR */
        nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            background: rgba(10, 15, 31, 0.92);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }

        .nav-content {
            height: 75px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #00d9ff;
        }

        .logo span {
            color: #ffffff;
        }

        .nav-links {
            display: flex;
            gap: 30px;
            list-style: none;
        }

        .nav-links a {
            color: #d7dbe8;
            transition: 0.3s;
        }

        .nav-links a:hover {
            color: #00d9ff;
        }

        /* HERO */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding-top: 75px;
            background:
                radial-gradient(circle at 80% 20%, rgba(0,217,255,0.13), transparent 30%),
                radial-gradient(circle at 20% 80%, rgba(120,80,255,0.12), transparent 30%),
                #0a0f1f;
        }

        .hero-content {
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            align-items: center;
            gap: 60px;
        }

        .hero-text h1 {
            font-size: clamp(42px, 6vw, 72px);
            line-height: 1.05;
            margin-bottom: 20px;
        }

        .hero-text h1 span {
            color: #00d9ff;
        }

        .hero-text h2 {
            font-size: 25px;
            color: #aeb7ca;
            margin-bottom: 20px;
            font-weight: 500;
        }

        .hero-text p {
            color: #aeb7ca;
            max-width: 650px;
            font-size: 18px;
            margin-bottom: 30px;
        }

        .buttons {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 13px 24px;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.3s;
            display: inline-block;
        }

        .btn-primary {
            background: #00d9ff;
            color: #07101c;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0,217,255,0.25);
        }

        .btn-secondary {
            border: 1px solid #33405a;
            color: #ffffff;
        }

        .btn-secondary:hover {
            border-color: #00d9ff;
            color: #00d9ff;
        }

        .hero-card {
            width: 280px;
            height: 280px;
            margin: auto;
            border-radius: 50%;
            border: 2px solid #00d9ff;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(145deg, #111a32, #0c1224);
            box-shadow: 0 0 70px rgba(0,217,255,0.15);
        }

        .hero-card-inner {
            text-align: center;
        }

        .hero-card-inner .icon {
            font-size: 70px;
            margin-bottom: 10px;
        }

        .hero-card-inner h3 {
            color: #00d9ff;
        }

        /* SECTIONS */
        section {
            padding: 100px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 55px;
        }

        .section-title h2 {
            font-size: 40px;
            margin-bottom: 12px;
        }

        .section-title span {
            color: #00d9ff;
        }

        .section-title p {
            color: #8f9ab0;
        }

        /* ABOUT */
        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 35px;
        }

        .about-card {
            background: #11182b;
            border: 1px solid #202b44;
            border-radius: 15px;
            padding: 30px;
        }

        .about-card h3 {
            color: #00d9ff;
            margin-bottom: 15px;
            font-size: 23px;
        }

        .about-card p {
            color: #adb6c8;
        }

        /* SKILLS */
        .skills-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .skill {
            background: #11182b;
            border: 1px solid #202b44;
            padding: 25px;
            border-radius: 12px;
            text-align: center;
            transition: 0.3s;
        }

        .skill:hover {
            transform: translateY(-7px);
            border-color: #00d9ff;
        }

        .skill .skill-icon {
            font-size: 35px;
            margin-bottom: 12px;
        }

        .skill h3 {
            font-size: 17px;
        }

        .skill p {
            color: #8995aa;
            font-size: 14px;
            margin-top: 5px;
        }

        /* PROJECTS */
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
        }

        .project-card {
            background: #11182b;
            border: 1px solid #202b44;
            border-radius: 16px;
            overflow: hidden;
            transition: 0.3s;
        }

        .project-card:hover {
            transform: translateY(-7px);
            border-color: #00d9ff;
            box-shadow: 0 15px 40px rgba(0,0,0,0.25);
        }

        .project-content {
            padding: 25px;
        }

        .project-content h3 {
            color: #00d9ff;
            margin-bottom: 10px;
            font-size: 23px;
        }

        .project-content p {
            color: #aab4c7;
            margin-bottom: 20px;
        }

        .project-image {
            width: 100%;
            display: block;
            background: #ffffff;
            cursor: pointer;
            transition: 0.3s;
        }

        .project-image:hover {
            opacity: 0.9;
        }

        .tag {
            display: inline-block;
            padding: 6px 11px;
            background: rgba(0,217,255,0.1);
            color: #00d9ff;
            border-radius: 20px;
            font-size: 13px;
            margin-right: 5px;
        }

        /* EDUCATION */
        .education {
            max-width: 800px;
            margin: auto;
        }

        .education-card {
            background: #11182b;
            border-left: 4px solid #00d9ff;
            padding: 25px;
            margin-bottom: 20px;
            border-radius: 0 12px 12px 0;
        }

        .education-card h3 {
            margin-bottom: 7px;
        }

        .education-card .school {
            color: #00d9ff;
            font-weight: bold;
        }

        .education-card p {
            color: #aab4c7;
            margin-top: 7px;
        }

        /* CONTACT */
        .contact-box {
            max-width: 750px;
            margin: auto;
            text-align: center;
            background: #11182b;
            border: 1px solid #202b44;
            padding: 45px;
            border-radius: 18px;
        }

        .contact-box h3 {
            font-size: 28px;
            margin-bottom: 15px;
        }

        .contact-box p {
            color: #aab4c7;
            margin-bottom: 25px;
        }

        .email {
            display: inline-block;
            margin-bottom: 25px;
            color: #00d9ff;
            font-size: 18px;
        }

        /* FOOTER */
        footer {
            border-top: 1px solid #202b44;
            padding: 30px 0;
            text-align: center;
            color: #77839a;
        }

        footer span {
            color: #00d9ff;
        }

        /* RESPONSIVE */
        @media (max-width: 900px) {
            .hero-content {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .hero-text p {
                margin-left: auto;
                margin-right: auto;
            }

            .buttons {
                justify-content: center;
            }

            .skills-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .projects-grid {
                grid-template-columns: 1fr;
            }

            .about-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 600px) {
            .nav-links {
                display: none;
            }

            .hero-text h1 {
                font-size: 45px;
            }

            .hero-text h2 {
                font-size: 20px;
            }

            .skills-grid {
                grid-template-columns: 1fr;
            }

            section {
                padding: 75px 0;
            }

            .contact-box {
                padding: 30px 20px;
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
            <li><a href="#projets">Projets</a></li>
            <li><a href="#formation">Formation</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>

    </div>
</nav>


<!-- HERO -->
<section class="hero" id="accueil">

    <div class="container hero-content">

        <div class="hero-text">

            <h1>
                Bonjour, je suis <span>Ali</span>
            </h1>

            <h2>
                Étudiant en Développement Digital
            </h2>

            <p>
                Je suis passionné par le développement web et les technologies
                numériques. Je développe progressivement mes compétences afin
                de créer des solutions modernes, efficaces et adaptées aux besoins.
            </p>

            <div class="buttons">
                <a href="#projets" class="btn btn-primary">
                    Voir mes projets
                </a>

                <a href="#contact" class="btn btn-secondary">
                    Me contacter
                </a>
            </div>

        </div>


        <div class="hero-card">

            <div class="hero-card-inner">
                <div class="icon">💻</div>
                <h3>Digital Development</h3>
                <p>Web • Code • Innovation</p>
            </div>

        </div>

    </div>

</section>


<!-- À PROPOS -->
<section id="apropos">

    <div class="container">

        <div class="section-title">
            <h2>À <span>propos</span></h2>
            <p>Découvrez mon parcours et ma passion pour le numérique.</p>
        </div>


        <div class="about-grid">

            <div class="about-card">

                <h3>👨‍💻 Qui suis-je ?</h3>

                <p>
                    Je suis étudiant en Développement Digital.
                    Je m'intéresse particulièrement à la programmation,
                    au développement web et à la création d'interfaces modernes.
                </p>

            </div>


            <div class="about-card">

                <h3>🎯 Mon objectif</h3>

                <p>
                    Mon objectif est de renforcer mes compétences techniques,
                    réaliser des projets concrets et évoluer continuellement
                    dans le domaine du développement digital.
                </p>

            </div>

        </div>

    </div>

</section>


<!-- COMPÉTENCES -->
<section id="competences">

    <div class="container">

        <div class="section-title">
            <h2>Mes <span>compétences</span></h2>
            <p>Les technologies que j'apprends et que j'utilise.</p>
        </div>


        <div class="skills-grid">

            <div class="skill">
                <div class="skill-icon">🌐</div>
                <h3>HTML</h3>
                <p>Structure des pages web</p>
            </div>

            <div class="skill">
                <div class="skill-icon">🎨</div>
                <h3>CSS</h3>
                <p>Design et responsive</p>
            </div>

            <div class="skill">
                <div class="skill-icon">⚡</div>
                <h3>JavaScript</h3>
                <p>Interactivité web</p>
            </div>

            <div class="skill">
                <div class="skill-icon">🐘</div>
                <h3>PHP</h3>
                <p>Développement côté serveur</p>
            </div>

            <div class="skill">
                <div class="skill-icon">🐍</div>
                <h3>Python</h3>
                <p>Programmation</p>
            </div>

            <div class="skill">
                <div class="skill-icon">🗄️</div>
                <h3>SQL</h3>
                <p>Gestion des bases de données</p>
            </div>

            <div class="skill">
                <div class="skill-icon">🔧</div>
                <h3>Git</h3>
                <p>Gestion de versions</p>
            </div>

            <div class="skill">
                <div class="skill-icon">🖥️</div>
                <h3>VS Code</h3>
                <p>Environnement de développement</p>
            </div>

        </div>

    </div>

</section>


<!-- PROJETS -->
<section id="projets">

    <div class="container">

        <div class="section-title">
            <h2>Mes <span>projets</span></h2>
            <p>Travaux et réalisations effectués durant ma formation.</p>
        </div>


        <div class="projects-grid">


            <!-- TD 1 -->
            <div class="project-card">

                <img
                    src="/images/class-diagram.png"
                    alt="TD 1 - Diagramme UML"
                    class="project-image"
                >

                <div class="project-content">

                    <h3>TD 1 — Modélisation UML</h3>

                    <p>
                        Travail pratique consacré à la modélisation
                        d'un système avec un diagramme de classes UML.
                    </p>

                    <span class="tag">UML</span>
                    <span class="tag">StarUML</span>
                    <span class="tag">Modélisation</span>

                </div>

            </div>


            <!-- TD 2 -->
            <div class="project-card">

                <img
                    src="/images/ClassDiagram1.png"
                    alt="TD 2 - Diagramme UML"
                    class="project-image"
                >

                <div class="project-content">

                    <h3>TD 2 — Modélisation UML</h3>

                    <p>
                        Deuxième travail pratique de modélisation
                        réalisé avec StarUML afin de représenter
                        les différentes classes et leurs relations.
                    </p>

                    <span class="tag">UML</span>
                    <span class="tag">StarUML</span>
                    <span class="tag">Diagramme de classes</span>

                </div>

            </div>


        </div>

    </div>

</section>


<!-- FORMATION -->
<section id="formation">

    <div class="container">

        <div class="section-title">
            <h2>Ma <span>formation</span></h2>
            <p>Mon parcours académique.</p>
        </div>


        <div class="education">

            <div class="education-card">

                <h3>Développement Digital</h3>

                <div class="school">
                    OFPPT — Tanger
                </div>

                <p>
                    Formation orientée vers le développement web,
                    la programmation, les bases de données,
                    la conception et les technologies numériques.
                </p>

            </div>


            <div class="education-card">

                <h3>Compétences développées</h3>

                <p>
                    HTML, CSS, JavaScript, PHP, Python, SQL,
                    Git, GitHub, UML et outils de développement.
                </p>

            </div>

        </div>

    </div>

</section>


<!-- CONTACT -->
<section id="contact">

    <div class="container">

        <div class="section-title">
            <h2>Me <span>contacter</span></h2>
            <p>Vous souhaitez échanger avec moi ?</p>
        </div>


        <div class="contact-box">

            <h3>Travaillons ensemble</h3>

            <p>
                Pour toute question, proposition ou opportunité,
                n'hésitez pas à me contacter.
            </p>

            <a
                href="mailto:alilhb20007@gmail.com"
                class="email"
            >
                alilhb20007@gmail.com
            </a>

            <br>

            <a
                href="mailto:alilhb20007@gmail.com"
                class="btn btn-primary"
            >
                Envoyer un message
            </a>

        </div>

    </div>

</section>


<!-- FOOTER -->
<footer>

    <div class="container">

        <p>
            © 2026 <span>Ali</span> — Portfolio Développement Digital.
        </p>

    </div>

</footer>

</body>
</html>