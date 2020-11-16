<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../view/painelADM.css">
        <title> </title>
    </head>
    <body>
        <script>
            function ExcluirCom() {
                if (confirm('Que mesmo excluir esse comentario?'))
                    return true;
                else
                    return false;
            }
        </script>
        <div class="container">
            <nav>
                <ul class="menu">
                    <a href=" ../index.php"><li>Página Inicial</li></a>  
                    <a href=" ../view/painel.php"><li>Usuários</li></a> 
                    <a href="../view/listarEventos.php"><li>Eventos Culturais</li></a> 
                    <a href="../view/listarEspaco.php"><li>Espaços Culturais</li></a> 
                    <a href="../view/listarComentarios.php"><li class="com">Comentarios dos eventos</li></a>
                    <a href="../view/EventosPublicados.php"><li>Eventos Publicados</li></a> 
                </ul>                  
            </nav>
            <section>
                <div class="top"><br>
                    <img class="logo" align="left" src="../imagem/log0.jpg">
                    <h1 align="center">Painel</h1><br>
                    <h2 align="center">do Administrador</h2>
                    <h3 align="center"> Comentario do evento e espaços culturais </h3>
                    <br></div><hr><br>
                <?php
                if (isset($_GET["msg"])) {
                    $msg = $_GET["msg"];
                    echo"<div class='nna'>";
                    echo $msg;
                    echo"</div>";
                } else {
                    echo "";
                }
                SESSION_START();
                if (isset($_SESSION["perfil_cod"])) {
                    $perfil = $_SESSION["perfil_cod"];
                } else {
                    $perfil = "";
                }
                if ($perfil == 1) {
                    include_once'../DAO/ComentarioDAO.php';
                    $mostrar = new ComentarioDAO();
                    $amostra = $mostrar->getAllComentario();
                    foreach ($amostra as $us) {
                        echo"<div class='mn'>";
                        echo " </a> </td> <br>";
                        echo" <b>id:</b> {$us['cod']}<br>";
                        echo"<b>comentário do evento:</b> {$us['comentario']} <br>";
                        echo"<b>data do evento: </b>{$us['data']} <br>";
                        echo"<a class='btn' href='../view/Editar_espaco.php?id={$us['cod']}'>Editar</a>";
                        echo"<br>";
                        echo"<form action='../controle/ExcluirComentario.php' method='POST'>";
                        echo"<input type='hidden' value='{$us['cod']}' name='cod'/>";
                        echo"<input class='btn' type='submit' value='Excluir' onclick='return ExcluirCom();'/>";
                        echo"</form>";
                        echo"<br>";
                        echo"</script>";
                        //echo"<a class='btn' href='../view/index1.php'> publicar</a> <script conform('que mesmo publicar esse evento??)'>  </script> ";

                        echo" <br><br><br>";
                        echo"<hr>";
                        echo"</div>";
                    }
                } else {
                    echo"<script>";
                    echo"window.location.href='../view/index1.php';";
                    echo"</script>";
                }
                ?>
                </body>
                </html>
