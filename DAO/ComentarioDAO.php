<?php
require_once '../conexao/conexao.php';
class ComentarioDAO {
    private $pdo = null;
    
    
    public function __construct() {
//        $this->pdo = Conexao::Instaciar();
          $this->pdo = Conexao::instaciar();
    }
    
     public function getAllComentario(){
        try{
            
            $sql = "SELECT*FROM comentario";
            $stmt= $this->pdo->prepare($sql) ;
            $stmt->execute();
            $comentario = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $comentario;
        } catch (PDOException $ex) {
                 echo $ex->getMessage();
        }
    }
     public function getComentarioByCOD($codi){
        try{
            
            $sql = "SELECT * FROM comentario INNER JOIN usuario ON comentario .usuario_cpf = usuario . cpf WHERE evento_cod=?";
			
            $stmt= $this->pdo->prepare($sql);
             $stmt->bindValue(1, $codi);
            $stmt->execute();
            $com = $stmt->fetchALL(PDO::FETCH_ASSOC);
            
			return $com;
			
        } catch (PDOException $ex) {
				 echo $ex->getMessage();
				 
        }
    }
	
	public function getComentarioEspaco($codi){
        try{
            
            $sql = "SELECT * FROM comentario INNER JOIN usuario ON comentario .usuario_cpf = usuario . cpf WHERE espaco_cod=?";
			
            $stmt= $this->pdo->prepare($sql);
             $stmt->bindValue(1, $codi);
            $stmt->execute();
            $com = $stmt->fetchALL(PDO::FETCH_ASSOC);
            
			return $com;
			
        } catch (PDOException $ex) {
				 echo $ex->getMessage();
				 die();
        }
    }
	
	
	public function CadastrarComentarioEspaco($comentario, $cpf, $espaco, $data){
        try{
            $sql = "INSERT INTO comentario(comentario, usuario_cpf, espaco_cod, data) VALUES(?,?,?,?)";
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $comentario);
            $stmt->bindValue(2, $cpf);
            $stmt->bindValue(3, $espaco);
            $stmt->bindValue(4, $data);
             return $stmt->execute();
        } catch (PDOException $ex) {
		echo $ex->getMessage();
        }
    }
	
	
    public function CadastrarComentarioEvento($comentario, $cpf, $evento, $data){
        try{
            $sql = "INSERT INTO comentario(comentario, usuario_cpf, evento_cod, data) VALUES(?,?,?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $comentario);
            $stmt->bindValue(2, $cpf);
            $stmt->bindValue(3, $evento);
            $stmt->bindValue(4, $data);
			
             return $stmt->execute();
          
        } catch (PDOException $ex) {
           echo"erro".$ex->getMessage();
			
        }
    }
    
    public function EditarComentario($comentario, $cod){
         try {
             
         $sql = "UPDATE comentario SET comentario=? WHERE cod=?";
         $stmt = $this->pdo->prepare($sql);
         $stmt->bindValue(1, $comentario);
         $stmt->bindValue(2, $cod);
        
		 
         return $stmt->execute();
		 
         } catch (PDOException $exc) {
            echo $exc->getMessage();
			
		 }
         }
        public function ExcluirComentario($excluindo){
        try{
            $sql= "DELETE  FROM comentario WHERE cod=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt-> bindValue(1,$excluindo);
            return $stmt->execute();
            
            
          
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
        public function ExcluirComentarioEspaco($cod){
        try{
            $sql= "DELETE FROM comentario WHERE cod=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt-> bindValue(1,$cod);
            return $stmt->execute();
            } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
}
        
}
