<?php
// Routeur principal : toutes les URLs passent par ce fichier (voir vercel.json)

define('API_DIR', __DIR__);

// Liste blanche des pages autorisées : slug => fichier
$routes = [
    'accueil'       => 'accueil.php',
    'mini-projets'  => 'mini-projets.php',
    'td'            => 'td.php',
    'controles'     => 'controles.php',
    '404'           => '404.php',
];

$page = isset($_GET['page']) ? (string) $_GET['page'] : 'accueil';
if (!isset($routes[$page])) {
    $page = '404';
}
if ($page === '404') {
    http_response_code(404);
}

require API_DIR . '/includes/config.php';
require API_DIR . '/includes/functions.php';

$active = $page;
require API_DIR . '/pages/' . $routes[$page];
