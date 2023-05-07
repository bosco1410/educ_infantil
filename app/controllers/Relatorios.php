<?php
namespace app\controllers;

use app\helpers\Session;
use app\helpers\Url;
use app\libraries\Controller;

class Relatorios extends Controller {

    private $relatorioModel;
    private $turmaModel;
    private $alunoModel;

    public function __construct() {
        if(!Session::logged()){
            Url::redirect('login/login');
        }
        $this->relatorioModel = $this->model('Relatorio');
        $this->turmaModel = $this->model('Turma');
        $this->alunoModel = $this->model('Aluno');
    }

    public function index() {
        $dados = [
            'turmas' => $this->turmaModel->get_turmas(),
        ];
        $this->view('pages/relatorio/selecionar_turma', $dados);
    }

    public function listar(){
        //echo "<pre>"; print_r($_POST); echo "</pre>"; exit;
        $id_turma = filter_input(INPUT_POST, 'turma', FILTER_SANITIZE_NUMBER_INT);
        $dados = [
           'relatorios' => $this->relatorioModel->listar_relatorios($id_turma),
        ];
        $this->view('pages/relatorio/listar_relatorio', $dados);
    }

    public function visualizar($id){
        $dados = [
            'relatorios' => $this->relatorioModel->visualizar_relatorio($id),
        ];
        $this->view('pages/relatorio/visualizar_relatorio', $dados);
    }

    public function criarRelatorio(){
        $dados = [
            'turmas' => $this->turmaModel->get_turmas(),
        ];
        $this->view('pages/relatorio/criar_relatorio', $dados);
    }

    public function listarAlunos(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        $dados = [
            'alunos' => $this->alunoModel->getAlunosByTurma($id),
        ];
        foreach ($dados['alunos'] as $aluno) {
            echo '<option value="'.$aluno->id.'">'.$aluno->nome.'</option>';
        }
    }
}