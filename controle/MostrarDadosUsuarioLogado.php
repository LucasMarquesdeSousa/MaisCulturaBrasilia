<?php

class MostrarDadosUsuarioLogado {

    private $nome;
    private $perfil;
    private $cpf;
    private $dt;
    
    public function __construct() {
        session_start();
    }

    public function MostraDados() {

        if (isset($_SESSION["cpf"])) {
            $this->nome = $_SESSION["nome"];
            $this->perfil = $_SESSION["perfil_cod"];
            $this->cpf = $_SESSION["cpf"];
            $this->dt = $_SESSION["dt_nascimento"];
            
            $dados = array($this->nome, $this->perfil, $this->cpf, $this->dt);
            return $dados;
        }
    }

}
