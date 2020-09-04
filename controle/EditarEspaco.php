<?php
require_once'../DAO/EspacoCulturalDAO.php';
require_once'../DTO/EspacoCultural.php';
$cod = $_POST["cod"];
$nome = $_POST["nome"];
$descricao = $_POST["descricao"];
$local = $_POST["local"];
$data = $_POST["data"];
$horario = $_POST["horario"];
$espacoDTO = new EspacoCulturalDAO();
$editar = $espacoDTO->EditarEspaco( $nome  , $local ,  $data , $horario , $descricao , $cod);

if($editar){
	$msg="Espaço Cultural Editado com sucesso!";
	echo"<script>";
	echo"window.location.href='../view/listarEspaco.php?msg={$msg}';";
	echo"</script>";
}
