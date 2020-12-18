<?php

class espacoController extends COntroller{
    
    public function index(){
        //1)Chamar um model
        $es = new Espaco();
        $dados = $es->getEspaco();
        //2)Chamar uma view e juntar o back-end com front-end
        $this->CarregarTemplats('espaco',array(),array(),$dados);
    }
}
