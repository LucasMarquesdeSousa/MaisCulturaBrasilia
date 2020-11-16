<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="style.css">
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
a:hover{
    color: #0000cc;
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
    
    
}
#retornar:hover{
    color: blue;
}
.retornar{
    color: #0099cc;
    text-decoration: none;
    font-size:20px;   
    background-color: black;   
    float: right;
    
}
.retornar:hover{
    
}
        </style>
    </head>
    <body>
		<script>
		function EditarEve(){
			if(confirm('Que mesmo editar esse evento?'))
				return true;
			else
				return false;
		}
                function ExcluirUsu(){
                if(confirm('Que mesmo excluir essa conta?'))
                                return true;
                        else
                                return false;
                }
		</script>
	<?php 
			SESSION_START();
			if(isset($_GET["id"]) == true){
				$cod = $_GET["id"];
			}else{$cod = "";}
			
            require_once '../DAO/Eventodao.php';
            $eventoDAO = new Eventodao();
            $evento = $eventoDAO->getEventoByCPF($cod);
	?>
         <div class="container">
            <section>
                <div class="top"><br>
                <a href="../index.php"><img class="logo" align="left" src="../imagem/log0.jpg"></a>
                <h1 class="nav1">BEM-VINDO!</h1>
                <h2 class="nav2">Edite seu evento aqui</h2>
                <a href="../index.php" id="retornar">Retornar</a>
                <a href="../view/Editar_evento.php?id1=1" class="retornar"> seus eventos </a>
                
                <br></div><hr><br>                
              <?php 
                      if(isset($_GET["id1"])== 1){
                      require_once '../DAO/EventoDAO.php';
                      if(isset($_SESSION["cpf"]) == true){
                      $cpf = $_SESSION["cpf"];
                      }else{
                          $cpf="";
                      }
                      
                      $motrarEventosUsuario = new EventoDAO();
                      $mmm = $motrarEventosUsuario->getEventoUsuarioByCPF($cpf);
                      echo"seus eventos<br><br>";
                      foreach ($mmm as $ty){
                          
                          echo $ty["nome"];
                          echo"<br>";
                          echo"<a href='../view/Editar_evento.php?id={$ty["cod"]}'> editar </a><hr>";
                      }
                            
                      } 
               ?>
                <?php
                       
              ?>  
        <h2>Formulário para editar evento.</h2><br>       
        <form method="post" enctype="multipart/form-data" action="../controle/EditarEvento.php">
            Nome do evento<br>
            <input name="nome" class="campo" type="text" placeholder="" value=" <?=$evento["nome"]?>"/>          
            <br>
            Telefone 1:<br>
            <input name="telefone" class="campo" type="tel" placeholder="" value=" <?=$evento["telefone"]?>"/>
            <br>
            Telefone 2:<br>
            <input name="telefone" class="campo" type="tel" placeholder=" Tel 2" value=" <?=$evento["telefone"]?>"/>
            <br>
            Email:<br>
            <input name="email" class="campo" type="email" placeholder=" seuemail@eventos.com" value=" <?=$evento["email"]?>"/> 
            <br>
            Data:<br>
            <input name="data" type="date" class="campo" placeholder=" ..." required="required" value="<?=$evento["data"]?>"/> 
            <br>
            Faixa etária-mínima:<br> 
            <input name="faixa" class="campo" type="text" placeholder=" ex. livre" value=" <?=$evento["faixa_etaria"]?>"/> 
            <br>
            Local:<br> 
            <input name="local" type="local" class="campo" placeholder="" value=" <?=$evento["local"]?>"/> 
            <br>
            Horário de ínicio e fim:<br>
            <input name="horario" class="campo" type="text" placeholder="" value=" <?=$evento["horario"]?>"/> 
            <br>
            Descrição do evento:<br> 
            <input type="text" name="descricao" class="campo2 "rows="4" cols="50"  placeholder=" Fale sobre seu evento de forma detalhada" value="<?=$evento["descricao"]?>"/>            
            <input type="hidden" name="foto_antiga" value="<?=$evento["foto"]?>" /> 
            <input type="file"   name="foto" class="campo"/> 
            <br>
            <a> 
		<input type="hidden" name="cod" value="<?=$evento["cod"]?>"/>
		<input class="btn" type="submit" value="Editar" onclick='return EditarEve();'/>	
            </a> 
            <br><br>
            </form>
            <?php 
            if(isset($_SESSION["perfil_cod"]) == 1):
            echo"<form action='../controle/ExcluirEvento.php' method='POST'>";
            echo"<input type='hidden' value='$cod' name='cod'/>";
            echo"<input class='btn' type='submit' value='Excluir' onclick='return ExcluirUsu();'/>";
            echo"</form>";
            endif;
            ?>
            </section>
      </div>  
    </body>
</html>
