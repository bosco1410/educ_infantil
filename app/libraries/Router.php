<?php
namespace app\libraries;

class Router {

    private $controller = "Site";
    private $method = 'index';
    private $params = array();

    public function __construct() {
       $url = $this->url() ? $this->url() : [0];
       //echo "<pre>"; print_r($url); echo "</pre>"; exit;
       if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
           $this->controller = ucwords($url[0]);
           unset($url[0]);
       }

       $class = "\\app\\controllers\\" . $this->controller;
       $this->controller = new $class();

       if(isset($url[1])){
            if(method_exists($class, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
       }

       $this->params = $url ? array_values($url) : array();

       call_user_func_array([$this->controller, $this->method], $this->params);
    }
        
    public function url(){
        $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
        $url = trim(rtrim($url, '/'));
        $url = explode('/', $url);
        return $url;
    }
}