<?php
namespace app\helpers;

class Session {

    public static function logged(){
        if(isset($_SESSION['usuario_id'])){
            return true;
        }else{
            return false;
        }
    }

    public static function getUserNameLogged() {
        if(isset($_SESSION['usuario_id'])){
            return $_SESSION['usuario_nome'];
        }else{
            return false;
        }
    }
}