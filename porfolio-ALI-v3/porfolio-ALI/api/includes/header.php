<?php
// Variables attendues : $SITE, $NAV, $active, (optionnel) $pageTitle, $pageDesc
$t = isset($pageTitle) ? $pageTitle . ' | ' . $SITE['name'] : $SITE['title'];
$d = isset($pageDesc) ? $pageDesc : $SITE['description'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($t) ?></title>
    <meta name="description" content="<?= e($d) ?>">
    <link rel="icon" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Ctext y='.9em' font-size='90'%3E%F0%9F%92%BB%3C/text%3E%3C/svg%3E">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

<header>
    <div class="container">
        <nav>
            <a href="/" class="logo">Ali<span>.</span></a>

            <button class="nav-toggle" id="navToggle" aria-label="Ouvrir le menu" aria-expanded="false">☰</button>

            <ul class="nav-links" id="navLinks">
                <?php foreach ($NAV as $slug => $item): ?>
                    <li>
                        <a href="<?= e($item[1]) ?>" <?= $slug === $active ? 'class="active"' : '' ?>>
                            <?= e($item[0]) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
</header>

<main>
