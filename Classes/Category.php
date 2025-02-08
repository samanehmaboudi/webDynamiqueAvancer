<?php
class Category {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllCategories() {
        $stmt = $this->pdo->query("SELECT * FROM categories");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addCategory($name) {
        $stmt = $this->pdo->prepare("INSERT INTO categories (name) VALUES (?)");
        return $stmt->execute([$name]);
    }

    public function deleteCategory($id) {
        $stmt = $this->pdo->prepare("DELETE FROM categories WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
