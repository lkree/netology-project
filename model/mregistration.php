<?php
include_once(__DIR__ . '/database/db.php');
session_start();


 class Registration
 {
    private function db()
    {
        return new Database();
    }

    public function verification($login, $password)
    {
        $accountFromDb = $this->db()->query("SELECT * FROM users WHERE `login` = '$login'");
        
        if (empty($accountFromDb)) {
            return 'Аккаунт не найден';
        } else {
            if (!password_verify($password, $accountFromDb[0]['password'])) {
                return 'Неверный пароль';
            } else {
                $_SESSION['user_privileges'] = 1;
                return true;
            }
        }
    }

    public function getRegistr($login, $password)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $this->db()->query("INSERT INTO users (login, password) VALUES (:login, :password)", [
            'login'    => $login,
            'password' => $password
        ]);
        
        /*Дописать проверку выполнения условия*/
    }


    public function showErrors($errors)
    {
        foreach ($errors as $k => $v) {
            echo $v;
        }
    }
 }

