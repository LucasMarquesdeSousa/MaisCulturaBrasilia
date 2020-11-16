<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="../view/painelADM.css">
        <style>
            .nn{
                color: #33ff33;
                display: inline-block;
            }
            a:hover{color:#0062cc;}
				button{
					
				}
        </style>
    </head>
    <body>
		<script> 
		function ExcluirEve(){
			if(confirm('Que mesmo excluir esse evento?'))
					return true;
				else
					return false;
		}
		
		function PublicarEve(){
			if(confirm('Que mesmo publcar esse evento?'))
					return true;
				else
					return false;
		}
		
		
		</script>
        <div class="container">
           <nav class="nav2">
                <ul class="menu">
                    <a href=" ../index.php"><li>Página Inicial</li></a>  
                    <a href=" ../view/painel.php"><li>Usuários</li></a> 
                    <a href="../view/listarEventos.php"><li class="com">Eventos Culturais</li></a> 
                    <a href="../view/listarEspaco.php"><li>Espaços Culturais</li></a> 
                     <a href="../view/listarComentarios.php"><li>Comentarios dos eventos</li></a>
                     <a href="../view/EventosPublicados.php"><li>Eventos Publicados</li></a> 
                </ul>                  
            </nav>
           <section class="sex">
                <div class="top"><br>
                <img class="logo" align="left" src="../imagem/log0.jpg">
                <h1 align="center">Painel</h1><br>
                <h2 align="center">do Administrador</h2>                                   
                <br></div><hr><br>                
                                
                <?php
                SESSION_START();
                if(isset($_SESSION["perfil_cod"])){
                 $perfil = $_SESSION["perfil_cod"];
                }else{
                    $perfil="";
                }
                
	if($perfil == 1){
	        echo"<a href='../controle/EfetuarLogoff.php'> Sair </a>";
                echo"<p>Usuários<p> ";
		echo"<a href='../view/CadastrarEvento.php'> Cadastrar</a>";echo"<hr>";
                include_once'../DAO/Eventodao.php'; 
		$mostrar = new eventodao();
		$amostra = $mostrar->getALLEvento();
                foreach ($amostra as $us) {
                    if($us["status"] == 'N'){
                $img = $us["foto"];
                echo"<div class='mn'>";
                echo"<b>Foto:</b> <br>";
                echo "<a href='../uploads_de_imagens/$img'><img src=' ../uploads_de_imagens/$img' width='100' />";
                echo " </a> </td> <br>";
                echo"<b>Nome de evento:</b> {$us['nome']} <br>";
                echo"<b>Descrição do evento:</b> {$us['descricao']} <br>";
                echo"<b>Faixa_etaria do evento: </b>{$us['faixa_etaria']} <br>";
                echo"<b>Local de evento: </b>{$us['local']} <br>";
                echo"<b>Data do evento: </b>{$us['data']} <br>";
                echo"<b>Horario de evento: </b>{$us['horario']} <br>";
                echo"<b>Telefone de evento: </b>{$us['telefone']} <br>";
                echo"<b>Email do evento:</b> {$us['email']} <br>";
                echo"<a class='chidori' href='../view/Editar_evento.php?id={$us["cod"]}'>Alterar</a>";
                echo"<br>";
				echo"<br><br>";
                echo"<form action='../controle/ExcluirEvento.php' method='POST'>";
                echo"<input type='hidden' value='{$us["cod"]}' name='cod'/>";
                echo"<input class='rasengan' type='submit' value='Excluir' onclick='return ExcluirEve();'/>";
                echo"</form>";
                echo"<br>";
                echo"</script>";
                if($us["status"] == 'N'){
                echo"<a class='chidori' href='../view/index1.php?id={$us["cod"]}' onclick='return PublicarEve();'>Publicar</a>";
                }else{
                    echo"<a class='chidori' href='../controle/OcultarEvento.php?id={$us["cod"]}'> Ocultar </a>";
                }
                echo" <br><br>";
                echo"<hr>";
				echo"<br>";
				echo"</div>";
                 }					  
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
