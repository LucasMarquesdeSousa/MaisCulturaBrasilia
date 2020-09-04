<?php
session_start();
if (isset($_SESSION["cpf"])):
    require_once '../DAO/ComentarioDAO.php';
    $comentario = $_POST["comentario"];
    $cpf = $_SESSION["cpf"];
    $evento = $_POST["evento"];
    $data = date('Y-m-d');
    $comentarDAO = new ComentarioDAO();
    $comentado = $comentarDAO->CadastrarComentarioEvento($comentario, $cpf, $evento, $data);
    if ($comentado):
        echo "<script> window.location.href = '../view/index1.php'</script>"; 
    else:
       echo"<script> window.location.href = '../view/entrar.php'</script>";
   endif;
endif;

