<?php
require 'db.php';
require 'Classes/Recipe.php';

$recipe = new Recipe($pdo);


if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Erreur : Aucun ID de recette spécifié.");
}

$recipe_id = $_GET['id'];
$currentRecipe = $recipe->getRecipeById($recipe_id);

if (!$currentRecipe) {
    die("Erreur : Recette non trouvée.");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier la Recette</title>
</head>
<body>
    <h2>Modifier la Recette</h2>
    <form method="POST" action="CRUD.php">
        <input type="hidden" name="action" value="update">
        <input type="hidden" name="id" value="<?= $currentRecipe['id']; ?>">
        <input type="text" name="title" value="<?= htmlspecialchars($currentRecipe['title']); ?>" required><br>
        <textarea name="description" required><?= htmlspecialchars($currentRecipe['description']); ?></textarea><br>
        <textarea name="ingredients" required><?= htmlspecialchars($currentRecipe['ingredients']); ?></textarea><br>
        <textarea name="instructions" required><?= htmlspecialchars($currentRecipe['instructions']); ?></textarea><br>
        <select name="category_id">
            <option value="1" <?= ($currentRecipe['category_id'] == 1) ? 'selected' : ''; ?>>Dessert</option>
            <option value="2" <?= ($currentRecipe['category_id'] == 2) ? 'selected' : ''; ?>>Plat principal</option>
        </select><br>
        <button type="submit">Enregistrer les modifications</button>
    </form>
</body>
</html>
