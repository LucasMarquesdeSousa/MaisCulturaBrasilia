<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" type="text/css" href="/MaisCulturaBrasiliaMVC/Formatacao/styleHome.css"/>
        <link rel="stylesheet" type="text/css" href="/MaisCulturaBrasiliaMVC/Formatacao/styleTemplate.css"/>
        <link rel="stylesheet" type="text/css" href="/MaisCulturaBrasiliaMVC/Formatacao/styleCadUsu.css"/>
        <!--    MODAL    -->		
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
        <script src="/MaisCulturaBrasiliaMVC/Formatacao/js/jquery.min.js"></script>
        <script src="/MaisCulturaBrasiliaMVC/Formatacao/js/popper.min.js"></script>
        <script src="/MaisCulturaBrasiliaMVC/Formatacao/js/bootstrap.min.js"></script>
        <!--    MODAL   -->
    </head>
    <body>
        <header class="header">
            <nav class="nav">
                <div class="imagem">
                    <img src="/MaisCulturaBrasiliaMVC/Midia/logo.jpg"/>
                </div>
                <form class="formulario">
                    <input type="text" name="pesquisa" placeholder="Pesquise aqui!" id="pesquisa" size="30"/>
                    <input type="submit" value="Pesquisa" id="bot-pesquisa"/>
                </form>
                <div class="cad-log">
                    <a href='/MaisCulturaBrasiliaMVC/usuario/login'><button type='button' class='btn11'>Entrar</button></a> 
                    <a href='/MaisCulturaBrasiliaMVC/usuario/cadastrar'><button type='button' class='btn11'>Cadastar</button></a>
                </div>

            </nav>
            <div class="tem">
                <a href="/MaisCulturaBrasiliaMVC">Página Inicial</a>
                <a href="/MaisCulturaBrasiliaMVC/evento">Eventos</a>
                <a href="/MaisCulturaBrasiliaMVC/espaco">Espaços</a>
                <a href="/MaisCulturaBrasiliaMVC/evento/anunciareventos">Anuncie seu evento</a>
            </div>
            <?php
            $this->CarregarViewNoTemplate($nomeView, $dadosModels);
            ?>
            <div class="footer">
                <footer>        
                    <img class="fr" width="130px" height="130px" src="/MaisCulturaBrasiliaMVC/Midia/lb.jpg">
                    <br>
                    <p class="fr">"A cultura forma sábios; a educação, homens".<br>
                        - Luis Bonald</p><br><br><br>
                    <p class="frase" align="center">Como diria Bonald, <i>"A cultura forma sábios; a educação, homens".</i> Vamos mudar nossos pensamentos que apenas pessoas ricas frequentam uma orquestra sinfônica, pois muitos desses
                        eventos são gratuitos. Talvez você não saiba, mas vários eventos são realizados com nosso dinheiro, então porque não frenquentamos? Então vamos aproveitar os espaços culturais, teatros, exposições e eventos
                        para nos tornamos seres sábios!</p>       
                </footer>
            </div>
        </header>
    </body>
</html>