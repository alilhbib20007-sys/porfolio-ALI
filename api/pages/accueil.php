<?php
$nbMini = count(load_data('mini-projets'));
$nbTd   = count(load_data('td'));
$nbCtl  = count(load_data('controles'));

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
                    <a href="#explorer" class="btn btn-primary">Voir mon travail</a>
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

<!-- EXPLORER : liens vers les 3 pages -->
<section id="explorer">
    <div class="container">
        <div class="section-title">
            <h2>Mon <span>Travail</span></h2>
            <p>Parcourez mes réalisations pendant la formation.</p>
        </div>
        <div class="explore-grid">
            <a class="explore-card" href="/mini-projets">
                <span class="explore-count"><?= $nbMini ?></span>
                <h3>Mini Projets</h3>
                <p>Mes petits projets pratiques.</p>
            </a>
            <a class="explore-card" href="/td">
                <span class="explore-count"><?= $nbTd ?></span>
                <h3>TD</h3>
                <p>Tous mes travaux dirigés.</p>
            </a>
            <a class="explore-card" href="/controles">
                <span class="explore-count"><?= $nbCtl ?></span>
                <h3>Contrôles</h3>
                <p>Énoncés et corrections par module.</p>
            </a>
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
