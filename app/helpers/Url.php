<?php
namespace app\helpers;

class Url {

    public static function redirect($url){
        header('Location: ' . URL . DIRECTORY_SEPARATOR . $url);
    }
}