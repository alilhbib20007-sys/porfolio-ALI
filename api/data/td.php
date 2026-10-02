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


    // [
    //     'titre'       => 'TD4 - ...',
    //     'module'      => 'Algorithmique',
    //     'description' => '...',
    //     'image'       => '/images/td/td4.png',
    //     'pdf'         => '/pdf/td/td4.pdf',
    //     'correction'  => '/pdf/td/td4-correction.pdf',
    //     'tags'        => ['...'],
    // ],
];