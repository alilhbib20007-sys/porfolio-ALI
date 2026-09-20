<?php
$pageTitle = 'Contrôles';
$pageDesc  = "Mes contrôles et examens de la formation en développement digital.";
require API_DIR . '/includes/header.php';

render_listing(
    'Mes Contrôles',
    "Énoncés et corrections de mes contrôles, classés par module.",
    load_data('controles')
);

require API_DIR . '/includes/footer.php';
