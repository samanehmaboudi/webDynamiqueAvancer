<?php
require 'db.php';
require 'Classes/Recipe.php';

$recipe = new Recipe($pdo);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'add': 
                $recipe->addRecipe($_POST['title'], $_POST['description'], $_POST['ingredients'], $_POST['instructions'], $_POST['category_id'], $_POST['user_id']);
                header("Location: index.php?message=Recette ajoutée avec succès");
                exit();
            case 'update': 
                $recipe->updateRecipe($_POST['id'], $_POST['title'], $_POST['description'], $_POST['ingredients'], $_POST['instructions'], $_POST['category_id']);
                header("Location: index.php?message=Recette mise à jour avec succès");
                exit();
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
        $recipe->deleteRecipe($_GET['id']);
        header("Location: index.php?message=Recette supprimée avec succès");
        exit();
    }
}


$recipes = $recipe->getAllRecipes();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Recettes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Liste des Recettes</h2>
    <a href="addRecipe.php">➕ Ajouter une Recette</a>
    <ul>
        <?php foreach ($recipes as $r) : ?>
            <li>
                <strong><?= htmlspecialchars($r['title']); ?></strong> - <?= htmlspecialchars($r['description']); ?>
                <a href="editRecipe.php?id=<?= $r['id']; ?>">✏ Modifier</a>
                <a href="CRUD.php?action=delete&id=<?= $r['id']; ?>" onclick="return confirm('Voulez-vous vraiment supprimer cette recette ?')">🗑 Supprimer</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
