<style>
    img{
        height: 11px;
        border-radius: 5px;
        border-radius: 5px;
    }
    .resultado{
         background-color: #3498db;
    }
</style>
<?php
require_once '../DAO/EventoDAO.php';
require_once '../DAO/EspacoCulturalDAO.php';
$pesquisar_evento = $_POST["palavra"];
$pesquisa_espacos = $_POST["palavra"];
$pesquisa = new EventoDAO();
$mostrar = $pesquisa->PesquisarEvento($pesquisar_evento);
$pesquisa_espaco = new EspacoCulturalDAO();
$mostrar_espaco = $pesquisa_espaco->PesquisarEspaco($pesquisa_espacos);
if ($mostrar && $mostrar_espaco == "") {
    echo"Nada encontrado!";
} else {
    
    foreach ($mostrar as $as) {
        $img = $as["foto"];
        echo "<img src='../uploads_de_imagens/$img'>";
        echo $as["nome"] . "<br>";
    }
    foreach ($mostrar_espaco as $hj) {?>
    <?php
        $ima = $hj["foto"];
        echo"<img src='../uploads_de_imagens/$ima'>";
        echo $hj["nome"] . "<br>";
    }
}
?>
