<!DOCTYPE html>
<HTML>
    <HEAD> 
        <TITLE> Pesquisar Usuário </TITLE>
        <META charset="UTF-8">
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
        <script type="text/javascript" src="../controle/JavaScriptPesquisar.js"></script>
        <!--MODAL-->		
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
        <script src="../js/jquery.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>

        <!--MODAL-->

        <link rel="stylesheet" type="text/css" href="../view/home.css">
        <link rel="stylesheet" type="text/css" href="../view/evento.css">


        <?php
        require_once '../DAO/EspacoCulturalDAO.php';
        require_once '../DAO/EventoDAO.php';
        SESSION_START();
        if (isset($_GET["msg1"]) == true) {
            $msg = $_GET["msg1"];
            echo"<script>";
            echo"alert('$msg')";
            echo"</script>";
        } else {
            
        }

        if (isset($_SESSION["nome"])) {
            $nome = $_SESSION["nome"];
            $cpf = $_SESSION["cpf"];
        } else {
            $nome = "";
            $cpf = "";
        }
        ?>

    </HEAD>
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
                    <a href="../view/index1.php"><img class="logo" width="100%" height="100%" src="../imagem/log0.jpg"></a>     
                    <div class="menu">
                        <form action="" method="POST" id="form_pesquisa">
                            <input name="pesquisando" type="text" id="search" class="search" placeholder="pesquisa aqui seu evento!">            
                            <font color="white">
                            <ul class="resultado"></ul>
                            </font>
                            <input type="submit" value="Pesquisar" />               
                        </form>

                    </div>                   
                    <div class="menu2">
                        <div class="hehe">
                            <font color="white">
                            <?php
                            if ($nome == true) {
                                echo "<font class='teste1'>";
                                echo"Olá,  " . $nome;
                                echo"</font>";
                            }
                            ?>                
                            <?php
                            if ($nome == true) {
                                echo"<ul>";
                                echo"<li>";
                                echo "<font color='white'>";
                                echo"<a class='dropada'>Perfil</a>";
                                echo"<ul>";
                                echo"<li class='dropada'>";
                                echo"<a href='../controle/EfetuarLogoff.php' onclick='return Sair();'>Sair</a>";
                                echo"</li>";
                                echo"<li class='dropada'>";
                                echo"<a href='../view/EditaUsuario.php?id=$cpf'>Editar</a>";
                                echo"</li>";

                                echo"<li class='dropada'>";
                                echo"<form action='../controle/ExcluirUsuario.php' method='POST'>                            
                                    <input type='hidden' value='$cpf' name='cpf'/>
                                    <button  class='haha' onclick='return ExcluirUsu();'><input class='haha' type='hidden' value='' />Excluir Conta</button>
                                    </form>";
                                echo"</li>";
                                echo "</font>";
                                echo"</ul>";
                                echo"</li>";
                                echo"<ul>";
                            }
                            ?> 
                        </div>
                        <?php
                        if ($nome == false) {
                            echo"<a href='../view/entrar.php'><button type='button' class='btn11'>Entrar</button></a> 
                    <a href='../view/cadastrar.php'><button type='button' class='btn11'>Cadastar</button></a>";
                        }
                        ?>
                    </div>            
                    </font>
                </div>               

                <nav class="menu3">
                    <a class="aa" href="../view/index1.php">Página Inicial</a>
                    <a class="aa" href="#evnt">Eventos</a>
                    <a class="aa" href="#espc">Espaço Cultural</a>
                    <?php
                    if ($nome == true) {
                        echo"<a class='aa' href='../view/cadastrarEvento.php'>Anuncie seu Evento!</a>";
                    }
                    ?>
                </nav>
            </header>

            <?php
            if (isset($_POST["pesquisando"])) {
                $pesquisar_evento = $_POST["pesquisando"];
                $pesquisa_espacos = $pesquisar_evento;
            } else {
                $pesquisar_evento = "";
                $pesquisa_espacos = "";
            }
            if ($pesquisa_espacos or $pesquisar_evento) {
                $pesquisar = new EventoDAO();
                $iniciarPesquisa = $pesquisar->PesquisarEvento($pesquisar_evento);

                $pesquisar_espaco = new EspacoCulturalDAO();
                $iniciarPesquisaEspaco = $pesquisar_espaco->PesquisarEspaco($pesquisa_espacos);
                ?>
            <br>
                <h1 class="title" id="evnt">Eventos culturais</h1>
                <?php
                if ($iniciarPesquisa or $iniciarPesquisaEspaco) {
                    foreach ($iniciarPesquisa as $a) {
                        $img = $a["foto"];
                        ?>
                        <div class="evw">  
                            <div class='car'>
                                <img src='../uploads_de_imagens/<?= $img ?>'/>
                                <h1></h1>
                                <h1><?= $a["nome"] ?></h1>
                                <button type='button' class='btn111' data-toggle='modal' data-target='#myModal<?= $a["cod"] ?>'>
                                    Ler Mais
                                </button>  
                            </div>
                        </div><br><br><br><br><hr>
                        <?php
                    }
                    ?>
                    <?php
                    foreach ($iniciarPesquisa as $as) {
                        $imga = $as["foto"];
                        ?>
                        <!-- The Modal -->
                        <div class="modal fade" id="myModal<?= $as["cod"] ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <h1 class='titulo' align='center'><?= $as["nome"] ?> </h1>            
                                    <img class='cultura' src='../uploads_de_imagens/<?= $imga ?>'/>
                                    <h1 class='titulo' align='center'>Um pouco da história</h1>
                                    <p align='center'> <?= $as["descricao"] ?></p>
                                    <h1 class='titulo' align='center'>Funcionamento</h1>
                                    <p><b>Local: </b> <?= $as["local"] ?></p>
                                    <p><b>Classificação: </b><?= $as["local"] ?></p>
                                    <p><b>Telefone: </b><?= $as["telefone"] ?></p>
                                    <p><b>Horários: </b><?= $as["horario"] ?></p>
                                    <h1 class='titulo' align='center'>Comentários</h1>
                                    <br><br><br><br><br><br>

                                    <?php
                                    include_once'../DAO/ComentarioDAO.php';
                                    $parte1 = new ComentarioDAO();
                                    $codi = $as["cod"];
                                    $cpf = $as["usuario_cpf"];
//                                                $visu->Visualizacao($vis, $codi);
                                    $comentario = $parte1->getComentarioByCOD($codi);
                                    ?>
                                    <?php
                                    foreach ($comentario as $kl) {
                                        echo "<br><hr><b>{$kl["nome"]}:</b> {$kl["comentario"]}";
                                        if ($kl["nome"] == $nome) {
                                            echo"<a href='../controle/ExcluirComentario.php?id={$kl["cod"]}' onclick='return ExcluirComentario();'> <font color='black'>Excluir </font></a><br><hr>";
                                        }
                                        ?>
                                    <button type='button' class='btn111' data-toggle='modal' data-target='#myModa3<?= $a["cod"] ?>'> Responder </button>
                                    <?php    
                                    }
                                    ?>
                                    <form  id="myModa3" action="../controle/Comentario.php" method="POST">
                                        <textarea  name="comentario" rows='4' cols='50' class='campo12' placeholder='Digite aqui seu comentário' required="required"></textarea><br>
                                        <input  type="hidden" value="<?= $as["cod"] ?>" name="evento"/>
                                        <button class='btn'>Enviar</button>
                                    </form>
                                    
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php
                }
                ?>
                <h1 class="title" id="espc">Espaços Culturais</h1>
                <?php
                //cards espaços
                foreach ($iniciarPesquisaEspaco as $sd) {
                    $imag = $sd["foto"];
                    ?>
                    <div class="evw">  
                        <div class='car'>
                            <img src='../uploads_de_imagens/<?= $imag ?>'/>
                            <h1></h1>
                            <h1><?= $sd["nome"] ?></h1>
                            <button type='button' class='btn111' data-toggle='modal' data-target='#myModa3<?= $sd["cod"] ?>'>
                                Ler Mais
                            </button>  
                        </div>
                    </div><br><br><br><br><hr>
                    <?php
                }
                ?>
                <?php
                foreach ($iniciarPesquisaEspaco as $hs) {
                    $imagem = $hs["foto"];
                    ?>
                    <!-- The Modal -->
                    <div class="modal fade" id="myModa3<?= $hs["cod"] ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="moda1">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <h1 class='titulo' align='center'> <?= $hs["nome"] ?></h1>            
                                    <img class='cultura' src=' ../uploads_de_imagens/<?= $imagem ?>'>
                                    <h1 class='titulo' align='center'>Um pouco da história</h1>
                                    <p align='center'><?= $hs["descricao"] ?></p>
                                    <h1 class='titulo' align='center'>Funcionamento</h1>
                                    <p><b>Local: </b><?= $hs["local"] ?></p> 
                                    <p><b>Horários: </b><?= $hs["horario"] ?></p>
                                    <h1 class='titulo' align='center'>Comentários</h1><br>
                                    <?php
                                    include_once'../DAO/ComentarioDAO.php';
                                    $parte5 = new ComentarioDAO();
                                    $codi = $hs["cod"];
                                    $cpf = $hs["usuario_cpf"];
                                    $comentarioEspaco = $parte5->getComentarioEspaco($codi);
                                    ?>
                                    <br><br><br><br>
                                    <?php
                                    foreach ($comentarioEspaco as $ll) {
                                        echo "<br><b>{$ll["nome"]} :</b>{$ll["comentario"]}";
                                        if ($ll["nome"] == $nome) {
                                            echo"<a href='../controle/ExcluirComentarioEspaco.php?id={$ll["cod"]}' onclick='return ExcluirComentario();'><font color='black'>Excluir</font></a><br><hr>";
                                        }
                                        ?>
                                    <button type='button' class='btn111' data-toggle='modal' data-target=''> Responder </button>
                                        <?php
                                    }
                                    ?>
                                    <br><br><br><br><br>
                                    <form action="../controle/ComentarioEspaco.php" method="POST">
                                        <textarea  name="comentario" rows='4' cols='50' class='campo12' placeholder='Digite aqui seu comentário' required="required"></textarea><br>
                                        <input  type="hidden" value="<?= $hs["cod"] ?>" name="espaco"/>
                                        <button class='btn'>Enviar</button>
                                    </form>
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
                <?php
            } else {
                ?>
                <h1> Nada encontrado no banco de dados!</h1>
                <?php
            }
            ?>
            <?php
        } else {
            ?>
            <h1> Nada encontrado no banco de dados!</h1>
            <?php
        }
        ?>
    </SECTION>
</body>
</HTML>
