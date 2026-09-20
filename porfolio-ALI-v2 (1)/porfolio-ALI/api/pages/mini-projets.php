<?php
$pageTitle = 'Mini Projets';
$pageDesc  = "Mes mini projets réalisés pendant ma formation en développement digital.";
require API_DIR . '/includes/header.php';

render_listing(
    'Mes Mini Projets',
    "Les petits projets que j'ai réalisés pour mettre en pratique mes cours.",
    load_data('mini-projets')
);

require API_DIR . '/includes/footer.php';
