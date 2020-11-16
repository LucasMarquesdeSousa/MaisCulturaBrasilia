<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="painelADM.css">
        <style>
       .nn{
        color: #33ff33;
        }
	.nna{
	font-size:20pt;
	font-family: italic;
	border:1px solid orange;
	background-color: black;
        color: white;
         }
         img{
             width: 100px;
             
         }
         .aa{
             font-size: 18pt;
         }
         .aa:hover{
             color: blue;
         }
        </style>
    </head>
    <body>
       <div class="container">
            <nav>
                <ul class="menu">
                    <a href=" ../index.php"><li>Página Inicial</li></a>  
                    <a href=" ../view/painel.php"><li>Usuários</li></a> 
                    <a href="../view/listarEventos.php"><li>Eventos Culturais</li></a> 
                    <a href="../view/listarEspaco.php"><li class="com">Espaços Culturais</li></a> 
                     <a href="../view/listarComentarios.php"><li>Comentarios dos eventos</li></a>
                     <a href="../view/EventosPublicados.php"><li>Eventos Publicados</li></a> 
                </ul>                  
            </nav>
            <section>
                <div class="top"><br>
                <img class="logo" align="left" src="../imagem/log0.jpg">
                <h1 align="center">Painel</h1><br>
                <h2 align="center">do Administrador</h2>
                <h3 align="center"> Espaço Cultural </h3>
                <br></div><hr><br>
               
                <?php
		if(isset($_GET["msg"])){
		$msg=$_GET["msg"];
		echo"<div class='nna'>";
		echo $msg;
		echo"</div>";
		}else{echo "";}
                SESSION_START();
	if(isset($_SESSION["perfil_cod"])){
                 $perfil = $_SESSION["perfil_cod"];
                }else{
                    $perfil="";
                }
	if($perfil == 1){
            echo"<a class='aa' href='./cadastrarEspaco.php'>Cadastrar Espaço Cultural</a><hr>";
		include_once'../DAO/EspacoCulturalDAO.php'; 
		$mostrar = new EspacoCulturalDAO();
		$amostra = $mostrar->getALLEspaco();
                foreach ($amostra as $us) {
                echo"<div class='mn'>";
                echo""; 
                echo "";
                echo "<br>";
                echo" <b>id:</b> {$us['cod']}<br>";
                echo" <b>foto:</b> {$us['foto']}<br>";
                echo"<img src='../uploads_de_imagens/{$us['foto']}'> <br>";
                echo"<b>nome do espaco:</b> {$us['nome']} <br>";
                echo"<b>descrição do espaco:</b> {$us['descricao']} <br>";
                echo"<b>local do  esapco: </b>{$us['local']} <br>";
                echo"<b>horario de visitação: </b>{$us['horario']} <br>";
                echo"<b>telefone para contato: </b>{$us['telefone']} <br>";
                echo"<a class='btn' href='../view/Editar_espaco.php?id={$us['cod']}'>Editar</a>";
		echo"<br>";
		echo"<form action='../controle/ExcluirEspaco.php' method='POST'>";
		echo"<input type='hidden' value='{$us['cod']}' name='cod'/>";
		echo"<input class='btn' type='submit' value='Excluir'/>";
		echo"</form>";
		echo"<br>";		
                echo" <br><br><br>";
                echo"<hr>";
                echo"</div>";
                 }		  
               }else{
                echo"<script>";   
                echo"window.location.href='../view/index1.php';";
                echo"</script>";   
               }
               ?>
            </section>
        </div>
        
    </body>
</html>
