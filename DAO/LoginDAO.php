<?php

include_once '../conexao/conexao.php';

class LoginDAO {

    public $pdo = null;

    public function __construct() {
        $this->pdo = Conexao::instaciar();
    }

    public function Login($nome, $senha) {
        try {
            $sql = "SELECT * from usuario where cpf= :cpf AND senha= :senha";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue("cpf", $nome);
            $stmt->bindValue("senha", $senha);
            $stmt->execute();
            $login = $stmt->fetch(PDO::FETCH_ASSOC);
            return $login;
        } catch (PDOException $ex) {
            echo "parabens deu errado " . $ex->getMessage();
            die();
        }
    }

}

?>