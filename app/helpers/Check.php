<?php
namespace app\helpers;

class Check {

    public static function checkName($nome){
        if(!preg_match('/^([áÁàÀãÃâÂéÉèÈêÊíÍìÌóÓòÒõÕôÔúÚùÙçÇaA-zZ]+)+((\s[áÁàÀãÃâÂéÉèÈêÊíÍìÌóÓòÒõÕôÔúÚùÙçÇaA-zZ]+)+)?$/', $nome)):
            return true;
        else:
            return false;
        endif;
    }

    public static function checkPass($senha){
        if(strlen($senha) < 6){
            return true;
        }else{
            return false;
        }
    }

    public static function checkEmail($email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }else{
            return false;
        }
    }

    

    public static function dataBr($data){
        return date('d/m/Y H:i',strtotime($data));
    }
}