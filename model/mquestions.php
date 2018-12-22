<?php
include_once(__DIR__ . '/database/db.php');
session_start();

class Questions
 {
    private function db()
    {
        return new Database();
    }

    public function getThemes()
    {
        return $this->db()->query("SELECT DISTINCT theme FROM questions");
    }

    public function getQuestions($theme)
    {
        return $this->db()->query("SELECT question, answer FROM questions WHERE theme = '$theme' AND answer IS NOT NULL");
    }

    public function addQuestion($name, $email, $theme, $question)
    {
        $this->db()->query("INSERT INTO questions (name, email, theme, question) VALUES (:name, :email, :theme, :question)", [
            'name' => $name,
            'email' => $email,
            'theme' => $theme,
            'question' => $question
        ]);
    }
 }