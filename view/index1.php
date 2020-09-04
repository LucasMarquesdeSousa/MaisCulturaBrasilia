
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Mais Cultura Brasília</title>
        <!--<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css"/> -->
        <!--MODAL-->		
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
        <script src="../js/jquery.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <!--MODAL-->
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
        <script type="text/javascript" src="../controle/JavaScriptPesquisar.js"></script>
        <link rel="stylesheet" type="text/css" href="../view/home.css"/>
        <link rel="stylesheet" type="text/css" href="../view/evento.css"/>
    </head>
    <?php
    if (isset($_GET["msg1"])) {
        $msg = $_GET["msg1"];
        echo"<script>";
        echo"alert('$msg')";
        echo"</script>";
    }
    if (isset($_GET["msgs"])) {
        $msgs = $_GET["msgs"];
        echo"<script>";
        echo"alert('$msgs')";
        echo"</script>";
    }
    require_once '../controle/MostrarDadosUsuarioLogado.php';
    $mmmmm = new MostrarDadosUsuarioLogado();
    $mostrardados = $mmmmm->MostraDados();
    ?>  
    <body>
        <script>
            function ExcluirUsu() {
                if (confirm('Que mesmo excluir essa conta?'))
                    return true;
                else
                    return false;
            }
            function ExcluirComentario() {
                if (confirm('Que mesmo excluir esse comentario?'))
                    return true;
                else
                    return false;
            }
            function Sair() {
                if (confirm('Que mesmo encerrar essa sessão?'))
                    return true;
                else
                    return false;
            }
        </script>
        <section class="sec">
            <header class="container1">
                <div class="banner">
                    <a class="abc" href="index1.php"><img class="logo" width="80px" height="" src="../imagem/log0.jpg"></a>     
                    <div class="menu">
                        <form action="../controle/PesquisarEvento.php" method="POST" id="form_pesquisa">
                            <input name="pesquisando" type="text" id="search" class="search" placeholder="Pesquise aqui seu evento!">            
                            <font color="white">
                            <ul> <li class="resultado"></li></ul>
                            </font>
                            <button  class="pesquisar" type="submit"> Pesquisar</button>               

                        </form>
                    </div>                   
                    <div class="menu2">
                        <div class="hehe">
                            <font color="white">
                            <?php if ($mostrardados) { ?>
                                <font class='teste1'>Olá, <?= $mostrardados[0] ?></font>

                                <ul>
                                    <li>
                                        <font color='white'>
                                        <a class='dropada'>Perfil</a>
                                        <ul>
                                            <li class='dropada'>
                                                <a href='../controle/EfetuarLogoff.php' onclick='return Sair();'>Sair</a>
                                            </li>
                                            <li class='dropada'>
                                                <a href='../view/EditaUsuario.php?id=<?= $mostrardados[2] ?>'>Editar</a>
                                            </li>
                                            <li class='dropada'>
                                                <?php if ($mostrardados[1] == 2) { ?>
                                                    <form action='../controle/ExcluirUsuario.php' method='POST'>                            
                                                        <input type='hidden' value='<?= $mostrardados[2] ?>' name='cpf'/>
                                                        <button  class='haha' onclick='return ExcluirUsu();'><input class='haha' type='hidden' value='' />Excluir Conta</button>
                                                    </form>
                                                    <?php
                                                }
                                                if ($mostrardados[1] == 1) {
                                                    ?>
                                                    <a href='../view/Painel.php'> Painel </a>
                                                    <?php
                                                }
                                                ?>
                                            </li>
                                        </ul>
                                        </font>
                                    </li>
                                </ul>
                            <?php } else {
                                ?>
                                <a href='../view/entrar.php'><button type='button' class='btn11'>Entrar</button></a> 
                                <a href='../view/cadastrar.php'><button type='button' class='btn11'>Cadastar</button></a>
                                <?php
                            }
                            ?>
                            </font>
                        </div>
                    </div>
                </div>         
                <nav class="menu3">
                    <a class="aa" href="index1.php">Página inicial</a>
                    <a class="aa" href="#evnt">Eventos</a>
                    <a class="aa" href="#espc">Espaço Cultural</a>
                    <?php if ($mostrardados[0]) { ?>
                        <a class='aa' href='../view/cadastrarEvento.php'>Anuncie seu Evento!</a>
                        <?php
                    }
                    ?>
                </nav>
            </header>
            <br>
            <div class="txt">
                <h1 align="center" class="tx">Sejam Bem-vindos!</h1>           
                <p align="center" class="tx">Aqui você encontrará os mais diversos lugares para você, sua família ou seus amigos se divertir e relaxar</p>
                <p align="center" class="tx">Aproveite!</p>
            </div>           
            <!-- carrousel -->
            <a href="#evnt"> <div class="carousel"> </div></a>                     
            <!--Evento cultural-->       
            <hr>
            <h1 class="title" id="evnt">Eventos Culturais</h1>	   
            <div class="evw">               
                <?php
                include_once'../DAO/EventoDAO.php';
                include_once'../DAO/ComentarioDAO.php';

                if (isset($_GET["id"])) {
                    $id = $_GET["id"];
                } else {
                    $id = "";
                }
                $publicarEvento = new EventoDAO();
                $publicarEvento->PublicarEventos($id);
                $publica = $publicarEvento->getAllPublicarCOD();

                foreach ($publica as $us) {
                    ?>
                    <div class='car'>
                        <?php $imga = $us["foto"]; ?>
                        <img src=' ../uploads_de_imagens/<?= $imga ?>'/>
                        <h1><?= $us["nome"] ?></h1>
                        <?php $mhs = $us["cod"]; ?>
                        <button type='button' class='btn111' data-toggle='modal' data-target='#myModal<?= $us["cod"] ?>'>Ler Mais</button>
                    </div>
                    <?php
                }
                ?>
            </div><br><br><br><br><hr>         
            <!--Espaço cultural-->
            <h1 class="title" id="espc">Espaços Culturais</h1>
            <div class="evw">
                <?php
                include_once'../DAO/EspacoCulturalDAO.php';
                include_once'../DAO/ComentarioDAO.php';
                $publicarEspaco = new EspacoCulturalDAO();
                $publicas = $publicarEspaco->getAllEspaco();

                foreach ($publicas as $rs) {
                    ?>
                    <div class='car'>
                        <?php $imga = $rs["foto"]; ?>
                        <h1><?= $rs["nome"] ?></h1>
                        <img src=' ../uploads_de_imagens/<?= $imga ?>'/>
                        <button type='button' class='btn111' data-toggle='modal' data-target='#myModa2<?= $rs["cod"] ?>'>Ler Mais</button>
                    </div>
                    <?php
                }
                ?>
            </div><br><br><br><br><hr>              
            <!--CARDs: ESPAÇO CULTURAL-->          
            <div id="esp1"></div>
            <div class="box1">
                <?php
                include_once'../DAO/EspacoCulturalDAO.php';
                $parte4 = new EspacoCulturalDAO();
                $mss = $parte4->getAllEspaco();
                foreach ($mss as $hs) {
                    $img = $hs["foto"];
                    ?>
                    <!-- The Modal -->
                    <div class="modal fade" id="myModa2<?= $hs["cod"] ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <h1 class='titulo' align='center'> <?= $hs["nome"] ?></h1>            
                                    <img class='cultura' src=' ../uploads_de_imagens/<?= $img ?>'>
                                    <h1 class='titulo' align='center'>Um pouco da história</h1>
                                    <p align='center'><?= $hs["descricao"] ?></p>
                                    <h1 class='titulo' align='center'>Funcionamento</h1>
                                    <p><b>Local: </b><?= $hs["local"] ?></p> 
                                    <p><b>Horários: </b><?= $hs["horario"] ?></p>
                                    <h1 class='titulo' align='center'>Comentários</h1><br>
                                    <br><br><br><br>
                                    <?php
                                    include_once'../DAO/ComentarioDAO.php';
                                    $parte5 = new ComentarioDAO();
                                    $codi = $hs["cod"];
                                    $cpf = $hs["usuario_cpf"];
                                    $comentarioEspaco = $parte5->getComentarioEspaco($codi);
                                    if ($comentarioEspaco) {
                                        foreach ($comentarioEspaco as $ll) {
                                            ?>
                                            <br><b><?= $ll["nome"] ?> :</b><?= $ll["comentario"] ?>
                                            <?php if ($ll["nome"] == $mostrardados[0]) { ?>
                                                <a href='../controle/ExcluirComentarioEspaco.php?id=<?= $ll["cod"] ?>' onclick='return ExcluirComentario();'><font color='black'>Excluir</font></a><br><hr>
                                            <?php } else if ($mostrardados[1] == 1) {
                                                ?>
                                                <a href='../controle/ExcluirComentario.php?id=<?= $ll["cod"] ?>' onclick='return ExcluirComentario();'> <font color='black'>Excluir </font></a><br><hr>
                                                <?php
                                            }
                                        }
                                    } else {
                                        echo "Não tem comentário nesse espaço cultural. Seja oprimeiro a comentar!";
                                    }
                                    ?>
                                    <br><br><br><br><br>
                                    <?php if ($mostrardados[2]) { ?>
                                        <form action="../controle/ComentarioEspaco.php" method="POST">
                                            <textarea  name="comentario" rows='4' cols='50' class='campo12' placeholder='Digite aqui seu comentário' required="required"></textarea><br>
                                            <input  type="hidden" value="<?= $hs["cod"] ?>" name="espaco"/>
                                            <button class='btn'>Enviar</button>
                                        </form>
                                    <?php } ?>
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <?php
                }
                ?>              

            </div>


            <?php
            include_once'../DAO/EventoDAO.php';
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
            } else {
                $id = "";
            }
            $parte2 = new EventoDAO();
            $modificar = $parte2->PublicarEventos($id);
            $mais = $parte2->getAllPublicarCOD();

            foreach ($mais as $is) {
                $imga = $is["foto"];
                ?>
                <!-- The Modal -->

                <div class="modal fade" id="myModal<?= $is["cod"] ?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <?php
                                $dt_nascimento = $mostrardados[3];
                                $idade = $is["faixa_etaria"];
                                require_once '../DAO/Idade.php';
                                $nova = new Idade();
                                $nova2 = $nova->MenordeIdade($dt_nascimento, $idade);
                                if ($nova2) {
                                    ?>
                                    <h1 class='titulo' align='center'><?= $is["nome"] ?></h1>            
                                    <img class='cultura' src='../uploads_de_imagens/<?= $imga ?>'/>
                                    <h1 class='titulo' align='center'>Um pouco da história</h1>
                                    <p align='center'> <?= $is["descricao"] ?></p>
                                    <h1 class='titulo' align='center'>Funcionamento</h1>
                                    <p><b>Local: </b> <?= $is["local"] ?></p>
                                    <p><b>Classificação: </b><?= $is["faixa_etaria"] ?></p>
                                    <p><b>Telefone: </b><?= $is["telefone"] ?></p>
                                    <p><b>Horários: </b><?= $is["horario"] ?></p>
                                    <h1 class='titulo' align='center'>Comentários</h1>
                                    <br><br><br><br><br><br>
                                    <?php
                                    include_once'../DAO/ComentarioDAO.php';
                                    $parte1 = new ComentarioDAO();
                                    $codi = $is["cod"];
                                    $cpf = $is["usuario_cpf"];
                                    $comentario = $parte1->getComentarioByCOD($codi);
                                    if ($comentario) {
                                        foreach ($comentario as $kl) {
                                            ?>
                                            <br><hr><b><?= $kl["nome"] ?> :</b> <?= $kl["comentario"] ?>
                                            <?php if ($kl["nome"] == $mostrardados[0]) { ?>
                                                <a href='../controle/ExcluirComentario.php?id=<?= $kl["cod"] ?>' onclick='return ExcluirComentario();'> <font color='black'>Excluir </font></a><br><hr>
                                                <?php
                                            }
                                        }
                                    } else {
                                        echo "Não tem comentário nesse espaço cultural. Seja oprimeiro a comentar!";
                                    }
                                    ?>
                                    <br><br><br><br><br>
                                    <?php if ($mostrardados[2]) { ?>
                                        <form  action="../controle/Comentario.php" method="POST">
                                            <textarea  name="comentario" rows='4' cols='50' class='campo12' placeholder='Digite aqui seu comentário' required="required"></textarea><br>
                                            <input  type="hidden" value="<?= $is["cod"] ?>" name="evento">
                                            <input type="submit" value="Enviar" class="btn">
                                        </form>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <h1> Esse evento é proibido para menor de <?= $is["faixa_etaria"]; ?> </h1>
                                    <?php
                                }
                                ?> 
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>           
                <?php
            }
            ?>

            <div class="footer">       
                <footer>               
                    <img class="fr" width="130px" height="130px" src="../imagem/lb.jpg">
                    <br>
                    <p class="fr">"A cultura forma sábios; a educação, homens".<br>
                        - Luis Bonald</p><br><br><br>
                    <p class="frase" align="center">Como diria Bonald, <i>"A cultura forma sábios; a educação, homens".</i> Vamos mudar nossos pensamentos que apenas pessoas ricas frequentam uma orquestra sinfônica, pois muitos desses
                        eventos são gratuitos. Talvez você não saiba, mas vários eventos são realizados com nosso dinheiro, então porque não frenquentamos? Então vamos aproveitar os espaços culturais, teatros, exposições e eventos
                        para nos tornamos seres sábios!</p>       
                </footer>
            </div>
        </section>     
    </body>
</html>