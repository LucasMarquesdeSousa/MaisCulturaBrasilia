<?php
class Usuario{

    private $nome;
    private $sobrenome;
    private $senha;
    private $dtnascimento;
    private $email;
    private $sexo;
    
    public function getNome() {
        return $this->nome;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getDtnascimento() {
        return $this->dtnascimento;
    }

    public function getEmail() {
        return $this->email;
    }
    public function getSobrenome(){
        return $this->sobrenome;
    }
    public function getSexo(){
        return $this->sexo;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function setDtnascimento($dtnascimento) {
        $this->dtnascimento = $dtnascimento;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
    public function setSexo($sobrenome){
        $this->sobrenome = $sobrenome;
    }
    public function setSobrenome($sexo){
        $this->sobrenome = $sexo;
    }
}
