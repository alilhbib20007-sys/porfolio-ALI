<?php
// Fonctions utilitaires partagées par toutes les pages

/** Échappe le texte pour l'affichage HTML (protection XSS). */
function e($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

/** Charge un fichier de données (data/xxx.php qui retourne un tableau). */
function load_data($name)
{
    $file = API_DIR . '/data/' . $name . '.php';
    return is_file($file) ? require $file : [];
}

/** Affiche une carte (TD, mini projet ou contrôle). */
function render_card(array $it)
{
    $module = isset($it['module']) ? $it['module'] : '';
    $tags   = isset($it['tags']) ? $it['tags'] : [];
    $search = strtolower($it['titre'] . ' ' . $module . ' ' . implode(' ', $tags));
    ob_start();
    ?>
    <article class="card" data-module="<?= e($module) ?>" data-search="<?= e($search) ?>">
        <?php if (!empty($it['image'])): ?>
            <a href="<?= e($it['image']) ?>" target="_blank" rel="noopener">
                <img class="card-img" src="<?= e($it['image']) ?>" alt="<?= e($it['titre']) ?>" loading="lazy">
            </a>
        <?php else: ?>
            <div class="card-img card-placeholder">&lt;/&gt;</div>
        <?php endif; ?>

        <div class="card-body">
            <?php if ($module !== ''): ?>
                <span class="badge"><?= e($module) ?></span>
            <?php endif; ?>
            <h3><?= e($it['titre']) ?></h3>

            <?php if (!empty($it['meta'])): ?>
                <p class="card-meta"><?= e($it['meta']) ?></p>
            <?php endif; ?>

            <?php if (!empty($it['description'])): ?>
                <p><?= e($it['description']) ?></p>
            <?php endif; ?>

            <div>
                <?php foreach ($tags as $tag): ?>
                    <span class="tag"><?= e($tag) ?></span>
                <?php endforeach; ?>
            </div>

            <div class="card-actions">
                <?php if (!empty($it['pdf'])): ?>
                    <a class="btn btn-outline btn-sm" href="<?= e($it['pdf']) ?>" target="_blank" rel="noopener">Voir</a>
                    <a class="btn btn-primary btn-sm" href="<?= e($it['pdf']) ?>" download>⬇ PDF</a>
                <?php endif; ?>
                <?php if (!empty($it['correction'])): ?>
                    <a class="btn btn-outline btn-sm" href="<?= e($it['correction']) ?>" target="_blank" rel="noopener">Correction</a>
                <?php endif; ?>
                <?php if (!empty($it['lien'])): ?>
                    <a class="btn btn-outline btn-sm" href="<?= e($it['lien']) ?>" target="_blank" rel="noopener">Code source</a>
                <?php endif; ?>
            </div>
        </div>
    </article>
    <?php
    return ob_get_clean();
}

/** Affiche une page complète de liste avec recherche + filtre par module. */
function render_listing($title, $intro, array $items)
{
    $modules = [];
    foreach ($items as $it) {
        if (!empty($it['module'])) {
            $modules[$it['module']] = true;
        }
    }
    $modules = array_keys($modules);
    ?>
    <section class="page-hero">
        <div class="container">
            <div class="section-title">
                <h1><?= e($title) ?></h1>
                <p><?= e($intro) ?></p>
            </div>

            <?php if (count($items) > 0): ?>
                <div class="filters">
                    <input type="search" id="searchInput" placeholder="Rechercher…" aria-label="Rechercher">
                    <?php if (count($modules) > 0): ?>
                        <button class="filter-btn active" data-filter="all">Tous</button>
                        <?php foreach ($modules as $m): ?>
                            <button class="filter-btn" data-filter="<?= e($m) ?>"><?= e($m) ?></button>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <div class="cards-grid" id="cardsGrid">
                    <?php foreach ($items as $it) { echo render_card($it); } ?>
                </div>
                <p class="empty" id="emptyMsg" hidden>Aucun résultat.</p>
            <?php else: ?>
                <p class="empty">Rien à afficher pour le moment. Revenez bientôt !</p>
            <?php endif; ?>
        </div>
    </section>
    <?php
}
