<?php
class User {
    private $pdo;

 
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }


    public function registerUser($name, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        
        $stmt = $this->pdo->prepare("
            INSERT INTO users (name, email, password) 
            VALUES (?, ?, ?)
        ");
        return $stmt->execute([$name, $email, $hashedPassword]);
    }


    public function loginUser($email, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        
    
        if ($user && password_verify($password, $user['password'])) {
            return $user; 
        }
        return false; 
    }


    public function getUserById($id) {
        $stmt = $this->pdo->prepare("SELECT id, name, email FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function emailExists($email) {
        $stmt = $this->pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ? true : false;
    }
}
?>
