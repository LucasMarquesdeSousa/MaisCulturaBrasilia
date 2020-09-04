<?php
require_once'../DAO/EventoDAO.php';
SESSION_START();
if(isset($_POST["cod"])){
$cod = $_POST["cod"];
}else{
    $cod = "";
}
$verificar = new EventoDAO();
$verificando = $verificar->getAllEvento();
$excluirDAO = new EventoDAO();
$excluido = $excluirDAO->ExcluirEventoByCPF($cod);
$nome = $_SESSION["nome"];
if($nome == "adm"){
  echo"<script>";
  echo"window.location.href='../view/listarEventos.php';";
  echo"</script>";
}else if($excluido){
  echo"<script>";
  echo"window.location.href='../view/CadastrarEvento.php'";
  echo"</script>";
}
