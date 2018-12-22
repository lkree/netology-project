<?php
include_once(__DIR__ . '/../controller/cquestions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forum</title>
</head>
<body>
    <form action="" method="get">
        <select name="theme" id="">
            <?php foreach ($forum->getThemes() as $k => $v): ?>
                <option value="<?php echo $v['theme'] ?>"><?php echo $v['theme'] ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Выбрать тему">
    </form>
    <?php if (!empty($questions)): ?>
        <?php foreach ($questions as $k => $v): ?>
                <h2><?php echo $v['question'] ?></h2>
                <p><?php echo $v['answer'] ?></p>
    <?php endforeach; endif; ?>
    <a href="questions.php?addQuestion=add">Добавить вопрос</a>
    <br>
    <a href="<?php echo $_SERVER['HTTP_REFERER'] ?>">Вернуться назад</a>
    <br>
    <a href="/">Перейти на главную страницу</a>
</body>
</html>