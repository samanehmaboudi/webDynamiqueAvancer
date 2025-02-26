<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Recettes</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Gestion des Recettes</h1>
        <a href="addRecipe.php" class="button">➕ Ajouter une Recette</a>
        <ul>
            <?php foreach ($recipes as $r) : ?>
                <li>
                    <strong><?= htmlspecialchars($r['title']); ?></strong> - <?= htmlspecialchars($r['description']); ?>
                    <a href="editRecipe.php?id=<?= $r['id']; ?>">✏ Modifier</a>
                    <a href="CRUD.php?action=delete&id=<?= $r['id']; ?>" onclick="return confirm('Voulez-vous vraiment supprimer cette recette ?')">🗑 Supprimer</a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
