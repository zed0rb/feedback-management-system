<?php
declare(strict_types=1);
class AdminAuthenticator {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function authenticate(string $username, string $password): bool {
        $sql = "SELECT * FROM admin_users WHERE username = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$username]);
        $adminUser = $stmt->fetch();

        return $adminUser && password_verify($password, $adminUser['password_hash']);
    }
}