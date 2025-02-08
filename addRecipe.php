<?php
require 'db.php';
require 'Classes/Recipe.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une Recette</title>
</head>
<body>
    <h2>Ajouter une Recette</h2>
    <form method="POST" action="CRUD.php">
        <input type="hidden" name="action" value="add">
        <input type="hidden" name="user_id" value="1"> 
        <input type="text" name="title" placeholder="Titre de la recette" required><br>
        <textarea name="description" placeholder="Description" required></textarea><br>
        <textarea name="ingredients" placeholder="Ingrédients" required></textarea><br>
        <textarea name="instructions" placeholder="Instructions" required></textarea><br>
        <select name="category_id">
            <option value="1">Dessert</option>
            <option value="2">Plat principal</option>
        </select><br>
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>
