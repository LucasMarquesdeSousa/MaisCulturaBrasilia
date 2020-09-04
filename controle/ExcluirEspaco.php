<?php
require_once'../DAO/EspacoCulturalDAO.php';
$cod = $_POST["cod"];

$excluir = new EspacoCulturalDAO();
$excluindo = $excluir->ExcluirEspacoByCPF($cod);

if($excluindo){
	$msg="Espaço Cultural Excluido com sucesso!";
	echo"<script>";
	echo"window.location.href='../view/listarEspaco.php?msg={$msg}';";
	echo"</script>";
}
