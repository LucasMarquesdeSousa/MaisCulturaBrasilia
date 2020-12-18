<?php
class Evento {
    //put your code here
    private $con;
    
    public function __construct() {
        $this->con = Conexao::getConexao();
    }
    
    public function getEvento(){
        try {
            $sql = "SELECT * FROM evento WHERE status='p' ORDER BY cod";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $evento = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $evento;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }
}
