<form action="index.php" method="post" class="mt-5">
    <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" id="name" name="name" class="form-control" value="<?php echo isset($_COOKIE['name'])? htmlspecialchars($_COOKIE['name']) : '';?>" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" id="email" name="email" class="form-control" value="<?php echo isset($_COOKIE['email'])? htmlspecialchars($_COOKIE['email']) : '';?>" required>
    </div>
    <div class="mb-3">
        <label for="feedback" class="form-label">Feedback:</label>
        <textarea id="feedback" name="feedback" class="form-control" required><?php echo isset($_COOKIE['feedback'])? htmlspecialchars($_COOKIE['feedback']) : '';?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit Feedback</button>
</form>