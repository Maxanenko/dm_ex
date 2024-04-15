<?php

namespace App\Controllers;

use App\Services\Router;

class Auth
{

    public function login($data)
    {
        $email = $data["email"];
        $password = $data["password"];

        $user = \R::findOne('user', 'email = ?', [$email]);
        if (!$user) {
            die('Пользователь не найден');
        }


        if ($password === $user->password) {
            session_start();
            $_SESSION['user']["user_id"] = $user->id;
            $_SESSION['user']["full_name"] = $user->full_name;
            $_SESSION['user']["username"] = $user->username;
            $_SESSION['user']["role"] = $user->id_role;
            $_SESSION['user']["email"] = $user->email;
            Router::redirect('/profile');
        } else {
            die('Неверный пароль');
        }


    }

    public function register($data) : void
    {
        $email = $data["email"];
        $login = $data["login"];
        $full_name = $data["full_name"];
        $phone = $data["phone"];
        $password = $data["password"];
        $password_confirm = $data["password_confirm"];

        if ($password !== $password_confirm) {
            Router::error(500);
            die();
        }

        $user = \R::dispense('user');
        $user->email = $email;
        $user->login = $login;
        $user->full_name = $full_name;
        $user->phone = $phone;
        $user->id_role = 1;
        $user->password = $password;
        \R::store($user);
        Router::redirect('/login');
    }

    public function logout() {
        unset($_SESSION["user"]);
        Router::redirect('/login');
    }
}