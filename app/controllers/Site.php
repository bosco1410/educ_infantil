<?php
namespace app\controllers;

use app\libraries\Controller;

class Site extends Controller {

    public function index() {
        $this->view('pages/home/home');
    }
}