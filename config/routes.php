<?php

namespace Config\Routes;

class App{

    public static $uri = [];
    public static function get($pathname, $callback)
    {
        if ($_SERVER["REQUEST_METHOD"] === "GET"):
            self::$uri[] = ["pathname"=>$pathname, "method" => "GET", "callback" => $callback];
        endif;
    }

    public static function post($pathname, $callback)
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST"):
            self::$uri[] = ["pathname"=>$pathname, "method" => "POST", "callback" => $callback];
        endif;
    }

    public static function put($pathname, $callback)
    {
        if ($_SERVER["REQUEST_METHOD"] === "PUT"):
            self::$uri[] = ["pathname"=>$pathname, "method" => "PUT", "callback" => $callback];
        endif;
    }

    public static function delete($pathname, $callback)
    {
        if ($_SERVER["REQUEST_METHOD"] === "DELETE"):
            self::$uri[] = ["pathname"=>$pathname, "method" => "DELETE", "callback" => $callback];
        endif;
    }

    public static function run()
    {
        foreach (self::$uri as $key => $u){
            if (parse_url($u["pathname"], PHP_URL_PATH) == parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH)):
                if (is_callable($u["callback"])):
                    $u["callback"]();
                    $validar = true;
                    break;
                else:
                    include_once $_SERVER["DOCUMENT_ROOT"]."/source/controllers/".$u["callback"][0].".php";
                    $data = new $u["callback"][0]();
                    call_user_func([$data, $u["callback"][1]]);
                    $validar = true;
                    break;
                endif;
            else:
                $validar = false;
            endif;
        }

        if (!$validar):
            show("Error 404");
        endif;
    }
}