<?php
require_once'../DAO/ComentarioDAO.php';

$cod = $_GET["id"];

$excluirComentario = new ComentarioDAO();
$excluido = $excluirComentario->ExcluirComentarioEspaco($cod);
if($excluido){
	echo"<script>";
	echo"window.location.href='../view/index1.php';";
	echo"</script>";
}
