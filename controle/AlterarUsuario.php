<meta charset="UTF-8">
<?php
//iniciar a sessão
session_start();
// chamar as classes DAO e DTO
require '../DTO/UsuarioDTO.php';
require '../DAO/UsuarioDAO.php';
if (empty($_SESSION["cpf"])):
    echo "<script> window.location.href='../view/index1.php'</script>";
endif;
$nome = $_POST["nome"];
if (empty($_POST["senha"])):
    $senha = $_POST["SenhaAntiga"];
else:
    $senha = md5($_POST["senha"]);
endif;
$cpf = $_POST["cpf"];
//metodos acessores 
$usuarioDTO = new UsuarioDTO();
$usuarioDTO->setCpf($cpf);
$usuarioDTO->setSenha($senha);
$usuarioDTO->setNome($nome);
// enviar para o banco de dados
$usuarioDAO = new UsuarioDAO();
$editar = $usuarioDAO->EditarUsuario($nome, $senha, $cpf);
if ($editar) {
    if ($cpf == $_SESSION["cpf"]):
        $_SESSION["nome"] = $nome;
        $_SESSION["senha"] = $senha;
        echo "<script> window.location.href='../view/index1.php'</script>";
    else:
        echo "<script> window.location.href='../view/painel.php'</script>";
    endif;
}else {
    
}
