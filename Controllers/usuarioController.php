<?php
class usuarioController extends Controller{
    
    public function cadastrar(){
        //1)Chamar um model
        //
        //2)Chamar uma view e juntar o back-end com front-end
        $this->CarregarTemplats('cadastrar');
    }

    public function login(){
        //1)Chamar um model
        //
        //2)Chamar uma view e juntar o back-end com front-end
        $this->CarregarTemplats('login');
    
    }
}
