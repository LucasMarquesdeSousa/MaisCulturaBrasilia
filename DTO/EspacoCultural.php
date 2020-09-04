<?php
class EspacoCultural {
    public $foto;
    public $data;
    public $local;
    public $nome;
    public $horario;
    public $cod;
    public $descricao;    
    public $cpf;
    
    
    public function getFoto() {
        return $this->foto;
    }
    public function getData() {
        return $this->data;
    }

    public function getLocal() {
        return $this->local;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getHorario() {
        return $this->horario;
    }

    public function getCod() {
        return $this->cod;
    }
    public function getDescricao() {
        return $this->descricao;
    }	
    public function getCpf() {
        return $this->cpf;
    }
    public function setData($data) {
        $this->data = $data;
    }

    public function setLocal($local) {
        $this->local = $local;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setHorario($horario) {
        $this->horario = $horario;
    }

    public function setCod($cod) {
        $this->cod = $cod;
    }
    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }
    public function setFoto($foto) {
        $this->foto = $foto;
    }
}
