<?php
// Routeur principal : toutes les URLs passent par ce fichier (voir vercel.json)

define('API_DIR', __DIR__);

// Liste blanche des pages autorisées : slug => fichier
$routes = [
    'accueil'       => 'accueil.php',
    'modules'       => 'modules.php',
    'detail'        => 'detail.php',
    'redirect'      => null,
    '404'           => '404.php',
];

$page = isset($_GET['page']) ? (string) $_GET['page'] : 'accueil';

// Anciennes adresses (/td, /mini-projets, /controles) : redirection permanente vers /modules
if ($page === 'redirect') {
    $ancien = isset($_GET['slug']) ? (string) $_GET['slug'] : '';
    $cible  = preg_match('/^[a-z0-9-]+$/', $ancien) ? '/modules/' . $ancien : '/modules';
    header('Location: ' . $cible, true, 301);
    exit;
}

if (!array_key_exists($page, $routes)) {
    $page = '404';
}
if ($page === '404') {
    http_response_code(404);
}

require API_DIR . '/includes/config.php';
require API_DIR . '/includes/functions.php';

// Sur une page d'exercice, l'onglet actif du menu reste "Modules"
$active = $page === 'detail' ? 'modules' : $page;
require API_DIR . '/pages/' . $routes[$page];
