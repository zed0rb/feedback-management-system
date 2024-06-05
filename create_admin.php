<?php
require_once 'classes/Database.php';

$database = new Database();
$db = $database->connect();

$username = 'admin';
$password = 'admin';
$password_hash = password_hash($password, PASSWORD_BCRYPT);

$sql = "INSERT INTO admin_users (username, password_hash) VALUES (:username, :password_hash)";
$stmt = $db->prepare($sql);
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password_hash', $password_hash);
$stmt->execute();

echo "Admin user created successfully.";

