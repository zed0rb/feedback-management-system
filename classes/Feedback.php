<?php
declare(strict_types=1);

class Feedback
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function saveFeedback(string $name, string $email, string $feedbackText): void
    {
        $sql = "INSERT INTO feedback (name, email, feedback_text) VALUES (:name, :email, :feedback_text)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':feedback_text', $feedbackText);
        $stmt->execute();
    }

    public function getFeedbacks(): array
    {
        $sql = "SELECT * FROM feedback ORDER BY created_at DESC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteFeedback(int $id): void
    {
        $sql = "DELETE FROM feedback WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function markAsRead(int $id): void
    {
        $sql = "UPDATE feedback SET is_read = 1 WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
