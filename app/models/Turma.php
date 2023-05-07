<?php
namespace app\models;

use app\libraries\Database;

class Turma {

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function get_turmas() {
        $sql = "SELECT *,
        lotacao.id as id_lot,
        lotacao.id_usuario as id_usu,
        lotacao.id_turma as idTurma,
        turmas.id as id_turma,
        turmas.nome as nome_turma
        FROM lotacao 
        INNER JOIN turmas ON lotacao.id_turma = turmas.id
        WHERE lotacao.id_usuario = :id_usuario AND lotacao.anoletivo = :ano
        ORDER BY turmas.nome";
        $this->db->query($sql);
        $this->db->bind(':id_usuario', $_SESSION['usuario_id']);
        $this->db->bind(':ano', date('Y'));
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