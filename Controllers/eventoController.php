<?php

class eventoController extends Controller {
    
    public function index(){
        //1)Chamar um model
        $e = new Evento();
        $dados = $e->getEvento();
        //2)Chamar uma view e juntar o back-end com front-end
        $this->CarregarTemplats('evento',array(),$dados);
    }
    
    public function anunciareventos(){
        //1)Chamar um model
        //2)Chamar uma view e juntar o back-end com front-end
        $this->CarregarTemplats('anunciareventos');
    }
}
