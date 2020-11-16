<?php
session_start();
//ligacao com banco de dados
require_once '../DAO/UsuarioDAO.php';
// metodos acessores
require_once '../DTO/UsuarioDTO.php';

$nome = htmlspecialchars($_POST["nome"]) ;
$email = htmlspecialchars($_POST["email"]);
$dtnascimento = htmlspecialchars($_POST["dtnascimento"]);  
$cpf = md5($_POST["cpf"]);
$senha = md5($_POST["senha"]);
$tipodelogin = 2;
$usu1DTO = new UsuarioDTO();
$usu1DTO->setEmail($email);
$usu1DTO->setNome($nome);
$usu1DTO->setSenha($senha);
$usu1DTO->setDtnascimento($dtnascimento);
$usu1DTO->setTipodelogin($tipodelogin);
$usu1DTO->setCpf($cpf);

$usu1DAO = new UsuarioDAO();
$retorno = $usu1DAO->CadastrarUsuario($usu1DTO);
if ($retorno) {
    if (isset($_SESSION["perfil_cod"])== 1) {
        $msg1 = "Usuário cadastrado com sucesso!!!";
        echo"<script>";
        echo"window.location.href='../view/painel.php?msg={$msg1}';";
        echo"</script>";
    } else {
        $msg = "usuário cadastrado com sucesso!";
        echo"<script>";
        echo"window.location.href='../view/entrar.php?msg={$msg}';";
        echo"</script>";
    }
} else {
    $msg = "CPF já existente";
    echo"<script>";
    echo"window.location.href = '../view/cadastrar.php?msg={$msg}';";
    echo"</script>";
}				