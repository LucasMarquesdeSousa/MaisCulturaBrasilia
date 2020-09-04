<?php
require_once '../conexao/conexao.php';

class EspacoCulturalDAO {
    //editar
    //excluir
    //cadastrar
    //pesquisar
    public function __construct() {
        $this->pdo = Conexao::instaciar();
    }
    public function getAllEspaco() {
        try {
            $sql = "SELECT * FROM espaco_cultural ORDER BY nome DESC LIMIT 3";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $espaco = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $espaco;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function getAllEventoCOD($cod) {
        try {
            $sql = "SELECT * FROM espaco_cultural where cod=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $cod);
            $stmt->execute();
            $espaco = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $espaco;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function getEspacoByCPF($cod) {
        try {
            $sql = "SELECT*FROM espaco_cultural where cod=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $cod);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $usuario;
        } catch (PDOException $ex) {
            
        }
    }

    public function CadastrarEspaco(EspacoCultural $espacoDTO) {
        try {

            $sql = "INSERT INTO espaco_cultural (nome , telefone , local , horario , descricao, foto , usuario_cpf)
VALUES (?,?,?,?,?,?,?)";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $espacoDTO->getNome());
            $stmt->bindValue(2, $espacoDTO->getData());
            $stmt->bindValue(3, $espacoDTO->getLocal());
            $stmt->bindValue(4, $espacoDTO->getHorario());
            $stmt->bindValue(5, $espacoDTO->getDescricao());
            $stmt->bindValue(6, $espacoDTO->getFoto());
            $stmt->bindValue(7, $espacoDTO->getcpf());
// $stmt->bindValue(11, $evento->getArtista());

            return $stmt->execute();
        } catch (PDOException $exc) {
            echo "erro ao cadastrar o evento!" . $exc->getMessage();
            die();
        }
    }

    public function EditarEspaco( $nome  , $local ,  $data , $horario , $descricao , $cod) {
        try {

            $sql = "UPDATE espaco_cultural SET nome=?, local=?, telefone=?, horario=?, descricao=? WHERE cod=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $nome);
            $stmt->bindValue(2, $local);
            $stmt->bindValue(3, $data);
            $stmt->bindValue(4, $horario);
            $stmt->bindValue(5, $descricao);
            $stmt->bindValue(6, $cod);
            

            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            die();
        }
    }

    public function ExcluirEspacoByCPF($cod) {
        try {
            $sql = "DELETE FROM espaco_cultural WHERE cod=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $cod);
            return $stmt->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }
    
    public function PesquisarEspaco($pesquisa_espacos){
        try {
            $sql ="SELECT * FROM espaco_cultural WHERE nome LIKE ? LIMIT 10";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, "%".$pesquisa_espacos."%");
            $stmt->execute();
            $espacos = $stmt->fetchALL(PDO::FETCH_ASSOC);
            return $espacos;
        } catch (PDOException $ex) {
            
        }
    }
    
    
}
