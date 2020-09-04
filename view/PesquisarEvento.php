<!doctype html>
<html>
    <head>
        <title> pesquisar evento </title>
        <meta charset="UTF-8"/>
        <!--	<link rel="stylesheet" type="text/css" href="../view/home.css">
            <link rel="stylesheet" type="text/css" href="../view/evento.css">-->
    </head>
    <body>
        <h1> pesquisa dos eventos </h1>

        <?php
        require_once'../DAO/Eventodao.php';
        if (isset($_POST["pesquisar"])) {
            $pesquisar = $_POST["pesquisar"];
        } else {
            $pesquisar = "";
        }
        $pesquisarEvento = new Eventodao();
        $pes = $pesquisarEvento->PesquisarEvento($pesquisar);

        $img = $pes["foto"];
        echo"<div class='card'>";
        echo "<img src='../uploads_de_imagens/$img' width='350' height='300'/> ";
        echo "<b><h1>nome :</h1></b>" . $pes["nome"];
        echo "<b><p> classificação : </b>" . $pes["faixa_etaria"];
        echo "<b><p>Email :</p></b>" . $pes["email"];
        echo "<b><p>Local :</p></b>" . $pes["local"];
        echo "<b><p>horario :</p></b>" . $pes["horario"];
        echo "<b><p>Telefone :</p></b>" . $pes["telefone"];
        echo "<b><p>Descrição : </p></b>" . $pes["descricao"];
        echo"</div>";
        ?>
    </body>
</html>

