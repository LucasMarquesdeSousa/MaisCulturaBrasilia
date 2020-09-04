<meta charset="UTF-8">
<?php 

 $pesquisar_usuario = filter_input(INPUT_POST, 'pesquisar_usu', FILTER_SANITIZE_STRING);
 if($pesquisar_usuario){
     echo $pesquisar_usuario = filter_input(INPUT_POST, 'pesquisas', FILTER_SANITIZE_STRING);;
 }
require_once'../DAO/EventoDAO.php';
if(isset($_GET["id"])){
$cod = $_GET["id"];
}else{
    $cod="";
}
$eventoDAO = new EventoDAO();
$eventoDAO->PublicarEventos($cod);

	//echo"entrou"; die();
	$msg="Espaço Cultural Cadastrado com sucesso!";
	echo"<script>";
	echo"window.location.href='../view/index1.php?msg={$msg}';";
	echo"</script>";
