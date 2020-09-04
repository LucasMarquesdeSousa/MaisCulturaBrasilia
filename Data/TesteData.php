<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Testar a função data</title>
    </head>
    <body>
        <?php
        require_once '../DAO/EventoDAO.php';
        $evento = new EventoDAO();
        $mostrar = $evento->getAllPublicarCOD();
        
//            echo"oi";
//            die();
            foreach($mostrar as $as){
                $data = date('Y-m-d');
                $hora = date('H:i:s');
                if($as["data"] < $data){
                    echo"cod :".$as["cod"]."<br>";
                    echo"nome".$as["nome"]."<br>";
                    echo"data do evento :".$as["data"]."<br><hr>";
                    $cod = $as["cod"];
                    $excluir_evento = new EventoDAO();
                    $excluir_evento->ExcluirEventoByCPF($cod);

                }

            }
        
        
         
         
        ?>
    </body>
</html>
