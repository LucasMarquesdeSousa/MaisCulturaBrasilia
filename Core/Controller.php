<?php

Class Controller {

    public $dados;
    public $dados2;
    public $dados3;
    
    public function __construct() {
        $this->dados = array();
    }

    public function CarregarTemplats($nomeView, $dadosModels = array(), $dados2 = array(), $dados3 = array()) {
        $this->dados = $dadosModels;//somente quando vai especificar uma linha no banco de dados
        $this->dados2 = $dados2;//muitos dados
        $this->dados3 = $dados3;//pegar dados de mais de uma tabela no banco de dados
        require "Views/Template.php";
    }

    public function CarregarViewNoTemplate($nomeView, $dadosModels = array()) {
        extract($dadosModels);
        require "Views/$nomeView.php";
    }

}
