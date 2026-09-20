<?php
$pageTitle = 'Travaux dirigés (TD)';
$pageDesc  = "Tous mes travaux dirigés réalisés pendant ma formation à l'OFPPT.";
require API_DIR . '/includes/header.php';

render_listing(
    'Mes TD',
    "Retrouvez ici tous mes travaux dirigés, du plus ancien au plus récent.",
    load_data('td')
);

require API_DIR . '/includes/footer.php';
