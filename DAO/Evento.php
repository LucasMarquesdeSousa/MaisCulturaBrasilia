<?php
require_once '../conexao/conexao.php';
require_once '../DTO/Evento.php';
class Evento {
       //editar evento
      //excluir evento
    //cadastrar evento
   // pesquisar evento
    public $pdo = null;
    
    public function __construct() {
        $this->pdo=Conexao::instaciar();
    }
    
     public function getAllCliente() {
        try {
            $sql = "SELECT * FROM evento";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $evento = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $evento;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    public function Cadastrar(Eventodto $evento){
        try{
           
           $sql="INSERT INTO evento (cod, nome, faixa_etaria, email,local,horario, foto, telefone, descricao, usuario_cpf)
 VALUES (?,?,?,?,?,?,?,?,?,?)";
           
 $stmt = $this->pdo->prepare($sql);
 $stmt->bindValue(1, $evento->getCod());
 $stmt->bindValue(2, $evento->getNome());
 $stmt->bindValue(3, $evento->getClassificacao());
 $stmt->bindValue(4, $evento->getEmail());
 $stmt->bindValue(5, $evento->getLocal());
 $stmt->bindValue(6, $evento->getHorario());
 $stmt->bindValue(7, $evento->getFoto());
 $stmt->bindValue(8, $evento->getTelefone());
 $stmt->bindValue(9, $evento->getDescricao());
 $stmt->bindValue(10, $evento->getCpf());
// $stmt->bindValue(11, $evento->getArtista());
 return $stmt->execute(); 
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
//    }
//    public function Excluir(){
//        try{
//            
//        } catch (Exception $ex) {
//
//        }
//    }
//    public function editar(){
//        try{
//            
//        } catch (Exception $ex) {
//
//        }
//    }
//    public function Pesquisar(){
//        try{
//            
//        } catch (Exception $ex) {
//
//        }
//    }
}
}
