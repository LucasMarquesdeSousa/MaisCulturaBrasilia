<?php

require_once '../DAO/LoginDAO.php';
if (isset($_POST["nome"])) {
    $nome = md5($_POST["nome"]);
} else {
    $nome = "";
}
if (isset($_POST["senha"])) {
    
    $senha = md5($_POST["senha"]);
} else {
    $senha = "";
}
$loginDAO = new LoginDAO();
$usuarios = $loginDAO->Login($nome, $senha);
//var_dump($usuarios);
//die();
if ($usuarios) {
    session_start();
    $_SESSION["nome"] = $usuarios["nome"];
    $_SESSION["cpf"] = $usuarios["cpf"];
    $_SESSION["senha"] = $usuarios["senha"];
    $_SESSION["perfil_cod"] = $usuarios["perfil_cod"];
    $_SESSION["dt_nascimento"] = $usuarios["dt_nascimento"];
    if (isset($_SESSION["perfil_cod"]) == 1) {
        $msg1 = "Admistrador Está no comando!";
        echo "<script>";
        echo "window.location.href = '../view/painel.php?msgs={$msg1}';";
        echo "</script>";
    } else {
        $msg1 = "Seja bem-vindo, agora você pode publlicar o seu proprio evento";
        echo "<script>";
        echo "window.location.href = '../view/index1.php?msgs={$msg1}';";
        echo "</script>";
    }
} else {
    echo "<script>";
    echo "window.location.href = '../view/entrar.php';";
    echo "</script> ";
}

