<?php
require_once'../DAO/EspacoCulturalDAO.php';
require_once'../DTO/EspacoCultural.php';
SESSION_START();
$nome = $_POST["nome"];
$descricao = $_POST["descricao"];
$local = $_POST["local"];
$data = $_POST["data"];
$horario = $_POST["horario"];
//$foto = $_FILE["foto"];
if(isset($_SESSION["cpf"])){
$cpf = $_SESSION["cpf"];
}else{$cpf= "";}


$espacoDTO = new EspacoCultural();
$espacoDTO->setNome($nome);
$espacoDTO->setDescricao($descricao);
$espacoDTO->setLocal($local);
$espacoDTO->setData($data);
$espacoDTO->setHorario($horario); 
$espacoDTO->setCpf($cpf); 
$espacoDTO->setFoto($_FILES['foto']['name']);

$destino = "../uploads_de_imagens/" . $_FILES['foto']['name'];
$foto  =  $_FILES['foto']["name"];
$arquivo_tmp = $_FILES['foto']['tmp_name'];

move_uploaded_file( $_FILES['foto']['tmp_name'],$destino);
$espacoDAO = new EspacoCulturalDAO();
$cadastrado = $espacoDAO->cadastrarEspaco($espacoDTO);
if($cadastrado){
	//echo"entrou"; die();
	$msg="Espaço Cultural Cadastrado com sucesso!";
	echo"<script>";
	echo"window.location.href='../view/CadastrarEspaco.php?msg={$msg}';";
	echo"</script>";
} else {
        $msg=" Não foi possivel cadastrar seu Espaço Cultural com sucesso!";
	echo"<script>";
	echo"window.location.href='../view/CadastrarEspaco.php?msg={$msg}';";
	echo"</script>";
}
