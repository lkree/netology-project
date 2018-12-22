<?php
    include_once(__DIR__ . '/../controller/cregistration.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin login panel</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="login">
        <input type="password" name="password">
        <input type="submit" value="Зайти" name="loggedIn">
    </form>
    <?php if (!empty($errors)) {
    $reg->showErrors($errors); 
    } ?>
</body>
</html>