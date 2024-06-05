<h1 class="mt-5">Feedback Management</h1>
<form action="logout.php" method="post">
    <button type="submit" class="btn btn-danger mb-3">Logout</button>
</form>
<?php if (!empty($feedbacks)): ?>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Feedback</th>
            <th>Created At</th>
            <th>Is Read</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($feedbacks as $fb): ?>
            <tr>
                <td><?php echo htmlspecialchars($fb['name']); ?></td>
                <td><?php echo htmlspecialchars($fb['email']); ?></td>
                <td><?php echo htmlspecialchars($fb['feedback_text']); ?></td>
                <td><?php echo $fb['created_at']; ?></td>
                <td><?php echo $fb['is_read'] ? 'Yes' : 'No'; ?></td>
                <td>
                    <form action="admin.php" method="post" style="display:inline-block;">
                        <input type="hidden" name="feedback_id" value="<?php echo $fb['id']; ?>">
                        <button type="submit" name="delete_feedback" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                    <?php if (!$fb['is_read']): ?>
                        <form action="admin.php" method="post" style="display:inline-block;">
                            <input type="hidden" name="feedback_id" value="<?php echo $fb['id']; ?>">
                            <button type="submit" name="mark_as_read" class="btn btn-success btn-sm">Mark as Read</button>
                        </form>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No feedback.</p>
<?php endif; ?>
