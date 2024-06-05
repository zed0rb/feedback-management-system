<?php

require_once 'config/config_session.php';
require_once 'classes/Database.php';
require_once 'classes/Feedback.php';


// Check if the admin is logged in
if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header('Location: login.php');
    die();
}

$database = new Database();
$pdo = $database->connect();

$feedback = new Feedback($pdo);

if (isset($_POST['delete_feedback'])) {
    $feedback->deleteFeedback($_POST['feedback_id']);
}

if (isset($_POST['mark_as_read'])) {
    $feedback->markAsRead($_POST['feedback_id']);
}

$feedbacks = $feedback->getFeedbacks();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Feedback Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <?php include 'templates/admin_panel.php'; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
