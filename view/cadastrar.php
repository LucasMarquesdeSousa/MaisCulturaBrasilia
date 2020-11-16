<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script type="text/javascript" src="../js/jquery-3.4.1.js"></script>
        <script type="text/javascript" src="../js/jQuery-validation/dist/jquery.validate.js"></script>
        <script type="text/javascript" src="../js/jQuery-validation/dist/additional-methods.min.js"></script>
        <script type="text/javascript" src="../js/jQuery-validation/dist/localization/messages_pt_BR.js" ></script>
        <!-- consultar usuário -->
        <script type="text/javascript" src="../controle/ConsultarCPF.js"></script>
        <!-- consultar usuário -->
        <script>
            $(document).ready(function () {
                $("#formulario").validate({
                    rules: {
                        cpf: {
                            required: true,
                            cpfBR: true
                        }
                    }
                });
            });
        </script>
        <style>
            h1{
                font-size: 50px;
                font-family: Comic Sans MS, Comic Sans, cursive;
            }
            h2{
                font-family: Comic Sans MS, Comic Sans, cursive;
                font-size: 25px;
            }
            .log{
                width: 250px;
                height: 250px;
                border-radius: 10px;
                margin-top: 80px;
                margin-left: 15px;
            }
        </style>
    </head>
    <body>
        <?php
        session_start();
        if (isset($_GET["msg"])) {
            $msg = $_GET["msg"];
            echo"<script>";
            echo"alert('$msg');";
            echo"</script>";
        } else {
            
        }
        ?>
        <div class="container">
            <nav>
                <ul class="menu">
                    <?php if (isset($_SESSION["cpf"])): ?>
                        <a href="../view/cadastrar.php"><li>Cadastrar</li></a>
                        <a href="../index.php"><li>Página Inicial</li></a>
                        <a href="../view/painel.php"><li>Painel</li></a>
                    <?php else: ?>
                        <a href="../index.php"><li>Página Inicial</li></a>
                        <a href="../view/cadastrar.php"><li>Cadastrar</li></a>
                        <a href="../view/entrar.php"><li>Entrar</li></a>				                    
                    <?php endif; ?>
                </ul>
            </nav>
            <section>
                <div class="top"><br>
                    <img class="logo" align="left" src="../imagem/log0.jpg"> 
                    <h1 align="center">BEM VINDO!</h1><br>
                    <h2 align="center">Cadastre-se aqui</h2>
                    <br></div><hr><br>                                

                <form method="POST" action="../controle/CadastrarUsuario.php" id="formulario">  
                    <input type="text" name="cpf" class="campo" id="cpf" maxlength="30" placeholder="cpf" required autofocus/> 
                    <ul class="resultado" color="black"> </ul>
                    <br>
                    <input name="nome" type="text" class="campo" maxlength="30" placeholder="  Nome" required autofocus/>  
                    <br>
                    <input name="senha" type="password" class="campo" maxlength="20" placeholder="  Senha" required />
                    <br>
                    <input name="email" type="email" class="campo" maxlength="50" placeholder="  Email" required/> 
                    <br>Data de Nascimento<br>
                    <input name="dtnascimento" type="date" class="campo" placeholder="" required/>
                    <br><button> <input class="btn" type="submit" value="Cadastrar"/></button>
                    Já tem conta?<a href="entrar.php"> Clique aqui!</a>                  
                </form>
            </section>
        </div>        
    </body>
</html>
