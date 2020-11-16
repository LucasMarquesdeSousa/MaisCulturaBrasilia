<?php
SESSION_START();
if (isset($_SESSION["perfil_cod"])) {
    $perfil = $_SESSION["perfil_cod"];
} else {
    $perfil = "";
}
if ($perfil == 1) {
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <title></title>
            <link rel="stylesheet" type="text/css" href="../view/painelADM.css">
            <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
            <script type="text/javascript" src="../controle/JavaScriptPesquisarUsuario.js"></script>
            <style>
                .nn{
                    color: #33ff33;
                }
                .aa{
                    width:800px; 
                    height:50px; 
                    border:1px solid black;

                }
                .aa td{display: inline-block;}
                .aas{
                    float: right; 
                    border:1px solid #0066cc; 
                    border-bottom: 0px; 
                    border-left: 0px; 
                    border-top: 0px; 
                    margin: 2% 5% 0% 2%; 
                }
                .aas input a{
                    width: 80%;
                    height: 5%;
                    border: 1px solid #ddd;
                    border-radius: 5px;
                    font-size: 16px;
                    font-family: Comic Sans MS, Comic Sans, cursive;
                }
                .s{color: #0066cc;}
                a:hover{
                    color: #0066cc;
                }
                a{
                    font-size: 15pt;
                }
                .çl{
                    width: 100%;
                    height: 5%;
                    text-align: center;
                    color: #ff3333 ;
                }
                .resultado{
                    width: 15%;
                    height: 50%;
                    background-color: yellow;
                    border-top: 0px;
                }
            </style>
        </head>
        <body>
            <script>
                function ExcluirUsu() {
                    if (confirm('Que mesmo excluir esse usuario?'))
                        return true;
                    else
                        return false;
                }
                function SairUsu() {
                    if (confirm('Que mesmo encerrar a sessão do administrador?'))
                        return true;
                    else
                        return false;
                }
            </script>
            <div class="container">
                <nav>
                    <ul class="menu">
                        <a href=" ../index.php"><li>Página Inicial</li></a>  
                    <a href=" ../view/painel.php"><li  class="com">Usuários</li></a> 
                    <a href="../view/listarEventos.php"><li>Eventos Culturais</li></a> 
                    <a href="../view/listarEspaco.php"><li>Espaços Culturais</li></a> 
                     <a href="../view/listarComentarios.php"><li>Comentarios dos eventos</li></a>
                     <a href="../view/EventosPublicados.php"><li>Eventos Publicados</li></a> 
                    </ul>                  
                </nav>
                <section>
                    <div class="top"><br>
                        <img class="logo" align="left" src="../imagem/log0.jpg">
                        <h1 align="center">Painel</h1><br>
                        <h2 align="center">do Administrador</h2>
                        <br></div><hr><br> 
                    <?php
                    echo"<a href='../controle/EfetuarLogoff.php' onclick='return SairUsu()'> Sair </a>";
                    echo"<p><a href='../view/Cadastrar.php'>Cadastar Usuário </a><p><hr>";
                    echo"<font color='black'>";
                    echo"<form method='POST' action=''>";
                    echo" <input type='text' name='pesquisa_usuario' id='search' placeholder='pesquise um usuário!'/>";

                    echo" <input type='submit' value='pesquisar'/>";
                    echo"</form>";
                    echo"<ul class='resultado'>
                        
                    </ul>";
                    echo"</font>";
                    echo"<br> <br> <br> <br> ";


                    $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
                    $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
                    $quantidade = 5;
                    $inicio = ($quantidade * $pagina) - $quantidade;
                    require_once '../DAO/UsuarioDAO.php';
                    $nome = new UsuarioDAO();
                    $nomes = $nome->getAllUsuario($inicio, $quantidade);
                    foreach ($nomes as $u) {
                        echo"<table class='aa'>";
                        echo"<tr>";
                        echo"<td class='s'> Nome : </td> <td>{$u["nome"]}  /</td> ";
                        echo"<td class='s'> Senha: </td> <td>{$u['senha']} </td>";
                        $cpf = $u["cpf"];
                        echo"<td class='aas'>";
                        if ($u["perfil_cod"] == 2) {
                            echo"
                                <form action='../controle/ExcluirUsuario.php' method='POST'>
                                <input type='hidden' value='$cpf' name='cpf'/>
                                <input type='submit' value='Excluir Usuário' class='btn' onclick='return ExcluirUsu();'/>
                                </form>
                                ";
                        }
                        echo"<a  href=' ../view/EditaUsuario.php?id={$u["cpf"]}'><button type='button' class='btn'>Alterar</button></a></td>";
                        echo"</tr>";
                        echo"<tr>";
                        echo"<td>";
                        echo "<td>";
                        echo "</tr>";
                        echo "</table>";
                        echo "</table>";
                    }
                    echo"<br>";
                    echo"<br>";
                } else {
                    echo"<script>";
                    echo"window.location.href='../view/index1.php';";
                    echo"</script>";
                }
                echo"<div class='çl'>";
                $usuario_pg = new UsuarioDAO();
                $mostrar_pg = $usuario_pg->PaginaALL();

                $quantidade_pagina = ceil($mostrar_pg["resultado"] / $quantidade);
                $max = 1;
                echo"<a href='../view/painel.php?pagina=1'> primeira ></a>";

                for ($pag_ant = $pagina - $max; $pag_ant <= $pagina - 1; $pag_ant++) {
                    if ($pag_ant >= 1) {
                        echo"<a href='../view/painel.php?pagina=$pag_ant'> $pag_ant</a>";
                    }
                }
                echo $pagina;

                for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max; $pag_dep++) {
                    if ($pag_dep <= $quantidade) {
                        echo"<a href='../view/painel.php?pagina=$pag_dep'> $pag_dep</a>";
                    }
                }
                echo"<a href='../view/painel.php?pagina=$quantidade_pagina'>  < Última</a>";
                echo"</div>";
                ?>
                <br>
                <br>
            </section>
        </div>
    </body>
</html>

