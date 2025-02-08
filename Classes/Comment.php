<?php
class Comment {
    private $pdo;

    
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }


    public function addComment($user_id, $recipe_id, $message) {
        $stmt = $this->pdo->prepare("
            INSERT INTO comments (user_id, recipe_id, message) 
            VALUES (?, ?, ?)
        ");
        return $stmt->execute([$user_id, $recipe_id, $message]);
    }


    public function getCommentsByRecipe($recipe_id) {
        $stmt = $this->pdo->prepare("
            SELECT comments.id, comments.message, comments.createdDate, users.name 
            FROM comments 
            JOIN users ON comments.user_id = users.id 
            WHERE recipe_id = ? 
            ORDER BY comments.createdDate DESC
        ");
        $stmt->execute([$recipe_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteComment($id) {
        $stmt = $this->pdo->prepare("DELETE FROM comments WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
