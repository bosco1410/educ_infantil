<?php
namespace app\libraries;

class Router {

    private $controller = "Site";
    private $method = 'index';
    private $params = array();

    public function __construct() {
       $url = $this->url() ? $this->url() : [0];
       echo "<pre>"; print_r($url); echo "</pre>"; exit;
    }
        
    public function url(){
        $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
        $url = trim(rtrim($url, '/'));
        $url = explode('/', $url);
        return $url;
    }
}