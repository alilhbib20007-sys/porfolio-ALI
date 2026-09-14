<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ali El Habib — Développeur Digital</title>

    <meta name="description"
          content="Portfolio professionnel de Ali El Habib, développeur digital spécialisé dans le développement web et les solutions numériques.">

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
            background: #050816;
            color: #ffffff;
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* =========================
           BACKGROUND
        ========================= */

        body::before {
            content: "";
            position: fixed;
            width: 600px;
            height: 600px;
            background: #5b5bf7;
            filter: blur(180px);
            opacity: .15;
            top: -200px;
            left: -200px;
            z-index: -2;
        }

        body::after {
            content: "";
            position: fixed;
            width: 500px;
            height: 500px;
            background: #00d9ff;
            filter: blur(180px);
            opacity: .12;
            right: -150px;
            bottom: -150px;
            z-index: -2;
        }

        /* =========================
           NAVBAR
        ========================= */

        nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 75px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 8%;
            background: rgba(5, 8, 22, .75);
            backdrop-filter: blur(18px);
            border-bottom: 1px solid rgba(255,255,255,.08);
            z-index: 1000;
        }

        .logo {
            font-size: 24px;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .logo span {
            color: #6c63ff;
        }

        .nav-links {
            display: flex;
            gap: 30px;
            list-style: none;
        }

        .nav-links a {
            color: #b8bdd3;
            font-size: 14px;
            transition: .3s;
        }

        .nav-links a:hover {
            color: #ffffff;
        }

        /* =========================
           HERO
        ========================= */

        .hero {
            min-height: 100vh;
            padding: 140px 8% 80px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 60px;
        }

        .hero-content {
            max-width: 650px;
        }

        .badge {
            display: inline-block;
            padding: 9px 16px;
            border: 1px solid rgba(108,99,255,.4);
            border-radius: 50px;
            background: rgba(108,99,255,.08);
            color: #aaa5ff;
            font-size: 13px;
            margin-bottom: 25px;
        }

        .hero h1 {
            font-size: clamp(48px, 7vw, 86px);
            line-height: .95;
            margin-bottom: 25px;
            letter-spacing: -4px;
        }

        .hero h1 span {
            background: linear-gradient(90deg, #6c63ff, #00d9ff);
            -webkit-background-clip: text;
            color: transparent;
        }

        .hero p {
            color: #aeb4c8;
            font-size: 18px;
            line-height: 1.8;
            max-width: 600px;
            margin-bottom: 35px;
        }

        .buttons {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 14px 23px;
            border-radius: 10px;
            font-weight: 600;
            transition: .3s;
        }

        .btn-primary {
            background: linear-gradient(135deg, #6c63ff, #5148dc);
            box-shadow: 0 10px 35px rgba(108,99,255,.25);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(108,99,255,.4);
        }

        .btn-secondary {
            border: 1px solid rgba(255,255,255,.15);
            background: rgba(255,255,255,.03);
        }

        .btn-secondary:hover {
            background: rgba(255,255,255,.08);
        }

        /* =========================
           3D OBJECT
        ========================= */

        .scene {
            width: 360px;
            height: 360px;
            perspective: 900px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .cube {
            width: 210px;
            height: 210px;
            position: relative;
            transform-style: preserve-3d;
            animation: rotateCube 12s infinite linear;
        }

        .face {
            position: absolute;
            width: 210px;
            height: 210px;
            border: 1px solid rgba(255,255,255,.25);
            background: linear-gradient(
                135deg,
                rgba(108,99,255,.35),
                rgba(0,217,255,.08)
            );
            backdrop-filter: blur(10px);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 42px;
            font-weight: 800;
            box-shadow: inset 0 0 40px rgba(108,99,255,.1);
        }

        .front  { transform: translateZ(105px); }
        .back   { transform: rotateY(180deg) translateZ(105px); }
        .right  { transform: rotateY(90deg) translateZ(105px); }
        .left   { transform: rotateY(-90deg) translateZ(105px); }
        .top    { transform: rotateX(90deg) translateZ(105px); }
        .bottom { transform: rotateX(-90deg) translateZ(105px); }

        @keyframes rotateCube {
            from {
                transform: rotateX(-15deg) rotateY(0deg);
            }
            to {
                transform: rotateX(-15deg) rotateY(360deg);
            }
        }

        /* =========================
           SECTIONS
        ========================= */

        section {
            padding: 110px 8%;
        }

        .section-title {
            margin-bottom: 55px;
        }

        .section-title small {
            color: #6c63ff;
            text-transform: uppercase;
            letter-spacing: 3px;
            font-size: 12px;
        }

        .section-title h2 {
            font-size: 42px;
            margin-top: 10px;
        }

        .section-title p {
            color: #8f96ac;
            margin-top: 12px;
        }

        /* =========================
           ABOUT
        ========================= */

        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        .glass-card {
            padding: 35px;
            border-radius: 20px;
            background: rgba(255,255,255,.035);
            border: 1px solid rgba(255,255,255,.08);
            transition: .3s;
        }

        .glass-card:hover {
            transform: translateY(-6px);
            border-color: rgba(108,99,255,.4);
        }

        .glass-card h3 {
            margin-bottom: 15px;
            font-size: 22px;
        }

        .glass-card p {
            color: #a2a8bb;
            line-height: 1.8;
        }

        /* =========================
           SKILLS
        ========================= */

        .skills {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .skill {
            padding: 13px 18px;
            border-radius: 10px;
            background: rgba(255,255,255,.04);
            border: 1px solid rgba(255,255,255,.08);
            color: #dce0ee;
            transition: .3s;
        }

        .skill:hover {
            transform: translateY(-4px);
            border-color: #6c63ff;
        }

        /* =========================
           PROJECTS
        ========================= */

        .projects {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .project {
            min-height: 280px;
            padding: 30px;
            border-radius: 20px;
            background: linear-gradient(
                145deg,
                rgba(255,255,255,.06),
                rgba(255,255,255,.015)
            );
            border: 1px solid rgba(255,255,255,.08);
            transition: .35s;
            position: relative;
            overflow: hidden;
        }

        .project::before {
            content: "";
            position: absolute;
            width: 180px;
            height: 180px;
            background: #6c63ff;
            filter: blur(100px);
            opacity: .1;
            right: -80px;
            top: -80px;
        }

        .project:hover {
            transform: translateY(-10px);
            border-color: rgba(108,99,255,.45);
        }

        .project-number {
            color: #6c63ff;
            font-size: 13px;
            margin-bottom: 40px;
        }

        .project h3 {
            font-size: 24px;
            margin-bottom: 15px;
        }

        .project p {
            color: #9ba1b4;
            line-height: 1.7;
        }

        /* =========================
           CONTACT
        ========================= */

        .contact {
            text-align: center;
            max-width: 800px;
            margin: auto;
        }

        .contact h2 {
            font-size: clamp(38px, 6vw, 65px);
            margin-bottom: 20px;
        }

        .contact p {
            color: #969caf;
            line-height: 1.8;
            margin-bottom: 30px;
        }

        /* =========================
           FOOTER
        ========================= */

        footer {
            padding: 30px 8%;
            text-align: center;
            border-top: 1px solid rgba(255,255,255,.08);
            color: #70778c;
            font-size: 13px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 900px) {

            .hero {
                flex-direction: column;
                text-align: center;
                padding-top: 130px;
            }

            .hero p {
                margin-left: auto;
                margin-right: auto;
            }

            .buttons {
                justify-content: center;
            }

            .about-grid {
                grid-template-columns: 1fr;
            }

            .projects {
                grid-template-columns: 1fr;
            }

            .scene {
                transform: scale(.75);
                margin-top: -30px;
            }

            .nav-links {
                display: none;
            }
        }

        @media (max-width: 500px) {

            section {
                padding: 80px 6%;
            }

            .hero {
                padding-left: 6%;
                padding-right: 6%;
            }

            .hero h1 {
                font-size: 48px;
                letter-spacing: -2px;
            }

            .scene {
                transform: scale(.6);
            }
        }
    </style>
</head>

<body>

<!-- =========================
     NAVIGATION
========================= -->

<nav>

    <div class="logo">
        Ali<span>.</span>
    </div>

    <ul class="nav-links">
        <li><a href="#accueil">Accueil</a></li>
        <li><a href="#apropos">À propos</a></li>
        <li><a href="#competences">Compétences</a></li>
        <li><a href="#projets">Projets</a></li>
        <li><a href="#contact">Contact</a></li>
    </ul>

</nav>


<!-- =========================
     HERO
========================= -->

<main>

<section class="hero" id="accueil">

    <div class="hero-content">

        <div class="badge">
            ● Disponible pour de nouveaux projets
        </div>

        <h1>
            Bonjour, je suis<br>
            <span>Ali El Habib</span>
        </h1>

        <p>
            Développeur digital passionné par la création
            d'expériences web modernes, performantes et
            élégantes. Je transforme les idées en solutions
            numériques concrètes.
        </p>

        <div class="buttons">

            <a href="#projets" class="btn btn-primary">
                Voir mes projets →
            </a>

            <a href="#contact" class="btn btn-secondary">
                Me contacter
            </a>

        </div>

    </div>


    <!-- 3D -->

    <div class="scene">

        <div class="cube">

            <div class="face front">ALI</div>
            <div class="face back">DEV</div>
            <div class="face right">&lt;/&gt;</div>
            <div class="face left">3D</div>
            <div class="face top">WEB</div>
            <div class="face bottom">AI</div>

        </div>

    </div>

</section>


<!-- =========================
     ABOUT
========================= -->

<section id="apropos">

    <div class="section-title">
        <small>01 — À propos</small>
        <h2>Qui suis-je ?</h2>
        <p>Un étudiant passionné par le monde du digital.</p>
    </div>

    <div class="about-grid">

        <div class="glass-card">

            <h3>Mon parcours</h3>

            <p>
                Je suis étudiant en développement digital à
                l'OFPPT de Tanger. Je développe progressivement
                mes compétences dans la programmation, le
                développement web et les technologies numériques.
            </p>

        </div>

        <div class="glass-card">

            <h3>Ma vision</h3>

            <p>
                Mon objectif est de créer des interfaces modernes,
                rapides et accessibles, tout en continuant à
                apprendre et à développer des projets innovants.
            </p>

        </div>

    </div>

</section>


<!-- =========================
     SKILLS
========================= -->

<section id="competences">

    <div class="section-title">

        <small>02 — Compétences</small>

        <h2>Technologies</h2>

        <p>
            Les technologies que j'utilise dans mes projets.
        </p>

    </div>

    <div class="skills">

        <div class="skill">HTML5</div>
        <div class="skill">CSS3</div>
        <div class="skill">JavaScript</div>
        <div class="skill">PHP</div>
        <div class="skill">Python</div>
        <div class="skill">SQL</div>
        <div class="skill">Git</div>
        <div class="skill">GitHub</div>
        <div class="skill">VS Code</div>

    </div>

</section>


<!-- =========================
     PROJECTS
========================= -->

<section id="projets">

    <div class="section-title">

        <small>03 — Projets</small>

        <h2>Mes projets</h2>

        <p>
            Quelques projets réalisés ou actuellement en développement.
        </p>

    </div>


    <div class="projects">


        <div class="project">

            <div class="project-number">
                PROJET 01
            </div>

            <h3>Portfolio Digital</h3>

            <p>
                Création d'un portfolio professionnel moderne
                avec une interface responsive et une expérience
                utilisateur interactive.
            </p>

        </div>


        <div class="project">

            <div class="project-number">
                PROJET 02
            </div>

            <h3>NeuroVid AI</h3>

            <p>
                Concept d'une plateforme automatisée utilisant
                l'intelligence artificielle pour la production
                de contenu vidéo.
            </p>

        </div>


        <div class="project">

            <div class="project-number">
                PROJET 03
            </div>

            <h3>Projet Web</h3>

            <p>
                Application web développée dans le cadre de mon
                apprentissage du développement digital.
            </p>

        </div>


    </div>

</section>


<!-- =========================
     CONTACT
========================= -->

<section id="contact">

    <div class="contact">

        <small style="color:#6c63ff; letter-spacing:3px;">
            04 — CONTACT
        </small>

        <h2>
            Construisons quelque chose
            <span style="color:#6c63ff;">ensemble.</span>
        </h2>

        <p>
            Vous avez une idée, un projet ou simplement envie
            d'échanger ? N'hésitez pas à me contacter.
        </p>

        <div class="buttons" style="justify-content:center;">

            <a
                href="mailto:contact@exemple.com"
                class="btn btn-primary"
            >
                ✉ Me contacter
            </a>

        </div>

    </div>

</section>

</main>


<!-- =========================
     FOOTER
========================= -->

<footer>

    © 2026 Ali El Habib — Développeur Digital

</footer>


<script>

    // Effet 3D suivant la position de la souris
    const cube = document.querySelector(".cube");

    document.addEventListener("mousemove", (e) => {

        if (window.innerWidth < 900) return;

        const x = (window.innerWidth / 2 - e.clientX) / 60;
        const y = (window.innerHeight / 2 - e.clientY) / 60;

        cube.style.animationPlayState = "paused";
        cube.style.transform =
            `rotateX(${-15 + y}deg) rotateY(${x}deg)`;

    });

</script>

</body>
</html>