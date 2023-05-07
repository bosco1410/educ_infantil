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
        $result = $this->db->execute();
        if($result){
            return true;
        }else{
            return false;
        }
    }

}