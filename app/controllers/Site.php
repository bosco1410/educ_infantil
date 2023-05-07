<?php
namespace app\controllers;

use app\helpers\Session;
use app\helpers\Url;
use app\libraries\Controller;

class Site extends Controller {

    public function index() {
        if(Session::logged()){
            if($_SESSION['usuario_nivel'] == 1){
                $this->view('pages/admin/admin');
            }else{
                Url::redirect('relatorios');
            }
        }else{
            $this->view('pages/home/home');
        }
    }
}