<?php

namespace App\Services;

class Router
{
    private static array $list;

    public static function page($uri, $page_name): void
    {
        self::$list[] = [
            "uri" => $uri,
            "page" => $page_name
        ];
    }

    public static function enable(): void
    {
        $query = $_GET['q'];
        foreach (self::$list as $route) {
            if ($route["uri"] === '/' . $query) {
                if (isset($route["post"]) and $route["post"] === true or $_SERVER["REQUEST_METHOD"] === "POST") {
                    $action = new $route['class'];
                    $method = $route['method'];
                    if ($route['form_data'] and $route['file']) {
                        $action->$method($_POST, $_FILES);
                    } elseif ($route['form_data'] and !$route['file']) {
                        $action->$method($_POST);
                    } elseif (!$route['form_data'] and !$route['file']) {
                        $action->$method();
                    }
                    die();
                } else {
                    require_once "views/pages/" . $route['page'] . ".php";
                    die();
                }
            }
        }
        self::error('404');
    }

    public static function post($uri, $class, $method, $form_data = false, $file = false)
    {

        self::$list[] = [
            "uri" => $uri,
            "class" => $class,
            "method" => $method,
            "form_data" => $form_data,
            "file" => $file,
            "post" => true
        ];

    }


    public static function redirect($page)  : void
    {
        header('Location: ' . $page);
    }


    public static function error($error): void
    {
        require_once "views/errors/". $error . ".php";
    }
}