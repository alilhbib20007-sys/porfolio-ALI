<?php
$nom = "Votre Nom";
$titre = "Développeur Web | Passionné de technologie";
$about = "Je suis un étudiant passionné par le développement web. J'aime créer des sites modernes et apprendre de nouvelles technologies chaque jour.";

$projets = [
    ["titre" => "Projet 1", "description" => "Description courte du premier projet."],
    ["titre" => "Projet 2", "description" => "Description courte du deuxième projet."],
    ["titre" => "Projet 3", "description" => "Description courte du troisième projet."],
];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($nom); ?> - Portfolio</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', sans-serif; background: #0f0f1a; color: #fff; }
        header { text-align: center; padding: 80px 20px; background: linear-gradient(135deg, #1e1e3f, #2d2d5f); }
        header img { width: 120px; height: 120px; border-radius: 50%; object-fit: cover; border: 3px solid #6c63ff; }
        header h1 { margin-top: 20px; font-size: 2.5rem; }
        header p { margin-top: 10px; color: #a0a0c0; font-size: 1.1rem; }
        section { max-width: 900px; margin: 0 auto; padding: 60px 20px; }
        section h2 { font-size: 1.8rem; margin-bottom: 20px; border-left: 4px solid #6c63ff; padding-left: 12px; }
        .about p { color: #c0c0d0; line-height: 1.7; }
        .projects { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; }
        .card { background: #1a1a2e; padding: 20px; border-radius: 12px; transition: 0.3s; }
        .card:hover { transform: translateY(-5px); background: #22223e; }
        .card h3 { color: #6c63ff; margin-bottom: 10px; }
        .card p { color: #a0a0c0; font-size: 0.95rem; }
        footer { text-align: center; padding: 30px; color: #a0a0c0; border-top: 1px solid #2a2a4a; }
        footer a { color: #6c63ff; text-decoration: none; margin: 0 10px; }
    </style>
</head>
<body>

    <header>
        <img src="/images/logo.png" alt="Photo de profil">
        <h1><?php echo htmlspecialchars($nom); ?></h1>
        <p><?php echo htmlspecialchars($titre); ?></p>
    </header>

    <section class="about">
        <h2>À propos de moi</h2>
        <p><?php echo htmlspecialchars($about); ?></p>
    </section>

    <section>
        <h2>Mes Projets</h2>
        <div class="projects">
            <?php foreach ($projets as $projet): ?>
            <div class="card">
                <h3><?php echo htmlspecialchars($projet['titre']); ?></h3>
                <p><?php echo htmlspecialchars($projet['description']); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section>
        <h2>Documents</h2>
        <p><a href="/docs/document.pdf" style="color:#6c63ff;">📄 Télécharger mon CV</a></p>
    </section>

    <footer>
        <p>Contact: votre@email.com</p>
        <a href="#">LinkedIn</a> | <a href="#">GitHub</a>
    </footer>

</body>
</html>