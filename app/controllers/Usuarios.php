<?php
namespace app\controllers;

use app\helpers\Check;
use app\helpers\Message;
use app\helpers\Url;
use app\libraries\Controller;

class Usuarios extends Controller {

    private $usuarioModel;

    public function __construct(){
        $this->usuarioModel = $this->model('Usuario');
    }

    public function cadastrar() {
        $form = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
        if(isset($form)){
            $dados = [
                'nome' => $form['nome'],
                'email' => $form['email'],
                'senha' => $form['senha'],
                'confirmar_senha' => $form['confirmar_senha'],
                'nivel' => $form['nivel'],
                'nome_error' => '',
                'email_error' => '',
                'senha_error' => '',
                'confirmar_senha_error' => '',
                'nivel_error' => '',
            ];

            if(in_array("",$form)){
                if(empty($form['nome'])){
                    $dados['nome_error'] = 'Campo Nome obrigatório!';
                }
                if(empty($form['email'])){
                    $dados['email_error'] = 'Campo Email obrigatório!';
                }
                if(empty($form['senha'])){
                    $dados['senha_error'] = 'Campo Senha obrigatório!';
                }
                if(empty($form['confirmar_senha'])){
                    $dados['confirmar_senha_error'] = 'Campo Confirmar Senha obrigatório!';
                }
                if(empty($form['nivel'])){
                    $dados['nivel_error'] = 'Campo Nivel obrigatório!';
                }
            }else{
                if(Check::checkName($form['nome'])){
                    $dados['nome_error'] = 'Nome inválido!';
                }
                elseif(Check::checkEmail($form['email'])){
                    $dados['email_error'] = 'Email inválido!';
                }
                elseif($this->usuarioModel->verifyEmail($form['email'])){
                    $dados['email_error'] = 'E-mail já cadastrado!';
                }
                elseif(Check::checkPass($form['senha'])){
                    $dados['senha_error'] = 'A senha precisa ter no mímino 6 caracteres!';
                }
                elseif($form['confirmar_senha'] != $form['senha']){
                    $dados['confirmar_senha_error'] = 'As senhas não são iguais!';
                }else{
                    if($this->usuarioModel->gravar_usuario($dados)){
                        Message::showMessage('usuarios', 'REGISTRO GRAVADO COM SUCESSO!');
                        Url::redirect('usuarios/listar');
                    }else{
                        Message::showMessage('usuarios', 'FALHA NA GRAVAÇÃO!', 'alert alert-danger');
                        Url::redirect('usuarios/listar');
                    }
                }
            }
        }else{
            $dados = [
                'nome' => '',
                'email' => '',
                'senha' => '',
                'confirmar_senha' => '',
                'nivel' => '',
                'nome_error' => '',
                'email_error' => '',
                'senha_error' => '',
                'confirmar_senha_error' => '',
                'nivel_error' => '',
            ];
        }
        $this->view('pages/usuario/cadastrar_usuario', $dados);
    }

    public function editar($id) {

        $form = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
        if(isset($form)){
            $dados = [
                'id' => $id,
                'nome' => $form['nome'],
                'email' => $form['email'],
                'senha' => $form['senha'],
                'confirmar_senha' => $form['confirmar_senha'],
                'nivel' => $form['nivel'],
                'nome_error' => '',
                'email_error' => '',
                'senha_error' => '',
                'confirmar_senha_error' => '',
                'nivel_error' => '',
            ];

            if(in_array("",$form)){
                if(empty($form['nome'])){
                    $dados['nome_error'] = 'Campo Nome obrigatório!';
                }
                if(empty($form['email'])){
                    $dados['email_error'] = 'Campo Email obrigatório!';
                }
                if(empty($form['senha'])){
                    $dados['senha_error'] = 'Campo Senha obrigatório!';
                }
                if(empty($form['confirmar_senha'])){
                    $dados['confirmar_senha_error'] = 'Campo Confirmar Senha obrigatório!';
                }
                if(empty($form['nivel'])){
                    $dados['nivel_error'] = 'Campo Nivel obrigatório!';
                }
            }else{
                if(Check::checkName($form['nome'])){
                    $dados['nome_error'] = 'Nome inválido!';
                }
                elseif(Check::checkEmail($form['email'])){
                    $dados['email_error'] = 'Email inválido!';
                }
                elseif($this->usuarioModel->verifyEmail($form['email'])){
                    $dados['email_error'] = 'E-mail já cadastrado!';
                }
                elseif(Check::checkPass($form['senha'])){
                    $dados['senha_error'] = 'A senha precisa ter no mímino 6 caracteres!';
                }
                elseif($form['confirmar_senha'] != $form['senha']){
                    $dados['confirmar_senha_error'] = 'As senhas não são iguais!';
                }else{
                    if($this->usuarioModel->gravar_usuario($dados)){
                        Message::showMessage('usuarios', 'REGISTRO GRAVADO COM SUCESSO!');
                        Url::redirect('usuarios/listar');
                    }else{
                        Message::showMessage('usuarios', 'FALHA NA GRAVAÇÃO!', 'alert alert-danger');
                        Url::redirect('usuarios/listar');
                    }
                }
            }
        }else{
    
            $usuario = $this->usuarioModel->getUsuarioId($id);

            $dados = [
                'id' => $usuario->id,
                'nome' => $usuario->nome,
                'email' => $usuario->email,
                'nivel' => $usuario->nivel,
                'nome_error' => '',
                'email_error' => '',
                'senha_error' => '',
                'confirmar_senha_error' => '',
                'nivel_error' => '',
            ];
        }
        $this->view('pages/usuario/editar_usuario', $dados);
    }

    public function listar(){
        $dados = [
            'usuarios' => $this->usuarioModel->listar(),
        ];
        $this->view('pages/usuario/listar_usuario', $dados);
    }

}