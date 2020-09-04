<?php
require_once '../DAO/UsuarioDAO.php';
$pesquisa_usuario = $_POST["palavra"];
$pesquisa = new UsuarioDAO();
$mostrar_pesquisa_usuario=$pesquisa->PesquisarUsuario($pesquisa_usuario);
 
if($mostrar_pesquisa_usuario <=0){
    
}else{
    foreach ($mostrar_pesquisa_usuario as $cv){
        echo $cv["nome"]."<br>";
    }
} 
