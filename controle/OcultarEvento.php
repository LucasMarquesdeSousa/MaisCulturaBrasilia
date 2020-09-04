<?php
require_once '../DAO/EventoDAO.php';
$cod = $_GET["id"];

$ocultar = new EventoDAO();
$ocultado = $ocultar->OcultarEvento($cod);

if($ocultado){
    echo"<script>";
    echo"window.location.href='../view/ListarEventos.php';";
    echo"</script>";
}else{
    echo"<script>";
    echo"window.location.href='../view/ListarEventos.php';";
    echo"</script>";
}