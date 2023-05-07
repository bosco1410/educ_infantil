<?php
namespace app\controllers;

use app\helpers\Session;
use app\helpers\Url;
use app\libraries\Controller;

class Relatorios extends Controller {

    private $relatorioModel;

    public function __construct() {
        if(!Session::logged()){
            Url::redirect('login/login');
        }
        $this->relatorioModel = $this->model('Relatorio');
    }

    public function index() {

        $report = [
            'id' => 3,
            'ano' => 2023
        ];
        $dados = [
            'relatorios' => $this->relatorioModel->listar_relatorios($report),
        ];
        $this->view('pages/relatorio/listar_relatorio', $dados);
    }

    public function visualizar($id){
        $dados = [
            'relatorios' => $this->relatorioModel->visualizar_relatorio($id),
        ];
        $this->view('pages/relatorio/visualizar_relatorio', $dados);
    }
}