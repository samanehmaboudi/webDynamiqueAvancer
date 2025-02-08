<?php
require 'db.php';
require 'Classes/Recipe.php';


if (isset($_GET['id'])) {
    $recipe_id = $_GET['id'];
    $recipe = new Recipe($pdo);
    
    if ($recipe->deleteRecipe($recipe_id)) {

        header("Location: index.php?message=Recette supprimée avec succès");
        exit();
    } else {
        echo "Erreur : Impossible de supprimer la recette.";
    }
} else {
    echo "Erreur : Aucun ID de recette spécifié.";
}
?>
