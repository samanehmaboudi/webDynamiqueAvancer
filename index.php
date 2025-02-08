<?php 
require 'db.php'; 
require 'Classes/Recipe.php';

$recipe = new Recipe($pdo);
$recipes = $recipe->getAllRecipes();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des recettes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Recettes disponibles</h1>
    <a href="addRecipe.php">+ Ajouter une Recette</a>
    <ul>
        <?php foreach ($recipes as $r) : ?>
            <li>
                <strong><?= htmlspecialchars($r['title']); ?></strong> - <?= htmlspecialchars($r['description']); ?>
                <a href="editRecipe.php?id=<?= $r['id']; ?>">Modifier</a> | 
                <a href="CRUD.php?action=delete&id=<?= $r['id']; ?>" onclick="return confirm('Voulez-vous vraiment supprimer cette recette ?')">🗑 Supprimer</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
