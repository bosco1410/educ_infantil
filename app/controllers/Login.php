<?php
namespace app\controllers;

use app\helpers\Check;
use app\helpers\Message;
use app\helpers\Url;
use app\libraries\Controller;

class Login extends Controller{

    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = $this->model('Usuario');
    }

    public function login(){
        $form = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
        if(isset($form)){
            $dados = [
                'email' => $form['email'],
                'senha' => $form['senha'],
                'email_error' => '',
                'senha_error' => '',
            ];
            if(in_array("",$form)){
                if(empty($form['email'])){
                    $dados['email_error'] = 'Campo Email obrigatório!';
                }
                if(empty($form['senha'])){
                    $dados['senha_error'] = 'Campo Senha obrigatório!';
                }
            }else{
                if(Check::checkEmail($form['email'])){
                    $dados['email_error'] = 'Email inválido!';
                }
                elseif(Check::checkPass($form['senha'])){
                    $dados['senha_error'] = 'A senha precisa ter no mímino 6 caracteres!';
                }
                else{
                    try{
                        $this->usuarioModel->validateLogin($dados);
                        Url::redirect('site/index');
                    }catch(\PDOException $e){
                        Message::showMessage('usuarios', $e->getMessage(), 'alert alert-danger');
                        Url::redirect('login/login');
                    }
                }
            }
        }else{
            $dados = [
                'email' => '',
                'senha' => '',
                'email_error' => '',
                'senha_error' => '',
            ];
        }
        $this->view('pages/usuario/login', $dados);
    }

    public function sair(){
        unset($_SESSION['usuario_id']);
        unset($_SESSION['usuario_nome']);
        unset($_SESSION['usuario_email']);
        unset($_SESSION['usuario_nivel']);

        session_destroy();

        Url::redirect('site/index');
    }

}