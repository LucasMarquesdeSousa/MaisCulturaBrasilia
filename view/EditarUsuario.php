<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="../view/home.css"/>
        <link rel="stylesheet" type="text/css" href="../view/evento.css"/>
        <style>
            .nn{
                color: blanchedalmond;
            
            }
        </style>
    </head>
    <body>
        <div class="nn">
            <?php
            $cpf = $_GET["id"];
            require_once '../DAO/UsuarioDAO.php';
            $usuarioDAO = new UsuarioDAO();
            $usuario = $usuarioDAO->getUsuarioByCPF($cpf);
            var_dump($usuario);
            die();
            ?>
        </div>
        <form action="../controle/AlterarUsuario.php" method="POST">
            <input type="text" name="nome"  value="<?= $usuario["nome"] ?>" placeholder="digite seu nome"/>
            <br>
            <input type="password" name="senha" placeholder="digite sua senha"/>
            <br>
            <input type="hidden" name="cpf" value="<?= $usuario["cpf"] ?>"/>
            <input type="hidden" name="SenhaAntiga" value="<?= $usuario["senha"] ?>"/>
            <button onclick=''> <input type='submit' value='editar'/> </button>
        </form>
    </body>
</html>
