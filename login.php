<?php

require_once 'classes/Database.php';
require_once 'classes/admin/AdminAuthenticator.php';
require_once 'classes/admin/LoginHandler.php';
require_once 'config/config_session.php';

$database = new Database();
$db = $database->connect();
$authenticator = new AdminAuthenticator($db);

$loginHandler = new LoginHandler($db, $authenticator);
$loginHandler->handleRequest();
$errorMsg = $loginHandler->getErrorMessage();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="mt-5">Admin Login</h1>
    <?php if ($errorMsg): ?>
        <div class="alert alert-danger"><?php echo $errorMsg; ?></div>
    <?php endif; ?>
    <?php include 'templates/admin_login.php'; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
