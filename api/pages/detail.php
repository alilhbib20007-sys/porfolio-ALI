<?php
// Page de détail d'un élément : /td/<slug>, /mini-projets/<slug>, /controles/<slug>
// Le contenu est un fragment HTML : api/content/<section>/<slug>.html

$section = (string) ($_GET['section'] ?? '');
$slug    = (string) ($_GET['slug'] ?? '');
$labels  = sections();

$found = (isset($labels[$section]) && preg_match('/^[a-z0-9-]+$/', $slug))
    ? find_item($section, $slug)
    : null;

if (!$found || !is_file(content_path($section, $slug))) {
    http_response_code(404);
    require API_DIR . '/pages/404.php';
    return;
}

list($it, $pos, $items) = $found;
$contenu = file_get_contents(content_path($section, $slug));

// Sommaire construit à partir des titres <h2 id="..."> du contenu
$sommaire = [];
if (preg_match_all('/<h2 id="([^"]+)">(.*?)<\/h2>/s', $contenu, $m, PREG_SET_ORDER)) {
    foreach ($m as $h) {
        $sommaire[] = ['id' => $h[1], 'titre' => trim(strip_tags($h[2]))];
    }
}

// Éléments précédent / suivant qui ont aussi une page de détail
$precedent = null;
$suivant   = null;
for ($i = $pos - 1; $i >= 0; $i--) {
    if (detail_url($section, $items[$i])) { $precedent = $items[$i]; break; }
}
for ($i = $pos + 1; $i < count($items); $i++) {
    if (detail_url($section, $items[$i])) { $suivant = $items[$i]; break; }
}

$images = !empty($it['images']) ? $it['images'] : (!empty($it['image']) ? [$it['image']] : []);

$pageTitle = $it['titre'];
$pageDesc  = isset($it['description']) ? $it['description'] : null;
require API_DIR . '/includes/header.php';
?>
<section class="page-hero detail">
    <div class="container">

        <nav class="breadcrumb" aria-label="Fil d'Ariane">
            <a href="/">Accueil</a>
            <span>›</span>
            <a href="/<?= e($section) ?>"><?= e($labels[$section]) ?></a>
            <span>›</span>
            <span class="current"><?= e($it['titre']) ?></span>
        </nav>

        <div class="detail-head">
            <?php if (!empty($it['module'])): ?>
                <span class="badge"><?= e($it['module']) ?></span>
            <?php endif; ?>
            <h1><?= e($it['titre']) ?></h1>
            <?php if (!empty($it['description'])): ?>
                <p class="detail-desc"><?= e($it['description']) ?></p>
            <?php endif; ?>
            <div class="detail-tags">
                <?php foreach (isset($it['tags']) ? $it['tags'] : [] as $tag): ?>
                    <span class="tag"><?= e($tag) ?></span>
                <?php endforeach; ?>
            </div>
            <div class="card-actions">
                <?php if (!empty($it['lien'])): ?>
                    <a class="btn btn-primary btn-sm" href="<?= e($it['lien']) ?>" target="_blank" rel="noopener">Code source sur GitHub ↗</a>
                <?php endif; ?>
                <?php if (!empty($it['demo'])): ?>
                    <a class="btn btn-outline btn-sm" href="<?= e($it['demo']) ?>" target="_blank" rel="noopener">Voir l'application ↗</a>
                <?php endif; ?>
                <a class="btn btn-outline btn-sm" href="/<?= e($section) ?>">← Retour aux <?= e($labels[$section]) ?></a>
            </div>
        </div>

        <?php if ($images): ?>
            <div class="detail-gallery">
                <?php foreach ($images as $img): ?>
                    <a href="<?= e($img) ?>" target="_blank" rel="noopener">
                        <img src="<?= e($img) ?>" alt="<?= e($it['titre']) ?>" loading="lazy">
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="detail-layout">
            <?php if (count($sommaire) > 1): ?>
                <aside class="toc">
                    <p class="toc-title">Sommaire</p>
                    <ol>
                        <?php foreach ($sommaire as $s): ?>
                            <li><a href="#<?= e($s['id']) ?>"><?= e($s['titre']) ?></a></li>
                        <?php endforeach; ?>
                    </ol>
                </aside>
            <?php endif; ?>

            <article class="prose">
                <?= $contenu /* contenu écrit par moi, généré depuis Markdown */ ?>
            </article>
        </div>

        <nav class="pager" aria-label="Navigation entre les éléments">
            <?php if ($precedent): ?>
                <a class="pager-link prev" href="<?= e(detail_url($section, $precedent)) ?>">
                    <span>← Précédent</span>
                    <strong><?= e($precedent['titre']) ?></strong>
                </a>
            <?php else: ?>
                <span></span>
            <?php endif; ?>
            <?php if ($suivant): ?>
                <a class="pager-link next" href="<?= e(detail_url($section, $suivant)) ?>">
                    <span>Suivant →</span>
                    <strong><?= e($suivant['titre']) ?></strong>
                </a>
            <?php endif; ?>
        </nav>

    </div>
</section>
<?php require API_DIR . '/includes/footer.php'; ?>
