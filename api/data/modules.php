<?php
// Modules de la formation : chaque module contient des sections (UML, Figma, Atelier 1...)
// et chaque section des cartes "séance" avec un ou plusieurs liens.
// Un lien vers une page interne : ['texte' => '...', 'page' => 'slug']   (voir data/pages.php)
// Un lien externe            : ['texte' => '...', 'url'  => 'https://...']
return [
    [
        'id'          => 'm201',
        'code'        => 'M201',
        'titre'       => "Préparation d'un projet web",
        'sous_titre'  => 'Conception = Plan',
        'description' => "Poser les bases d'un projet web avant d'écrire la moindre ligne de code : modéliser le besoin avec UML et concevoir l'interface avec Figma.",
        'sections'    => [
            [
                'badge'  => 'UML',
                'titre'  => 'Modélisation et diagrammes de classes',
                'cartes' => [
                    ['titre' => 'Séance UML 1', 'liens' => [['texte' => 'Voir exercice 1', 'page' => 'uml-diagramme-de-classes-1']]],
                    ['titre' => 'Séance UML 2', 'liens' => [['texte' => 'Voir exercice 2', 'page' => 'uml-diagramme-de-classes-2']]],
                    ['titre' => 'Mini projet UML', 'liens' => [['texte' => 'Voir le rapport', 'page' => 'mini-projet-uml']]],
                ],
            ],
            [
                'badge'  => 'FIGMA',
                'titre'  => 'Maquettage et prototypage',
                'cartes' => [
                    ['titre' => 'Séance Figma', 'liens' => [['texte' => 'Voir le prototype', 'page' => 'figma-prototype-bruce']]],
                ],
            ],
        ],
    ],
    [
        'id'          => 'm202',
        'code'        => 'M202',
        'titre'       => 'Approche agile',
        'sous_titre'  => 'Gestion de projet et méthodologie Agile',
        'description' => "Planifier un projet, organiser le travail d'équipe avec Agile et Scrum, puis collaborer avec Git et GitHub jusqu'au déploiement.",
        'sections'    => [
            [
                'badge'  => 'Atelier 1',
                'titre'  => 'Planification : méthode des potentiels (MPM)',
                'cartes' => [
                    ['titre' => 'Séance atelier 1', 'liens' => [
                        ['texte' => 'Voir exercice 2', 'page' => 'mpm-exercice-2'],
                        ['texte' => 'Voir exercice 3', 'page' => 'mpm-exercice-3'],
                    ]],
                ],
            ],
            [
                'badge'  => 'Agile',
                'titre'  => 'Méthode Agile et framework Scrum',
                'cartes' => [
                    ['titre' => 'Fiche de cours', 'liens' => [['texte' => 'Voir la fiche', 'page' => 'agile-scrum']]],
                ],
            ],
            [
                'badge'  => 'Atelier 3',
                'titre'  => 'Les bases de Git',
                'cartes' => [
                    ['titre' => 'Séance atelier 3', 'liens' => [['texte' => 'Voir exercice', 'page' => 'atelier-3-bases-git']]],
                    ['titre' => 'Séance atelier 3', 'liens' => [['texte' => 'Voir GitHub', 'url' => 'https://github.com/alilhbib20007-sys/atelier-git']]],
                ],
            ],
            [
                'badge'  => 'Atelier 4',
                'titre'  => 'Git et GitHub : travail collaboratif',
                'cartes' => [
                    ['titre' => 'Séance atelier 4', 'liens' => [['texte' => 'Voir exercice', 'page' => 'atelier-4-git-collaboratif']]],
                    ['titre' => 'Séance atelier 4', 'liens' => [['texte' => 'Voir GitHub', 'url' => 'https://github.com/alilhbib20007-sys/atelier-collaboratif']]],
                ],
            ],
            [
                'badge'  => 'Atelier 5',
                'titre'  => 'Examen M202 : exercices Git',
                'cartes' => [
                    ['titre' => 'Séance atelier 5', 'liens' => [['texte' => 'Voir exercice', 'page' => 'atelier-5-examen-git']]],
                    ['titre' => 'Séance atelier 5', 'liens' => [['texte' => 'Voir GitHub', 'url' => 'https://github.com/alilhbib20007-sys/depot_local']]],
                ],
            ],
            [
                'badge'  => 'Atelier 6',
                'titre'  => 'PHP, MySQL Aiven, Cloudinary et Vercel',
                'cartes' => [
                    ['titre' => 'Séance atelier 6', 'liens' => [['texte' => 'Voir exercice', 'page' => 'atelier-6-stagiaires']]],
                    ['titre' => 'Séance atelier 6', 'liens' => [['texte' => "Voir l'application", 'url' => 'https://atelier-stagiaires-jade.vercel.app']]],
                    ['titre' => 'Séance atelier 6', 'liens' => [['texte' => 'Voir GitHub', 'url' => 'https://github.com/alilhbib20007-sys/atelier-stagiaires']]],
                ],
            ],
        ],
    ],
];
