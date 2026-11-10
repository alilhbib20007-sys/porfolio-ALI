<?php
// Page d'un exercice : /modules/<slug>
// Données : data/pages.php ; texte détaillé facultatif : content/<slug>.html

$slug   = (string) ($_GET['slug'] ?? '');
$ordre  = pages_ordonnees();
$pages  = pages();

if (!preg_match('/^[a-z0-9-]+$/', $slug) || !isset($ordre[$slug])) {
    http_response_code(404);
    require API_DIR . '/pages/404.php';
    return;
}

$it      = $pages[$slug];
$module  = $ordre[$slug]['module'];
$section = $ordre[$slug]['section'];
$contenu = is_file(content_path($slug)) ? file_get_contents(content_path($slug)) : '';

// Sommaire construit à partir des titres <h2 id="..."> du contenu
$sommaire = [];
if ($contenu && preg_match_all('/<h2 id="([^"]+)">(.*?)<\/h2>/s', $contenu, $m, PREG_SET_ORDER)) {
    foreach ($m as $h) {
        $sommaire[] = ['id' => $h[1], 'titre' => trim(strip_tags($h[2]))];
    }
}

// Exercice précédent / suivant (dans l'ordre des modules)
$slugs     = array_keys($ordre);
$pos       = array_search($slug, $slugs, true);
$precedent = $pos > 0 ? $slugs[$pos - 1] : null;
$suivant   = $pos < count($slugs) - 1 ? $slugs[$pos + 1] : null;

$images = isset($it['images']) ? $it['images'] : [];

$pageTitle = $it['titre'];
$pageDesc  = isset($it['description']) ? $it['description'] : null;
require API_DIR . '/includes/header.php';
?>
<section class="page-hero detail">
    <div class="container">

        <nav class="breadcrumb" aria-label="Fil d'Ariane">
            <a href="/">Accueil</a>
            <span>›</span>
            <a href="/modules">Modules</a>
            <span>›</span>
            <a href="/modules#<?= e($module['id']) ?>"><?= e($module['code']) ?> · <?= e($module['titre']) ?></a>
            <span>›</span>
            <span class="current"><?= e($it['titre']) ?></span>
        </nav>

        <div class="detail-head">
            <span class="pill"><?= e($section['badge']) ?></span>
            <span class="badge"><?= e($module['code']) ?> · <?= e($module['titre']) ?></span>
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
                <?php if (!empty($it['demo'])): ?>
                    <a class="btn btn-primary btn-sm" href="<?= e($it['demo']) ?>" target="_blank" rel="noopener">Voir l'application en ligne ↗</a>
                <?php endif; ?>
                <?php if (!empty($it['lien'])): ?>
                    <a class="btn btn-<?= empty($it['demo']) ? 'primary' : 'outline' ?> btn-sm" href="<?= e($it['lien']) ?>" target="_blank" rel="noopener">Code source sur <?= strpos($it['lien'], 'gitlab.com') !== false ? 'GitLab' : 'GitHub' ?> ↗</a>
                <?php endif; ?>
                <?php if (!empty($it['pdf'])): ?>
                    <a class="btn btn-outline btn-sm" href="<?= e($it['pdf']) ?>" download>⬇ Télécharger le PDF</a>
                <?php endif; ?>
                <a class="btn btn-outline btn-sm" href="/modules#<?= e($module['id']) ?>">← Retour au module</a>
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

        <?php if (!empty($it['pdf'])): ?>
            <div class="pdf-frame">
                <iframe src="<?= e($it['pdf']) ?>#view=FitH" title="<?= e($it['titre']) ?>" loading="lazy"></iframe>
                <p class="pdf-fallback">Le PDF ne s'affiche pas ? <a href="<?= e($it['pdf']) ?>" target="_blank" rel="noopener">Ouvrir le PDF dans un nouvel onglet</a>.</p>
            </div>
        <?php endif; ?>

        <?php if ($contenu): ?>
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
                    <?= $contenu /* contenu rédigé par moi, généré depuis Markdown */ ?>
                </article>
            </div>
        <?php endif; ?>

        <nav class="pager" aria-label="Navigation entre les exercices">
            <?php if ($precedent): ?>
                <a class="pager-link prev" href="<?= e(page_url($precedent)) ?>">
                    <span>← Précédent</span>
                    <strong><?= e($pages[$precedent]['titre']) ?></strong>
                </a>
            <?php else: ?>
                <span></span>
            <?php endif; ?>
            <?php if ($suivant): ?>
                <a class="pager-link next" href="<?= e(page_url($suivant)) ?>">
                    <span>Suivant →</span>
                    <strong><?= e($pages[$suivant]['titre']) ?></strong>
                </a>
            <?php endif; ?>
        </nav>

    </div>
</section>
<?php require API_DIR . '/includes/footer.php'; ?>
