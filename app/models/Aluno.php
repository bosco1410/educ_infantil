<?php
namespace app\models;

use app\libraries\Database;

class Aluno {

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAlunosByTurma($id_turma) {
        $sql = "SELECT * FROM alunos WHERE id_turma = :id";
        $this->db->query($sql);
        $this->db->bind(':id', $id_turma);
        $this->db->execute();
        $count = $this->db->count();
        if ($count > 0) {
            $resultado = $this->db->selectAll();
            return $resultado;
        }else{
            return false;
        }
    }
}