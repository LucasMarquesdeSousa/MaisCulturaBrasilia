<?php
class UsuarioDTO{
    private $cpf;
    private $nome;
    private $sobrenome;
    private $senha;
    private $dtnascimento;
    private $email;
    private $tipodelogin;
    private $cod;
    
    //get
    
     public function getCpf() {
        return $this->cpf;
    }
    
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
    public function getTipodelogin(){
        return $this-> tipodelogin;
    }
    public function getCod(){
        return $this->cod;
    }
    
    //SET

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function setCod($cod) {
        $this->cod = $cod;
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
    public function setTipodelogin($login){
        $this->tipodelogin = $login;
    }
    public function setSobrenome($sobrenome){
        $this->sobrenome = $sobrenome;
    }
}
