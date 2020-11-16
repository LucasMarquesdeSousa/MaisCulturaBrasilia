<?php

require_once '../DAO/EventoDAO.php';
require_once '../DTO/Eventodto.php';
SESSION_START();
$nome = $_POST["nome"];
if (isset($_POST["cod"]) == true) {
    $cod = $_POST["cod"];
}
$telefone = $_POST["telefone"];
$tel2 = $_POST["telefone"];
$email = $_POST["email"];
$faixa_etaria = $_POST["faixa"];
$local = $_POST["local"];
$horario = $_POST["horario"];
$descricao = $_POST["descricao"];
$data = $_POST["data"];

//$evento1 = new Eventodto;
/* $evento1 ->setCod($cod);
  $evento1 ->setNome($nome);
  $evento1 ->setCpf($cpf);
  $evento1 ->setTelefone($tel1);
  $evento1 ->setTelefone($tel2);
  $evento1 ->setEmail($email);
  $evento1 ->setNome_evento($nomeEvento);
  $evento1 ->setClassificacao($faixa);
  $evento1 ->setLocal($local);
  $evento1 ->setHorario($horario);
  $evento1 ->setArtista($artista);
  $evento1 ->setDescricao($descricao); */
$foto = $_POST["foto_antiga"];
if (!empty($_FILES["foto"]["name"])) {

    $destino = "../uploads_de_imagens/" . $_FILES['foto']['name'];
    $foto = $_FILES["foto"]["name"];
    $arquivo_tmp = $_FILES["foto"]["tmp_name"];

    move_uploaded_file($_FILES["foto"]["tmp_name"], $destino);
}
//var_dump($email);
//die();
$editar = new EventoDAO();
$edita = $editar->EditarEvento($nome, $faixa_etaria, $email, $local, $horario, $foto, $telefone, $descricao, $cod, $data);

if ($edita) {
    $msg = "evento alterado com sucesso!";
    echo"<script>";
    echo"window.location.href='../view/Editar_evento.php?id=$cod';";
    echo"</script>";
} else {
    $msg = "Não foi possivel alterar esse evento!";
    echo"<script>";
    echo"window.location.href='../index.php?msg={$msg}';";
    echo"</script>";
}