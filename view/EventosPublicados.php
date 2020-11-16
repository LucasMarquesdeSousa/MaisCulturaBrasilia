<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../view/painelADM.css">
        <title></title>
        <style>
            .nn{
                color: #33ff33;
                display: inline-block;
            }
            a:hover{color:#0062cc;}
        </style>
        <script> 
		function ExcluirEve(){
			if(confirm('Que mesmo excluir esse evento?'))
					return true;
				else
					return false;
		}
        </script>
    </head>
    <body>

        <div class="container">
            <nav class="nav2">
                <ul class="menu">
                    <a href=" ../index.php"><li>Página Inicial</li></a>  
                    <a href=" ../view/painel.php"><li>Usuários</li></a> 
                    <a href="../view/listarEventos.php"><li>Eventos Culturais</li></a> 
                    <a href="../view/listarEspaco.php"><li>Espaços Culturais</li></a> 
                    <a href="../view/listarComentarios.php"><li>Comentarios dos eventos</li></a>
                    <a href="../view/EventosPublicados.php"><li class="com">Eventos Publicados</li></a> 
                </ul>                  
            </nav>
            <section class="sex">
                <div class="top"><br>
                    <img class="logo" align="left" src="../imagem/log0.jpg">
                    <h1 align="center">Painel</h1><br>
                    <h2 align="center">do Administrador</h2>                                   
                    <br></div><hr><br>


                <?php
                require_once '../DAO/EventoDAO.php';
                $publilcados = new EventoDAO();
                $eventos_publicados = $publilcados->getAllPublicarCOD();
                session_start();
                if (isset($_SESSION["perfil_cod"])) {
                    $perfil = $_SESSION["perfil_cod"];
                } else {
                    $perfil = "";
                }
                if ($perfil == 1) {
                    foreach ($eventos_publicados as $us) {
                        $img = $us["foto"];
                        ?>
                        <hr>
                        <div class='mn'>

                            <b>Foto:</b> <br>
                            <a href='../uploads_de_imagens/<?= $us["foto"] ?>'><img src=' ../uploads_de_imagens/<?= $us["foto"] ?>' width='100' />
                            </a> </td> <br>
                            <b>Nome de evento:</b> <?= $us['nome'] ?> <br>
                            <b>Descrição do evento:</b> <?= $us['descricao'] ?> <br>
                            <b>Faixa_etaria do evento: </b><?= $us['faixa_etaria'] ?> <br>
                            <b>Local de evento: </b><?= $us['local'] ?> <br>
                            <b>Horario de evento: </b><?= $us['horario'] ?> <br>
                            <b>Telefone de evento: </b><?= $us['telefone'] ?> <br>
                            <b>Email do evento:</b> <?= $us['email'] ?> <br>
                            <b> data da evento :</b> <?= $us["data"] ?><br>
                            <br>
                            <a class='chidori' href='../view/Editar_evento.php?id=<?= $us["cod"] ?>'>Alterar</a>
                            <br>
                            <br><br>
                            <form action='../controle/ExcluirEvento.php' method='POST'>
                                <input type='hidden' value='<?= $us["cod"] ?>' name='cod'/>
                                <input class='rasengan' type='submit' value='Excluir' onclick='return ExcluirEve();'/>
                            </form>
                            <br>
                            </script>
                            <?php
                            if ($us["status"] == 'N') {
                                ?>
                                <a class='chidori' href='../view/index1.php?id=<?= $us["cod"] ?>' onclick='return PublicarEve();'>Publicar</a>
                                <br> <br> <hr>  
                                <?php
                            } else {
                                ?>
                                <a class='chidori' href='../controle/OcultarEvento.php?id=<?= $us["cod"] ?>'> Ocultar </a>

                                <?php
                            }
                            ?>

                        </div>
                        <br><br><hr>
                        <?php
                    }
                    ?>
                    <?php
                } else {
                    echo"<script>";
                    echo"window.location.href='../view/index1.php';";
                    echo"</script>";
                }
                ?>
                </div>
                </body>
                </html>
