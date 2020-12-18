<?php
class Espaco {
    
    private $con;
    
    public function __construct() {
        $this->con = Conexao::getConexao();
    }
    
    public function getEspaco(){
        try {
            $sql = "SELECT * FROM espaco_cultural";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $espaco = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $espaco;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }
}
