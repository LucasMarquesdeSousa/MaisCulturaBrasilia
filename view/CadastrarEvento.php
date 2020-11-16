<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            *{
                margin: 0;
                padding: 0;
            }

            a{
                text-decoration: none;
                color: #222;
                border-radius: 20px;
            }

            body{
                background-color: #222;
                font-family: Verdana;
                font-size: 100%;
                font-family: Comic Sans MS, Comic Sans, cursive;
            }

            .logo{
                width: 110px;
                height: 100px;
                border-radius: 10px;

            }

            .container{
                margin: auto;
                width: 1200px;
                margin-top: 20px;
                margin-left: 25%;
                padding: 10px;
            }

            .top{
                margin-top: 20px;
                background-color: #000;
                border-radius: 8px;   
            }

            .nav1{
                padding-top: 15px;
                margin-left: 330px;
                color: #fff;
            }
            .nav2{   
                margin-left: 270px;
                line-height: 40px;
                color: #fff;
            }
            .nav3{
                margin-left: 285px;
                line-height: 30px;
            }

            section{
                width: 800px;
                height: 1325px;
                margin-left: 10px;
                float: left;
                background-color: #e6f3ff;
                box-sizing: border-box;
                padding-left: 10px;
                padding-right: 10px;
                border-radius: 20px;   
            }

            ul.menu{
                list-style-type: none;
            }
            ul.menu li {
                width: 250px;
                height: 50px;
                line-height: 50px;
                background-color: #777;
                color: #fff;
                margin-top: 5px;
                box-sizing: border-box;
                padding-left: 10px;
                border-radius: 10px;
            }

            .btn{
                width: 150px;
                height: 35px;
                border: 1px solid #ddd;
                border-radius: 20px;
                font-size: 16px;
                cursor: pointer;
                font-family: Comic Sans MS, Comic Sans, cursive;
            }
            .btn:hover{
                transform: translateY(-1px);
                box-shadow: 0 12px 16px rgba(0, 0, 0, 0.2);
            }

            .campo{
                width: 300px;
                height: 30px;
                border-radius: 20px;
                margin-top: 5px;
                margin-bottom: 10px;
                font-family: Comic Sans MS, Comic Sans, cursive;
            }
            .campo2{
                width: 300px;
                height: 100px;
                border-radius: 5px;
                margin-top: 5px;
                margin-bottom: 10px;
                font-family: Comic Sans MS, Comic Sans, cursive;
            }

            .aviso{
                line-height: 25px;
                font-size: 19px;
            }

            #retornar{
                color: #fff;
                text-decoration: none;
                font-size:20px;   
                margin-left: 690px;
            }
            #retornar:hover{
                color: blue;
            }
            .as{
                border: 1px solid black;
                background-color: orange;
                color: white;
            }
        </style>
    </head>
    <body>
        <?php
        if (isset($_SESSION["cpf"])) {
            $cpf = $_SESSION["cpf"];
            ?>
            <div class="container">
                <section>
                    <div class="top"><br>
                        <a href="../index.php"><img class="logo" align="left" src="../imagem/log0.jpg"></a>
                        <h1 class="nav1">BEM-VINDO!</h1>
                        <h2 class="nav2">Anuncie seu evento aqui</h2>
                        <h3 class="nav3"><font color="red">*<font color="blue">É necessário estar logado</font>*</font></h3>
                        <?php
                        require_once '../DAO/EventoDAO.php';
                        $editarevent = new EventoDAO();
                        $mostrarALL = $editarevent->getEventoUsuarioByCPF($cpf);
                        if ($mostrarALL):
                            ?>
                            <a href="../index.php" id="retornar">Retornar</a>
                            <a href="../view/Editar_evento.php" id="retornar">Editar</a>
                        <?php endif; ?>
                        <br></div><hr><br>                

                    <h2>Formulário para cadastrar evento.</h2><br>       
                    <?php
                    if (isset($_GET["msg"])) {
                        $msg = $_GET["msg"];
                        echo"<div class='as'>";
                        echo $msg;
                        echo"</div>";
                    }
                    ?>
                    <form method="post" enctype="multipart/form-data" action="../controle/CadastrarEvento.php">
                        Nome do evento:<br>
                        <input name="nome" class="campo" type="text" placeholder="" required="required"/>          
                        <br>
                        <!--CPF:--><br> 
                        <input name="cpf" class="campo" type="hidden" placeholder=" Sem pontos" required="required"/>

                        Telefone 1:<br>
                        <input name="telefone" class="campo" type="tel" placeholder=" Tel 1" required="required"/>
                        <br>
                        Email:<br>
                        <input name="email" class="campo" type="text" placeholder=" seuemail@eventos.com" required="required"/> 
                        <br>
                        Faixa etária-mínima:<br> 
                        <input name="faixa" class="campo" type="text" placeholder=" ex. livre" required="required"/> 
                        <br>
                        Local:<br> 
                        <input name="local" type="local" class="campo" placeholder=" ..." required="required"/> 
                        <br>
                        Data:<br>
                        <input name="data" type="date" class="campo" placeholder=" ..." required="required"/> 
                        <br>
                        Horário de ínicio e fim:<br>
                        <input name="horario" class="campo" type="time"  placeholder=" ..." required="required"/> 
                        <br>
                        Artistas:<br>
                        <input name="artistas" type="text" class="campo" placeholder=" ..." required="required"/>  
                        <br>
                        Descrição do evento:<br> 
                        <input type="text" name="descricao" class="campo2 "rows="4" cols="50"  placeholder=" Fale sobre seu evento de forma detalhada" required="required"/>            
                        <br>
                        Foto:<br> 
                        <input type="file" name="foto"  class="campo" value=" escolha uma foto para seu evento!" required="required"/> 
                        <br>
                        <a><input class="btn" type="submit" value="Enviar" required="required"/></a> 
                        <br><br>
                        <p class="aviso" align="center"><font color="red">Os dados serão enviados ao administrador para analise. 
                            Após a analise, se todos os dados forem autênticos, o evento
                            será adcionado na página.</font><p>
                    </form>
                </section>

            </div> 
            <?php
        } else {
            echo"<script>";
            echo"window.location.href='../view/entrar.php';";
            echo"</script>";
        }
        ?>
    </body>
</html>
