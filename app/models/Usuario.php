<?php
namespace app\models;

use app\libraries\Database;

class Usuario {

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function gravar_usuario($dados){
        $sql = "INSERT INTO usuario (nome, email, senha, nivel, data_cad) VALUES (:nome, :email, :senha, :nivel, :data_cad)";
        
        $this->db->query($sql);
        $this->db->bind(':nome', mb_strtoupper($dados['nome']));
        $this->db->bind(':email', mb_strtolower($dados['email']));
        $this->db->bind(':senha', password_hash($dados['senha'], PASSWORD_DEFAULT));
        $this->db->bind(':nivel', $dados['nivel']);
        $this->db->bind(':data_cad', date('Y-m-d H:i:s'));
        $result = $this->db->execute();
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function editar_usuario($dados){
        $sql = "UPDATE usuario SET nome = :nome, email = :email, senha = :senha, nivel = :nivel, data_cad = :data_cad WHERE id = :id";
        $email = $this->verifyEmailEditar($dados['email']);
        if($email->email == $dados['email'] and $email->id == $dados['id'] or !$email){
        $this->db->query($sql);
        $this->db->bind(':nome', mb_strtoupper($dados['nome']));
        $this->db->bind(':email', mb_strtolower($dados['email']));
        $this->db->bind(':senha', password_hash($dados['senha'], PASSWORD_DEFAULT));
        $this->db->bind(':nivel', $dados['nivel']);
        $this->db->bind(':data_cad', date('Y-m-d H:i:s'));
        $this->db->bind(':id', $dados['id']);
        $result = $this->db->execute();
        if($result){
            return true;
        }else{
            throw new \PDOException("ERRO: FALHA NA GRAVAÇÃO DE DADOS!");
            return false;
        }
        }else{
            throw new \PDOException("ERRO: E-MAIL JÁ CADASTRADO!");
            return false;
        }
    }

    public function deletar_usuario($id){
        $sql = "DELETE FROM usuario WHERE id = :id";
        $this->db->query($sql);
        $this->db->bind(':id', $id);
        $result = $this->db->execute();
        if($result){
            return true;
        }else{
            throw new \PDOException("ERRO: FALHA NA EXCLUSÃO DE DADOS!");
            return false;
        }
    }

    public function listar(){
        $sql = "SELECT * FROM usuario";
        $this->db->query($sql);
        $this->db->execute();
        $count = $this->db->count();
        if($count > 0){
            $resultado = $this->db->selectAll();
            return $resultado;
        }else{
            return false;
        }
    }

    public function getUsuarioId($dados){
        $sql = "SELECT * FROM usuario WHERE id = :id";
        $this->db->query($sql);
        $this->db->bind(':id', $dados);
        $this->db->execute();
        $count = $this->db->count();
        if($count > 0){
            $resultado = $this->db->select();
            return $resultado;
        }else{
            return false;
        }
    }

    public function verifyEmail($dados){
        $sql = "SELECT email FROM usuario WHERE email = :email";
        $this->db->query($sql);
        $this->db->bind(':email', $dados);
        $this->db->execute();
        $count = $this->db->count();
        if($count > 0){
            return true;
        }else{
            return false;
        }
    }

    private function verifyEmailEditar($dados){
        $sql = "SELECT * FROM usuario WHERE email = :email";
        $this->db->query($sql);
        $this->db->bind(':email', $dados);
        $result = $this->db->execute();
        if($result){
            $resultado = $this->db->select();
            return $resultado;
        }else{
            return false;
        }
    }

    public function validateLogin($dados){
        $sql = "SELECT * FROM usuario WHERE email = :email";
        $this->db->query($sql);
        $this->db->bind(':email', $dados['email']);
        $result = $this->db->execute();
        if($result){
            $resultado = $this->db->select();
            if(password_verify($dados['senha'], $resultado->senha)){
                $_SESSION['usuario_id'] = $resultado->id;
                $_SESSION['usuario_nome'] = $resultado->nome;
                $_SESSION['usuario_nivel'] = $resultado->nivel;
                return true;
            }else{
                throw new \PDOException("ERRO: Senha inválida!");
                return false;
            }
        }else{
            throw new \PDOException("ERRO: E-mail inválido!");
            return false;
        }
    }

}