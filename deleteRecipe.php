<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer la Recette</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Suppression de la Recette</h2>
        <?php
        require 'db.php';
        require 'Classes/Recipe.php';

        if (isset($_GET['id'])) {
            $recipe_id = $_GET['id'];
            $recipe = new Recipe($pdo);
            
            if ($recipe->deleteRecipe($recipe_id)) {
                echo "<p>Recette supprimée avec succès.</p>";
                echo "<a href='index.php'>Retour à la liste des recettes</a>";
            } else {
                echo "<p>Erreur : Impossible de supprimer la recette.</p>";
                echo "<a href='index.php'>Retour à la liste des recettes</a>";
            }
        } else {
            echo "<p>Erreur : Aucun ID de recette spécifié.</p>";
            echo "<a href='index.php'>Retour à la liste des recettes</a>";
        }
        ?>
    </div>
</body>
</html>
