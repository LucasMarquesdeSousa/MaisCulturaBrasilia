<?php
class Evento {

    private $nome;
    private $cpf;
    private $telefone1;
    private $telefone2;
    private $nome_evento;
    private $classicacao;
    private $email;
    private $horario;
    private $descricao;
    private $foto;
    private $local;
    private $artista;
    
    public function getNome() {
        return $this->nome;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getTelefone1() {
        return $this->telefone1;
    }
 public function getTelefone2() {
        return $this->telefone2;
    }
    public function getNome_evento() {
        return $this->nome_evento;
    }

    public function getClassicacao() {
        return $this->classicacao;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getHorario() {
        return $this->horario;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getFoto() {
        return $this->foto;
    }
    public function getLocal(){
        return $this->local;
    }
    public function getArtista(){
        return $this->artista;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function setTelefone1($telefone1) {
        $this->telefone = $telefone1;
    }
 public function setTelefone2($telefone2) {
        $this->telefone = $telefone2;
    }
    public function setNome_evento($nome_evento) {
        $this->nome_evento = $nome_evento;
    }

    public function setClassicacao($classicacao) {
        $this->classicacao = $classicacao;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setHorario($horario) {
        $this->horario = $horario;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }
    public function setLocal($local){
        $this->local = $local;
    }
    public function setArtista($artista){
        $this->artista = $artista;
    }
}
