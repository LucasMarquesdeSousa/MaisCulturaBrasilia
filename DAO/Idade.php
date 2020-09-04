<?php
require_once '../Data/funcaoData.php';
class Idade {
    
    public function MenordeIdade($dt_nascimento, $idade) {
        if (isset($_SESSION["cpf"])) {
            $dateUS = $dt_nascimento;
            $nova_data = new Data();
            $nova_data2 = $nova_data->dateUStoDateBR($dateUS);
            $neww = explode("/", $nova_data2);
            $idade_usuario = date("Y") - $neww[2];
            if($idade == "livre"): $idade = 0; endif;
            $idade_evento = $idade;
            if ($idade_evento < $idade_usuario || $idade_usuario == 0) {
                return true;
            } else {
                return FALSE;
            }
        } else {
            return true;
        }
    }

}
