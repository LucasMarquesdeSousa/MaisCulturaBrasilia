<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="../view/painelADM.css">

        <style>
            /*css do painel */

            PainelADM.CSS
            *{
                margin: 0;
                padding: 0;
            }

            a{
                text-decoration: none;
                color: #ccccff;
                border-radius: 20px;   
            }

            body{
                background-image: url(../imagem/ponte.jpg);
                background-size: 100%;
                background-attachment: fixed;
                background-repeat: no-repeat;
                background-color: #e6f3ff;
                font-family: Verdana;
                font-size: 100%;
                font-family: Comic Sans MS, Comic Sans, cursive;
            }

            nav{
                width: 300px;
                height: 695px;
                background-color: #e6f3ff;
                font-size: 20px;
                float: left;
                box-sizing: border-box;
                padding: 10px;
                border-radius: 20px;
            }
            .nav2{
                width: 300px;
                height: 1095px;
                background-color: #e6f3ff;
                font-size: 20px;
                float: left;
                box-sizing: border-box;
                padding: 10px;
                border-radius: 20px;
            }

            .top{
                margin-top: 20px;
                background-color: #000;
                border-radius: 8px;
                color: #fff;
                width: 800px;
                height: 210px;
            }

            .logo{
                width: 120px;
                height: 110px;
                border-radius: 10px;
            }

            h1{
                font-size: 50px;
                font-family: Comic Sans MS, Comic Sans, cursive;
            }

            h2{
                font-family: Comic Sans MS, Comic Sans, cursive;
                font-size: 25px;
            }
            h3{
                font-family: Comic Sans MS, Comic Sans, cursive;
                font-size: 25px;
            }

            ul.menu{
                list-style-type: none;
            }
            ul.menu li {
                width: 250px;
                height: 50px;
                line-height: 50px;
                background-color: #000;
                color: #fff;
                margin-top: 5px;
                box-sizing: border-box;
                padding-left: 10px;
                border-radius: 10px;
            }

            .container1{

                margin: auto;
                width: 1200px;
                height:600px;
                margin-top: 110px;
                margin-left: 25%;
                padding: 10px;  
            }

            section{
                width: 820px;
                height: 100%;
                margin-left: 10px;
                float: left;
                background-color: #e6f3ff;
                box-sizing: border-box;
                padding-left: 10px;
                padding-right: 10px;
                border-radius: 20px;  
            }
            .sex{
                width: 820px;
                height: 100%;
                margin-left: 10px;
                float: left;
                background-color: #e6f3ff;
                box-sizing: border-box;
                padding-left: 10px;
                padding-right: 10px;
                border-radius: 20px;  
            }
            .btn{
                width: 150px;
                height: 35px;
                border: 1px solid #ddd;
                border-radius: 5px;
                font-size: 16px;
                font-family: Comic Sans MS, Comic Sans, cursive;
                margin-right: 20vw;
                margin-top: 0.5vw;
            }
            .btn:hover{
                transform: translateY(-3px);
                box-shadow: 0 12px 16px rgba(0, 0, 0, 0.2);
            }
            li:hover{
                background:#fff;
                box-shadow: 2px 2px 13px #fff inset, -2px -2px 5px #fff inset;
                color: #fff;
            }

            .search{
                width: 250px;
                height: 30px;
                border-radius: 5px;
            }

            .pesquisar{
                width: 100px;
                height: 35px;
                border: 1px solid #ddd;
                border-radius: 5px;
                font-size: 16px;
                font-family: Comic Sans MS, Comic Sans, cursive;
            }

            .menu{
                display: flex;
                align-content: center;
                margin-bottom: 25px;
                box-sizing: border-box;
                padding-left: 10px;
                display: grid;
                flex-wrap: wrap;
            }

            .banner{
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding-left: 40px;
                background-color: rgba(24,199,199,0);
                box-sizing: border-box;
            }
            .chidori{
                width: 150px;
                height: 35px;
                border: 1px solid #ddd;
                border-radius: 20px;
                font-size: 16px;
                font-family: Comic Sans MS, Comic Sans, cursive;
                float: right;
                background-color: #ddd;
            }

            .rasengan{
                margin-left: 650px;
                width: 150px;
                height: 35px;
                font-size: 16px;
                font-family: Comic Sans MS, Comic Sans, cursive;
                border-radius: 20px;
                background-color: #ddd
            }

            .campo{
                width: 400px;
                height: 20px;


            }
            form{
                text-align: center; 
            }



        </style>
    </head>
    <body>
        <script>
            function EditarUsu() {
                if (confirm('Que mesmo editar esse usu�rio?'))
                    return true;
                else
                    return false;
            }
        </script>
        <div class="container1">
            <section>
                <div class="top"><br>
                    <a href="../index.php"><img class="logo"  align="left" src="../imagem/log0.jpg"></a>
                    <h1 align="center">Alterar</h1>
                    <a href="../index.php">Retornar</a>
                    <br></div><hr><br><br>
                <div class="nn">

                </div>
                <?php
                if (isset($_GET["id"])) {
                    $cpf = $_GET["id"];
                } else {
                    $cpf = "";
                }
                require_once '../DAO/UsuarioDAO.php';
                $usuarioDAO = new UsuarioDAO();
                $usuario = $usuarioDAO->getUsuarioByCPF($cpf);
                ?>
                <form action="../controle/AlterarUsuario.php" method="POST">            
                    <input  type="text" name="nome" class="campo" required="required" value="<?= $usuario["nome"] ?>">
                    <br>
                    <input type="password" name="senha" class="campo" placeholder="Nova senha">
                    <br>
                    <input type="hidden" name="cpf" value="<?=$usuario["cpf"]?>"/>
                    <input type="hidden" name="SenhaAntiga" value="<?=$usuario["senha"]?>"/>
                    <button class="btn" onclick='return EditarUsu();'>Editar</button>
                </form>

            </section>
        </div>
    </body>
</html>
