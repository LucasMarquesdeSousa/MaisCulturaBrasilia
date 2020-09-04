<?php
require_once '../conexao/conexao.php';
require_once '../DTO/Eventodto.php';
class EventoDAO {

    public $pdo = null;

    public function __construct() {
        $this->pdo = Conexao::instaciar();
    }

    public function getAllEvento() {
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
	
	public function getAllPublicarCOD(){
        try {
            $sql = "SELECT * FROM evento WHERE status='p' ORDER BY nome DESC";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $evento = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $evento;
        } catch (PDOException $exc) {
            echo "RETARDADO".$exc->getMessage();
        }
    }
	
    
    public function getAllEventoCOD($cod) {
        try {
            $sql = "SELECT * FROM evento where cod=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $cod);
            $stmt->execute();
            $evento = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $evento;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function getEventoByCPF($cod) {
        try {
            $sql = "SELECT*FROM evento where cod=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $cod);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $usuario;
        } catch (PDOException $ex) {
            
        }
    }
    
     public function getEventoUsuarioByCPF($cpf) {
        try {
            $sql = "SELECT * FROM evento WHERE usuario_cpf=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $cpf);
            $stmt->execute();
            $evento = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $evento;
        } catch (PDOException $exc) {
            echo "RETARDADO".$exc->getMessage();
        }
    }

    public function Cadastrar(Eventodto $evento) {
        try {

            $sql = "INSERT INTO evento (nome, faixa_etaria, email,local,horario, foto, telefone, descricao, usuario_cpf, status, data)
 VALUES (?,?,?,?,?,?,?,?,?,'N',?)";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $evento->getNome());
            $stmt->bindValue(2, $evento->getClassificacao());
            $stmt->bindValue(3, $evento->getEmail());
            $stmt->bindValue(4, $evento->getLocal());
            $stmt->bindValue(5, $evento->getHorario());
            $stmt->bindValue(6, $evento->getFoto());
            $stmt->bindValue(7, $evento->getTelefone());
            $stmt->bindValue(8, $evento->getDescricao());
            $stmt->bindValue(9, $evento->getCpf());
            $stmt->bindValue(10, $evento->getData());
            
            
// $stmt->bindValue(11, $evento->getArtista());

            return $stmt->execute();
        } catch (Exception $exc) {
            echo "erro ao cadastrar o evento!" . $exc->getMessage();
            die();
        }
    }

    public function EditarEvento($nome, $faixa_etaria, $email, $local, $horario, $foto, $telefone, $descricao, $cod, $data) {
        try {

            $sql = "UPDATE evento SET nome=?, faixa_etaria=?, email=?, local=?, horario=?, foto=?, telefone=?, descricao=?, data=? WHERE cod=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $nome);
            $stmt->bindValue(2, $faixa_etaria);
            $stmt->bindValue(3, $email);
            $stmt->bindValue(4, $local);
            $stmt->bindValue(5, $horario);
            $stmt->bindValue(6, $foto);
            $stmt->bindValue(7, $telefone);
            $stmt->bindValue(8, $descricao);
            $stmt->bindValue(9, $data);
            $stmt->bindValue(10, $cod);

            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            die();
        }
    }
    public function PublicarEventos($id) {
        try {

            $sql = "UPDATE evento SET status='P' WHERE cod=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $id);

            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            die();
        }
    }
    
    public function TirarEventoPagina($idTirar) {
        try {

            $sql = "UPDATE evento SET status='N' WHERE cod=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idTirar);

            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            die();
        }
    }
    public function ExcluirEventoByCPF($cod) {
        try {
            $sql = "DELETE FROM evento WHERE cod=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $cod);
            return $stmt->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }
	
	public function PesquisarEvento($pesquisar_evento) {
        try{
            $sql="SELECT * from evento where nome like ? AND status='P' ORDER BY nome DESC LIMIT 10";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, "%".$pesquisar_evento."%");
            $stmt->execute();
            $lista = $stmt->fetchALL(PDO::FETCH_ASSOC);
            return $lista;
        } catch (PDOException $exc){
            echo "Erro ao listar Usuários ".$exc->getMessage();
            die();
        }
    }
}
