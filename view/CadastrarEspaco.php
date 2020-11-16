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
    height: 825px;
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
.nn{
	font-size:20pt;
	font-family: italic;
	border:1px solid orange;
	background-color: orange;
}
        </style>
    </head>
    <body>
	<?php
            if(empty($_SESSION["perfil_cod"]) or isset($_SESSION["perfil_cod"]) == 2):
                echo "<script>";
                echo "window.location.href='../view/entrar.php'";
                echo "</script>";
            endif;
        ?>
         <div class="container">
            <section>
                <div class="top"><br>
                <a href="../index.php"><img class="logo" align="left" src="../imagem/log0.jpg"></a>
                <h1 class="nav1">Painel</h1>
                <h2 class="nav2">Cadastrar Espaço Cultural</h2>
                <a href="../index.php" id="retornar">Retornar</a>
                <a href="../view/painel.php" id="retornar">painel</a>
                <br></div><hr><br>   
					
                <?php
					
				if(isset($_GET["msg"])){
					$msg=$_GET["msg"];
					echo"<div class='nn'>";
					echo $msg;
					echo"</div>";
				}
				?>
				
        <h2>Formulário para cadastrar Espaço Cultural.</h2><br>       
        <form method="post" enctype="multipart/form-data" action="../controle/CadastrarEspaco.php">
            Nome do Espaço:<br>
            <input name="nome" class="campo" type="text" placeholder="" required="required"/>          
            <br>           
            Descricao
            <br>
            <input type="text" name="descricao" class="campo2 "rows="4" cols="50"  placeholder=" Fale sobre seu evento de forma detalhada" required="required"/>            
            <br>
            Local:<br>
            <input name="local" class="campo" type="text" placeholder="" required="required"/>          
            <br> 
            Telefone:<br>
            <input name="data" class="campo" type="text" placeholder="" required="required"/>          
            <br> 
            Horario:<br>
            <input name="horario" class="campo" type="text" placeholder="" required="required"/>          
            <br>
            Foto:<br>
            <input name="foto" class="campo" type="file" placeholder="" required="required"/> 
            <br>
            <a><input class="btn" type="submit" value="Enviar"/></a> 
            <br><br>
        </form>
            </section>
       
      </div>  
    </body>
</html>
