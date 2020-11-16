<meta charset="UTF-8">
<?php
require_once '../DAO/ComentarioDAO.php';
session_start();
if (empty($_POST["comentario"])) {
    echo "<script>";
    echo "window.location.href='../index.php';";
    echo "</script>";
} else {
    $comentario = $_POST["comentario"];
}

if (isset($_POST["espaco"]) == true) {
    $espaco = $_POST["espaco"];
} else {
    $espaco = "";
}
if (isset($_SESSION["cpf"])) {
    $cpf = $_SESSION["cpf"];
} else {
    $cpf = "";
}

if (isset($_SESSION["nome"]) == NULL) {
    $msg1 = "Não possui conta no sistema!";
//    echo"<script> alert('Você não pssui cadastro!') </script>";
    echo"<script>";
    echo"window.location.href='../view/index1.php?msg1={$msg1}';";
    echo"</script>";
} else {
    $data = date('Y-m-d');
    $comentarDAO = new ComentarioDAO();
    $comentado = $comentarDAO->CadastrarComentarioEspaco($comentario, $cpf, $espaco,$data);
    if ($comentado):
        $msg = "Comentario cadastrado com sucesso!";
        ?>
        <script> window.location.href = '../view/index1.php?modal=<?= $espaco ?>'</script>
        <?php
    endif;
}