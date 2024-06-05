<?php
declare(strict_types=1);
class LoginHandler {
    private PDO $db;
    private AdminAuthenticator $authenticator;
    private string $errorMsg = '';

    public function __construct(PDO $db, AdminAuthenticator $authenticator) {
        $this->authenticator = $authenticator;
    }

    public function handleRequest(): void {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($this->authenticator->authenticate($username, $password)) {
                $_SESSION['admin_logged_in'] = true;
                header('Location: admin.php');
                exit;
            } else {
                $this->errorMsg = 'Invalid username or password';
            }
        }
    }

    public function getErrorMessage(): string {
        return $this->errorMsg;
    }
}