<?php
require_once '../DTO/eventodto.php';
require_once '../DAO/EventoDAO.php';
SESSION_START();
$nome = htmlspecialchars($_POST["nome"]) ;
$cpf = htmlspecialchars($_SESSION["cpf"]);
//echo $cpf; die();
$data = htmlspecialchars($_POST["data"]);
$tel1 = htmlspecialchars($_POST["telefone"]);
$email = htmlspecialchars($_POST["email"]);
//$nomeEvento = $_POST["nomeEvento"];
$faixa_etaria = htmlspecialchars($_POST["faixa"]);
$local = htmlspecialchars($_POST["local"]);
$horario= htmlspecialchars($_POST["horario"]);
$artista = htmlspecialchars($_POST["artistas"]);
$descricao = htmlspecialchars($_POST["descricao"]);
//$foto = $_POST["foto"];
if($nome && $cpf && $tel1 && $email && $faixa_etaria && $local && $horario && $artista && $descricao){
            $evento = new Eventodto();
            $evento ->setNome($nome);
            $evento ->setCpf($cpf);
            $evento->setTelefone($tel1);
            $evento ->setEmail($email);
            $evento ->setNome_evento($nome);
            $evento ->setClassificacao($faixa_etaria);
            $evento ->setLocal($local);
            $evento ->setHorario($horario);
            $evento ->setArtista($artista);
            $evento ->setDescricao($descricao);
            $evento ->setData($data);
            $evento ->setFoto($_FILES['foto']['name']);

            $destino = "../uploads_de_imagens/" . $_FILES['foto']['name'];
            $target_file = $destino. basename($_FILES["foto"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            
            if($imageFileType != "jpeg"){
                
                $foto  =  $_FILES['foto']["name"];
                $arquivo_tmp = $_FILES['foto']['tmp_name'];

                move_uploaded_file( $_FILES['foto']['tmp_name'],$destino);
                //print_r($_FILES['foto']); 
                $evento2 = new EventoDAO();
                $eventos = $evento2->Cadastrar($evento);

                if($_SESSION["perfil_cod"] == 1){

                    $msg  = "evento cadastrado com sucesso!";
                    echo"<script>";
                    echo"window.location.href='../view/listarEventos.php?msg={$msg}';";
                    echo"</script>";
                    }
                else{
                    $msg1 ="evento cadastrado com sucesso!";
                    echo"<script>";
                    echo"window.location.href='../view/CadastrarEvento.php?msg={$msg1}';";
                    echo"</script>";
                }

            }else{
                
                echo"<script>";
                echo"window.location.href='../view/CadastrarEvento.php';";
                echo"</script>";
            }

}else{
    $msg  = "Não foi possivel cadastrar seu evento!";
    echo"<script>";
    echo"window.location.href='../view/CadastrarEvento.php?msg={$msg}';";
    echo"</script>";
    
}