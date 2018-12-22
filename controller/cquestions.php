<?php
include_once(__DIR__ . '/../model/mquestions.php');
$forum = new Questions();
$errors = [];

if (!empty($_POST['submit'])) {

    if (empty($_POST['name'])) {
        $errors['name'] = 'Введите ваше имя';
    }

    if (empty($_POST['email'])) {
        $errors['email'] = 'Введите ваш email';
    }

    if (empty($_POST['question'])) {
        $errors['question'] = 'Введите ваш вопрос';
    }

    if (count($errors) == 0) {
        $forum->addQuestion($_POST['name'], $_POST['email'], $_POST['theme'], $_POST['question']);
        header('Location: /view/questions.php?addQuestion=success');
    }

}

if (!empty($_GET['theme'])) {
    $questions = $forum->getQuestions($_GET['theme']);

    if (!array_shift($questions)) {
        echo 'К сожалению, актуальные вопросы не найдены :(';
    }
}

if ($_GET['addQuestion'] === 'add') {
    include_once(__DIR__ . '/../view/addQuestion.php');
    exit();
}
if ($_GET['addQuestion'] === 'success') {
    echo 'Вопрос успешно добавлен';
}


