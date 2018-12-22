<form action="" method="post">
    <input type="text" name="name" placeholder="Ваше имя" required><?php echo $errors['name']?>
    <br>
    <br>
    <input type="email" name="email" placeholder="Ваш email" required><?php echo $errors['email']?>
    <br>
    <br>
    <select name="theme" id="">
        <?php foreach ($forum->getThemes() as $k => $v): ?>
            <option value="<?php echo $v['theme'] ?>"><?php echo $v['theme'] ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <br>
    <textarea name="question" cols="30" rows="10" placeholder="Введите ваш вопрос" required></textarea><?php echo $errors['question']?>
    <br>
    <br>
    <input type="submit" value="Готово!" name="submit">
</form>
<a href="questions.php">Вернуться назад</a>
