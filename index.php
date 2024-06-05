<?php

require_once 'classes/Database.php';
require_once 'classes/FormHandler.php';
require_once 'classes/Feedback.php';

$errorMsg = '';
$successMsg = '';
$database = new Database();
$pdo = $database->connect();
$formHandler = new FormHandler();
$feedback = new Feedback($pdo);

if ($formHandler->isFormSubmitted()) {
    try {
        $name = $formHandler->validateInput($_POST['name']);
        $email = $formHandler->validateInput($_POST['email']);
        $feedbackText = $formHandler->validateInput($_POST['feedback']);
        $censoredFeedback = $formHandler->censorBadWords($feedbackText);

        $feedback->saveFeedback($name, $email, $censoredFeedback);

        setcookie('name', $name, time() + (86400 * 30), "/");
        setcookie('email', $email, time() + (86400 * 30), "/");
        setcookie('feedback', $feedbackText, time() + (86400 * 30), "/");

        $successMsg = "Feedback submitted successfully.";
    } catch (Exception $e) {
        $errorMsg = $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Feedback</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <?php if (!empty($errorMsg)): ?>
        <div class="alert alert-danger mt-3" role="alert">
            <?php echo $errorMsg; ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($successMsg)): ?>
        <div id="successAlert" class="alert alert-success mt-3" role="alert">
            <?php echo $successMsg; ?>
        </div>
        <script>
            // Hide success message after 3 seconds
            setTimeout(function(){
                document.getElementById('successAlert').style.display = 'none';
            }, 3000);
        </script>
    <?php endif; ?>

    <?php include 'templates/form.php'; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
