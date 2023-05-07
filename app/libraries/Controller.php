<?php
namespace app\libraries;

class Controller {

    public function model($model){
       $class = "\\app\\models\\" . $model;
       return new $class;
    }

    public function view($view, $dados = []){
        $file = __DIR__. '/../views/'. $view. '.php';
        if(file_exists($file)){
            require_once $file;
        }
    }
}