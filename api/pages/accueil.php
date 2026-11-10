<?php

require API_DIR . '/includes/header.php';
?>

<!-- HERO -->
<section class="hero" id="accueil">
    <div class="container">
        <div class="hero-content">
            <div>
                <h1>Bonjour, je suis<br><span>Ali EL Habib</span></h1>
                <p>
                    Étudiant en développement digital, passionné par la programmation web
                    et la création de solutions numériques.
                </p>
                <div class="hero-buttons">
                    <a href="/modules" class="btn btn-primary">Voir mes modules</a>
                    <a href="#contact" class="btn btn-outline">Me contacter</a>
                </div>
            </div>
            <div class="hero-visual"><div class="cube">&lt;/&gt;</div></div>
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
                    Je suis Ali EL Habib, étudiant à l'OFPPT de Tanger dans le domaine du développement digital.
                    Je m'intéresse à la création de sites web, aux applications et aux nouvelles technologies.
                </p>
            </div>
            <div class="about-card">
                <h3>Mon objectif</h3>
                <p>
                    Développer mes compétences techniques, réaliser des projets professionnels
                    et construire des solutions numériques modernes, efficaces et accessibles.
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
            <p>Les technologies que j'étudie.</p>
        </div>
        <div class="skills-grid">
            <?php
            $skills = [
                'HTML'       => 'Structure des pages web.',
                'CSS'        => 'Design et responsive design.',
                'JavaScript' => 'Interactions et fonctionnalités web.',
                'PHP'        => 'Développement côté serveur.',
                'Python'     => 'Programmation et automatisation.',
                'SQL'        => 'Gestion des bases de données.',
                'Git'        => 'Gestion des versions.',
                'GitHub'     => 'Partage et hébergement du code.',
            ];
            foreach ($skills as $name => $desc): ?>
                <div class="skill-card">
                    <h3><?= e($name) ?></h3>
                    <p><?= e($desc) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- MODULES : aperçu, lien vers /modules -->
<section id="explorer">
    <div class="container">
        <div class="section-title">
            <h2>Mes <span>Modules</span></h2>
            <p>Mon travail pendant la formation, classé par module.</p>
        </div>
        <div class="explore-grid">
            <?php foreach (modules() as $module): ?>
                <a class="explore-card" href="/modules#<?= e($module['id']) ?>">
                    <span class="explore-count"><?= nb_seances($module) ?></span>
                    <span class="explore-unit">séances</span>
                    <h3><?= e($module['code']) ?> · <?= e($module['titre']) ?></h3>
                    <p><?= e($module['sous_titre']) ?></p>
                </a>
            <?php endforeach; ?>
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
            <p>Formation en Développement Digital</p>
            <p>Apprentissage du développement web, de la programmation et des bases de données.</p>
        </div>
    </div>
</section>

<!-- CONTACT -->
<section id="contact">
    <div class="container">
        <div class="section-title">
            <h2>Me <span>Contacter</span></h2>
            <p>N'hésitez pas à me contacter.</p>
        </div>
        <div class="contact-content">
            <p>Vous pouvez me contacter pour discuter d'un projet ou d'une opportunité.</p>
            <a href="mailto:<?= e($SITE['email']) ?>" class="btn btn-primary">✉ Envoyer un email</a>
        </div>
    </div>
</section>

<?php require API_DIR . '/includes/footer.php'; ?>
