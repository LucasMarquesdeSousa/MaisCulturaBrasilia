<?php
require_once '../DAO/UsuarioDAO.php';
$pesquisa_usuario = md5($_POST["palavra"]);
$consuta = new UsuarioDAO();
$consultando = $consuta->PesquisarUsuarioByCPF($pesquisa_usuario);
if($consultando){
   echo"CPF já existente!"; 
}else{
    
}