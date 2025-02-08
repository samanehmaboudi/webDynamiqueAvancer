<?php
class Recipe {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function addRecipe($title, $description, $ingredients, $instructions, $category_id, $user_id) {
        $stmt = $this->pdo->prepare("
            INSERT INTO recipes (title, description, ingredients, instructions, category_id, user_id) 
            VALUES (?, ?, ?, ?, ?, ?)
        ");
        return $stmt->execute([$title, $description, $ingredients, $instructions, $category_id, $user_id]);
    }


    public function getAllRecipes() {
        $stmt = $this->pdo->query("SELECT * FROM recipes");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteRecipe($id) {
        $stmt = $this->pdo->prepare("DELETE FROM recipes WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function getRecipeById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM recipes WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateRecipe($id, $title, $description, $ingredients, $instructions, $category_id) {
        $stmt = $this->pdo->prepare("
            UPDATE recipes 
            SET title = ?, description = ?, ingredients = ?, instructions = ?, category_id = ? 
            WHERE id = ?
        ");
        return $stmt->execute([$title, $description, $ingredients, $instructions, $category_id, $id]);
    }
}
?>
