<?php
    include_once(__DIR__ . '/../model/mregistration.php');
    $reg = new Registration();
    $errors = [];

    if ($reg->verification($_POST['login'], $_POST['password']) === true) {
        header('Location: ../view/admin-panel.php');
    }
    
    if ($_SESSION['user_privileges'] === 1) {
        exit(include_once('/view/disconnect.php'));
    }

    if (!empty($_POST)) {
        if (empty($_POST['login']) && empty($_POST['password'])) {    
            $errors[] = 'Введите логин и пароль';
        }

        if (empty($_POST['login']) && !empty($_POST['password'])) { 
            $errors[] = 'Введите логин';     
        }

        if (!empty($_POST['login']) && empty($_POST['password'])) { 
            $errors[] = 'Введите пароль';    
        }

        if (!empty($_POST['login']) && !empty($_POST['password'])) { 
            echo $reg->verification($_POST['login'], $_POST['password']);
        }
        
    }