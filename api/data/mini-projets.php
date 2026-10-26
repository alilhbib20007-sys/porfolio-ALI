<?php
// Fichiers dans public/images/mini-projets/ et public/pdf/mini-projets/
return [
    [
        'titre'       => 'Mini projet - Conception UML',
        'module'      => 'Modélisation UML',
        'description' => "Mini projet réalisé pendant ma formation à l'OFPPT (rapport PDF).",
        'image'       => null,
        'pdf'         => '/pdf/mini-projets/mini-projet.pdf',
        'lien'        => null, // lien GitHub éventuel
        'tags'        => ['UML', 'OFPPT'],
    ],
    [
        'titre'       => 'Atelier 6 - Gestion des stagiaires (PHP, Aiven, Cloudinary, Vercel)',
        'module'      => 'Développement Full Stack',
        'description' => "Application Full Stack préparatoire au Sprint 3 de Quick Annonces : formulaire d'inscription, photo envoyée sur Cloudinary, données enregistrées dans MySQL (Aiven, connexion TLS) puis affichage de la liste, déployée sur Vercel depuis GitHub.",
        'image'       => '/images/mini-projets/atelier6-stagiaires.png',
        'pdf'         => null,
        'slug'        => 'atelier-6-stagiaires',
        'lien'        => 'https://github.com/alilhbib20007-sys/atelier-stagiaires',
        'tags'        => ['PHP', 'MySQL', 'Aiven', 'Cloudinary', 'Vercel'],
    ],
];
