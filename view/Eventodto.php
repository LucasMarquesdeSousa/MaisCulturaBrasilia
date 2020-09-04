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
	
    function getNome() {
        return $this->nome;
    }

    function getCod() {
        return $this->cod;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getNome_evento() {
        return $this->nome_evento;
    }

    function getClassificacao() {
        return $this->classificacao;
    }

    function getEmail() {
        return $this->email;
    }

    function getHorario() {
        return $this->horario;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getFoto() {
        return $this->foto;
    }

    function getLocal() {
        return $this->local;
    }

    function getArtista() {
        return $this->artista;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setCod($cod) {
        $this->cod = $cod;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setNome_evento($nome_evento) {
        $this->nome_evento = $nome_evento;
    }

    function setClassificacao($classificacao) {
        $this->classificacao = $classificacao;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setHorario($horario) {
        $this->horario = $horario;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

    function setLocal($local) {
        $this->local = $local;
    }

    function setArtista($artista) {
        $this->artista = $artista;
    }

   
}
