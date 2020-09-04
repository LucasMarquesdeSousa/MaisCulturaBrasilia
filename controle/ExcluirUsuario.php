<?php
SESSION_START();
require_once '../DAO/UsuarioDAO.php';
$excluir_usuario =  new UsuarioDAO();
$excluindo = $excluir_usuario->ExcluirUsuario($excluindo);
if ($_SESSION["perfil_cod"] == 1) {
    echo "<script>";
    echo "window.location.href = '../view/painel.php';";
    echo "</script> ";
} else if ($excluido) {
    session_destroy();
    echo "<script>";
    echo "window.location.href = '../view/index1.php';";
    echo "</script> ";
}

