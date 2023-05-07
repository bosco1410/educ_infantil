<?php
namespace app\libraries;

class Database {

    private $host = HOST;
    private $user = USER;
    private $pass = PASS;
    private $port = PORT; 
    private $dbname = DB;
    private $dbh;
    private $stmt;

    public function __construct() {
        $dsn = 'mysql:host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->dbname . '';
        try {
            $this->dbh = new \PDO($dsn, $this->user, $this->pass);
            $this->dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->dbh->exec('SET NAMES utf8');
            return $this->dbh;
        } catch (\PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function query($sql) {
        $this->stmt = $this->dbh->prepare($sql);
        return $this->stmt;
    }

    public function bind($params, $value, $type = null) {
        if ($type === null) {
            switch (true) {
                case is_int($value):
                    $type = \PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = \PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = \PDO::PARAM_NULL;
                    break;
                default:
                    $type = \PDO::PARAM_STR;
                    break;
            }
        }
        $this->stmt->bindValue($params, $value, $type);
    }

    public function execute(){
        return $this->stmt->execute();
    }

    public function select(){
        $this->execute();
        return $this->stmt->fetch(\PDO::FETCH_OBJ);
    }

    public function selectAll(){
        $this->execute();
        return $this->stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function count(){
        return $this->stmt->rowCount();
    }

    public function lastInsertId(){
        return $this->stmt->lastInsertId();
    }
}
