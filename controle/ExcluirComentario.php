<?php

session_start();
require_once'../DAO/ComentarioDAO.php';
if (isset($_GET["id"])) {
    $excluindo = $_GET["id"];
} else if (isset($_POST["cod"])) {
    $excluindo = $_POST["cod"];
} else {
    $excluindo = "";
}
$excluirComentario = new ComentarioDAO();
$excluido = $excluirComentario->ExcluirComentario($excluindo);
if ($excluido) {
    $perfil_cod = $_SESSION["perfil_cod"];
    if ($perfil_cod == 1) {
        ?>
        <script> window.location.href = '../view/listarComentarios.php';</script>
        <?php

    } else {
        ?>
        <script> window.location.href = '../index.php';</script>
        <?php

    }
}