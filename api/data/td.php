<?php
// Chaque TD = un bloc. Pour en ajouter un, copie un bloc et modifie-le.
// Les fichiers vont dans public/images/td/ et public/pdf/td/
return [
    [
        'titre'       => 'TD1 - Diagramme de classes',
        'module'      => 'Modélisation UML',
        'description' => "Réalisation d'un diagramme de classes dans le cadre de ma formation à l'OFPPT.",
        'image'       => '/images/td/td1.png',
        'pdf'         => null,
        'tags'        => ['UML', 'OFPPT', 'Modélisation'],
    ],
    [
        'titre'       => 'TD2 - Diagramme de classes',
        'module'      => 'Modélisation UML',
        'description' => 'Travail pratique consacré à la modélisation et à la conception UML.',
        'image'       => '/images/td/td2.png',
        'pdf'         => null,
        'tags'        => ['UML', 'OFPPT', 'Conception'],
    ],
    [
        'titre'       => 'TD3 - Rapport de prototypage Figma',
        'module'      => 'UX/UI Design',
        'description' => "Conception d'un prototype d'application mobile de partage et de messagerie (« Bruce ») sur Figma : profil, liste des conversations, discussion et saisie d'un message.",
        'image'       => null,
        'pdf'         => '/pdf/td/td3-rapport-prototype-figma.pdf',
        'tags'        => ['Figma', 'UX/UI', 'Prototypage', 'OFPPT'],
    ],
    [
        'titre'       => 'Atelier 1 - Exercice 2 : Méthode des potentiels (MPM)',
        'module'      => 'Gestion de projet',
        'description' => "Construction d'un réseau à l'aide de la méthode des potentiels Métra (MPM) : calcul des dates au plus tôt / au plus tard pour chaque tâche et mise en évidence de deux chemins critiques.",
        'images'      => ['/images/td/td4-atelier1-ex2-mpm-1.jpg', '/images/td/td4-atelier1-ex2-mpm-2.jpg'],
        'pdf'         => null,
        'tags'        => ['MPM', 'Ordonnancement', 'Chemin critique', 'OFPPT'],
    ],
    [
        'titre'       => 'Atelier 1 - Exercice 3 : Méthode des potentiels (MPM)',
        'module'      => 'Gestion de projet',
        'description' => "Deuxième réseau de tâches résolu avec la méthode des potentiels Métra (MPM) : dates au plus tôt / au plus tard et identification du chemin critique.",
        'image'       => '/images/td/td5-atelier1-ex3-mpm.jpg',
        'pdf'         => null,
        'tags'        => ['MPM', 'Ordonnancement', 'Chemin critique', 'OFPPT'],
    ],

    // [
    //     'titre'       => 'TD6 - ...',
    //     'module'      => 'Algorithmique',
    //     'description' => '...',
    //     'image'       => '/images/td/td6.png',
    //     'pdf'         => '/pdf/td/td6.pdf',
    //     'correction'  => '/pdf/td/td6-correction.pdf',
    //     'tags'        => ['...'],
    // ],
];
