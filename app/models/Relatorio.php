<?php
namespace app\models;

use app\libraries\Database;

class Relatorio {

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function listar_relatorios($report) {
        $sql = "SELECT *,
        relatorio.id as idReport,
        relatorio.id_usuario as idUser,
        relatorio.id_aluno as idAluno,
        relatorio.id_turma as idTurma,
        relatorio.data_cad as criado_em,
        usuario.id as id_usu,
        usuario.nome as nome_usu,
        alunos.id as id_aluno,
        alunos.nome as nome_aluno,
        turmas.id as id_turma,
        turmas.nome as nome_turma        
        FROM relatorio
        INNER JOIN usuario ON relatorio.id_usuario = usuario.id
        INNER JOIN alunos ON relatorio.id_aluno = alunos.id
        INNER JOIN turmas ON relatorio.id_turma = turmas.id
        WHERE relatorio.id_usuario = :id AND relatorio.anoletivo = :ano
        ORDER BY relatorio.data_cad DESC";
        $this->db->query($sql);
        $this->db->bind(':id', $report['id']);
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

    public function gravar_relatorio() {

    }

    public function visualizar_relatorio($report) {
        $sql = "SELECT *,
        relatorio.id as idReport,
        relatorio.id_usuario as idUser,
        relatorio.id_aluno as idAluno,
        relatorio.id_turma as idTurma,
        relatorio.data_cad as criado_em,
        usuario.id as id_usu,
        usuario.nome as nome_usu,
        alunos.id as id_aluno,
        alunos.nome as nome_aluno,
        turmas.id as id_turma,
        turmas.nome as nome_turma        
        FROM relatorio
        INNER JOIN usuario ON relatorio.id_usuario = usuario.id
        INNER JOIN alunos ON relatorio.id_aluno = alunos.id
        INNER JOIN turmas ON relatorio.id_turma = turmas.id
        WHERE relatorio.id_aluno = :id AND relatorio.anoletivo = :ano";
        $this->db->query($sql);
        $this->db->bind(':id', $report);
        $this->db->bind(':ano', date('Y'));
        $this->db->execute();
        $count = $this->db->count();
        if ($count > 0) {
            $resultado = $this->db->select();
            return $resultado;
        }else{
            return false;
        }
    }
}