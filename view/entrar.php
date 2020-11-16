<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="../view/style.css">
        <style>
            nav1{
                width: 300px;
                height: 410px;
                background-color: #e6f3ff;
                font-size: 20px;
                float: left;
                box-sizing: border-box;
                padding: 10px;
                border-radius: 20px;           
            }
            section1{
                width: 800px;
                height: 410px;
                margin-left: 10px;
                float: left;
                background-color: #e6f3ff;
                box-sizing: border-box;
                padding-left: 10px;
                padding-right: 10px;
                border-radius: 20px;
            }

            h1{
                font-size: 50px;
                font-family: Comic Sans MS, Comic Sans, cursive;
            }

            h2{
                font-family: Comic Sans MS, Comic Sans, cursive;
                font-size: 25px;
            }
        </style>
    </head>
    <?php
    if (!isset($_SESSION["cpf"])) {
        ?>
        <body>
            <?php
            if (isset($_GET["msg"])) {
                $msg = $_GET['msg'];
                echo"<script>";
                echo"alert('$msg');";
                echo"</script>";
            }
            ?>
            <div class="container">
                <nav1>
                    <ul class="menu">
                        <a href="cadastrar.php"><li>Cadastrar</li></a>
                        <a href="entrar.php"><li>Entrar</li></a>
                        <a href="../index.php"><li>Página Inicial</li></a>
                        <br>
                        <br>

                    </ul>
                </nav1>
                <section1>
                    <div class="top"><br>
                        <img class="logo" align="left" src="../imagem/log0.jpg">
                        <h1 align="center">BEM VINDO!</h1><br>
                        <h2 align="center">Faça o login aqui</h2>
                        <br></div><hr><br> 

                    <form method="post" action="../controle/EfetuarLogin.php"> 
                        Cpf :<input name="nome" class="campo" required="required" type="text" placeholder="cpf">                                     
                        <br>
                        Senha :<input name="senha" class="campo" required="required" type="password" placeholder="  *******" >  
                        <br>
                        <br><input class="btn" type="submit" value="Entrar">       
                        <br>
                        Ainda não tem conta?<a href="cadastrar.php"> Cadastre-se aqui!</a>      
                    </form>
                </section1>
            </div>
        </body>
        <?php
    } else {

        echo"<script>";
        echo"window.location.href='../view/index1.php';";
        echo"</script>";
    }
    ?>
</html>
