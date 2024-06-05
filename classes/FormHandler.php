<?php
declare(strict_types=1);
class FormHandler
{
    private array $badWords = [];

    public function __construct()
    {
        $this->loadBadWords();
    }

    private function loadBadWords(): void
    {
        $file = __DIR__ . '/../badwords.txt';
        if (file_exists($file)) {
            $this->badWords = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        } else {
            throw new Exception("Bad words file not found.");
        }
    }

    public function isFormSubmitted(): bool
    {
        return $_SERVER["REQUEST_METHOD"] === "POST";
    }

    public function validateInput($input): string
    {
        if(!$input) {
            throw new Exception("Fill all fields");
        }

        $input = trim(htmlspecialchars($input));

        $maxLength = 255;

        if (strlen($input) > $maxLength) {
            throw new Exception("Input is too long. Maximum length is $maxLength characters.");
        }

        return $input;
    }

    public function censorBadWords($text): string
    {
        foreach ($this->badWords as $word) {
            $text = str_ireplace($word, str_repeat('*', strlen($word)), $text);
        }
        return $text;
    }
}
