<?php

Class homeController extends Controller{
    
    public function index(){
        //1)Chamar um model
        $evento = new Evento();
        $dados1 = $evento->getEvento();
        
        $espaco = new Espaco();
        $dados2 = $espaco->getEspaco();
        //2)chamar uma view e Juntar back-end com front-end
        $this->CarregarTemplats('home', array(), $dados1, $dados2);
                
    }
}