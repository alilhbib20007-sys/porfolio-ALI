<?php
$pageTitle = 'Modules';
$pageDesc  = "Les modules de ma formation en développement digital à l'OFPPT : séances, exercices, ateliers et dépôts GitHub.";
require API_DIR . '/includes/header.php';
?>
<section class="page-hero modules-page">
    <div class="container">
        <div class="section-title">
            <h1>Mes <span>Modules</span></h1>
            <p>Les séances de ma formation, classées par module : exercices, ateliers et dépôts GitHub.</p>
        </div>

        <nav class="module-jump" aria-label="Aller au module">
            <?php foreach (modules() as $i => $module): ?>
                <a href="#<?= e($module['id']) ?>"><?= e($module['code']) ?> · <?= e($module['titre']) ?></a>
            <?php endforeach; ?>
        </nav>

        <div class="modules">
            <?php foreach (modules() as $i => $module) { echo render_module($module, $i + 1); } ?>
        </div>
    </div>
</section>
<?php require API_DIR . '/includes/footer.php'; ?>
