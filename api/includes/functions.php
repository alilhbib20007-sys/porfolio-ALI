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

/** Modules de la formation (data/modules.php), mis en cache. */
function modules()
{
    static $modules = null;
    if ($modules === null) {
        $modules = load_data('modules');
    }
    return $modules;
}

/** Pages d'exercice (data/pages.php), mises en cache. */
function pages()
{
    static $pages = null;
    if ($pages === null) {
        $pages = load_data('pages');
    }
    return $pages;
}

/** URL d'une page d'exercice. */
function page_url($slug)
{
    return '/modules/' . $slug;
}

/** Chemin du texte détaillé d'une page (facultatif). */
function content_path($slug)
{
    return API_DIR . '/content/' . $slug . '.html';
}

/**
 * Liste ordonnée des pages internes, dans l'ordre où elles apparaissent dans les modules,
 * avec leur module et leur section : [slug => ['module' => [...], 'section' => [...]]].
 */
function pages_ordonnees()
{
    $ordre = [];
    foreach (modules() as $module) {
        foreach ($module['sections'] as $section) {
            foreach ($section['cartes'] as $carte) {
                foreach ($carte['liens'] as $lien) {
                    if (!empty($lien['page']) && !isset($ordre[$lien['page']]) && isset(pages()[$lien['page']])) {
                        $ordre[$lien['page']] = ['module' => $module, 'section' => $section];
                    }
                }
            }
        }
    }
    return $ordre;
}

/** Nombre de séances (cartes) d'un module. */
function nb_seances(array $module)
{
    $n = 0;
    foreach ($module['sections'] as $section) {
        $n += count($section['cartes']);
    }
    return $n;
}

/** Affiche une carte "séance" avec ses liens. */
function render_seance(array $carte)
{
    ob_start();
    ?>
    <div class="seance">
        <p class="seance-titre"><?= e($carte['titre']) ?></p>
        <?php foreach ($carte['liens'] as $lien): ?>
            <?php if (!empty($lien['page'])): ?>
                <a class="seance-lien" href="<?= e(page_url($lien['page'])) ?>"><?= e($lien['texte']) ?></a>
            <?php else: ?>
                <a class="seance-lien externe" href="<?= e($lien['url']) ?>" target="_blank" rel="noopener"><?= e($lien['texte']) ?> ↗</a>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <?php
    return ob_get_clean();
}

/** Affiche un module complet (en-tête, sections et cartes). */
function render_module(array $module, $numero)
{
    ob_start();
    ?>
    <article class="module" id="<?= e($module['id']) ?>">
        <div class="module-head">
            <div class="module-title-row">
                <span class="module-code">Module <?= (int) $numero ?> · <?= e($module['code']) ?></span>
                <h2><?= e($module['titre']) ?></h2>
            </div>
            <span class="module-count"><?= nb_seances($module) ?> séances</span>
        </div>
        <?php if (!empty($module['sous_titre'])): ?>
            <p class="module-sub"><?= e($module['sous_titre']) ?></p>
        <?php endif; ?>
        <?php if (!empty($module['description'])): ?>
            <p class="module-desc"><?= e($module['description']) ?></p>
        <?php endif; ?>

        <?php foreach ($module['sections'] as $section): ?>
            <div class="module-section">
                <div class="section-label">
                    <span class="pill"><?= e($section['badge']) ?></span>
                    <span class="section-name"><?= e($section['titre']) ?></span>
                </div>
                <div class="seances">
                    <?php foreach ($section['cartes'] as $carte) { echo render_seance($carte); } ?>
                </div>
            </div>
        <?php endforeach; ?>
    </article>
    <?php
    return ob_get_clean();
}
