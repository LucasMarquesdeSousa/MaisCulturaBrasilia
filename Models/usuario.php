<?php
class usuario {
    
    private $con;
    
    public function __construct() {
        $this->con = Conexao::getConexao();
    }
    
    public function cadastrar($cpf, $nome, $email, $senha, $dt_nascimento){
    
        try {
            $sql = "INSERT INTO usuario(cpf, nome, email, senha, dt_nascimento) VALUES(?,?,?,?,?)";
            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(1, $cpf);
            $stmt->bindValue(2, $nome);
            $stmt->bindValue(3, $email);
            $stmt->bindValue(4, $senha);
            $stmt->bindValue(5, $dt_nascimento);
            return $stmt->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }
        
    
}
