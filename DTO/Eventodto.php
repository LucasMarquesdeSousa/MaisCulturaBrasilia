<?php
class Eventodto {

    private $nome;
    private $cod;
    private $cpf;
    private $telefone;
    private $nome_evento;
    private $classificacao;
    private $email;
    private $horario;
    private $descricao;
    private $foto;
    private $local;
    private $artista;
    private $data;
   
    public function getNome() {
        return $this->nome;
    }

    public function getCod() {
        return $this->cod;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getNome_evento() {
        return $this->nome_evento;
    }

    public function getClassificacao() {
        return $this->classificacao;
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

    public function getLocal() {
        return $this->local;
    }

    public function getArtista() {
        return $this->artista;
    }

    public function getData() {
        return $this->data;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setCod($cod) {
        $this->cod = $cod;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function setNome_evento($nome_evento) {
        $this->nome_evento = $nome_evento;
    }

    public function setClassificacao($classificacao) {
        $this->classificacao = $classificacao;
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

    public function setLocal($local) {
        $this->local = $local;
    }

    public function setArtista($artista) {
        $this->artista = $artista;
    }

    public function setData($data) {
        $this->data = $data;
    }


   
}
