<?php

require_once '../conexao/conexao.php';

class UsuarioDAO {

    //editar
    //excluir
    //cadastrar
    //pesquisar
    private $pdo = null;

    public function __construct() {
//        $this->pdo = Conexao::Instaciar();
        $this->pdo = Conexao::instaciar();
    }

    public function getAllUsuario($inicio, $quantidade) {
        try {

            $sql = "SELECT*FROM usuario ORDER BY nome ASC LIMIT $inicio, $quantidade ";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $inicio);
            $stmt->bindValue(2, $quantidade);
            $stmt->execute();
            $usuario = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $usuario;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }

    public function getAll() {
        try {

            $sql = "SELECT COUNT(nome) AS mostrar FROM usuario";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $usuario;
        } catch (PDOException $ex) {
            
        }
    }

    public function PaginaALL() {
        try {

            $sql = "SELECT COUNT(nome) AS resultado FROM usuario";

            $stmt = $this->pdo->prepare($sql);
//            $stmt->bindValue(1, $inicio);
//            $stmt->bindValue(2, $quantidade);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $usuario;
        } catch (PDOException $ex) {
            
        }
    }

    public function getUsuarioByCPF($cpf) {
        try {

            $sql = "SELECT*FROM usuario where cpf=?";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $cpf);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $usuario;
        } catch (PDOException $ex) {
            
        }
    }

    public function CadastrarUsuario(UsuarioDTO $usuario) {
        try {
            $sql = "INSERT INTO usuario(cpf , nome, senha, email, dt_nascimento, perfil_cod) VALUES(?,?,?,?,?,?)";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $usuario->getCpf());
            $stmt->bindValue(2, $usuario->getNome());
            $stmt->bindValue(3, $usuario->getSenha());
            $stmt->bindValue(4, $usuario->getEmail());
            $stmt->bindValue(5, $usuario->getDtnascimento());
            $stmt->bindValue(6, $usuario->getTipodelogin());
            return $stmt->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }

    public function EditarUsuario($nome, $senha, $cpf) {
        try {

            $sql = "UPDATE usuario SET nome=?, senha=? WHERE cpf=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $nome);
            $stmt->bindValue(2, $senha);
            $stmt->bindValue(3, $cpf);
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            die();
        }
    }

    public function ExcluirUsuario($excluindo) {
        try {
            $sql = "DELETE FROM usuario WHERE nome=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $excluindo);
            return $stmt->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function ExcluirUsuarioByCPF($cpf) {
        try {
            $sql = "DELETE FROM usuario WHERE cpf=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $cpf);
            return $stmt->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }

    public function PesquisarUsuario($pesquisa_usuario) {
        try {
            $sql = "SELECT * FROM usuario WHERE nome LIKE ? LIMIT 5";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, "%" . $pesquisa_usuario . "%");
            $stmt->execute();
            $pesquisa = $stmt->fetchALL(PDO::FETCH_ASSOC);
            return $pesquisa;
        } catch (PDOException $ex) {
            
        }
    }

    public function PesquisarUsuarioByCPF($pesquisa_usuario) {
        try {
            $sql = "SELECT * FROM usuario WHERE cpf LIKE ? LIMIT 5";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, "%" . $pesquisa_usuario . "%");
            $stmt->execute();
            $pesquisa = $stmt->fetchALL(PDO::FETCH_ASSOC);
            return $pesquisa;
        } catch (PDOException $ex) {
            
        }
    }

    public function UsuarioEntrou($nome) {
        try {
            $sql = "UPDATE usuario SET executado='S' WHERE cpf=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $nome);
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function UsuarioSaiu($nome) {
        try {
            $sql = "UPDATE usuario SET executado='N' WHERE cpf=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $nome);
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}
