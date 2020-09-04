<?php

class Data {

//  10/02/2015
    public function dateBRtoDateUS($dateBR) {
        $dateArray = explode("/", $dateBR);
        $novaData = $dateArray[2] . "-" . $dateArray[1] . "-" . $dateArray[0];
        return $novaData;
    }

//  1982-02-10
    public function dateUStoDateBR($dateUS) {
        $dateArray = explode("-", $dateUS);
        $novaData = $dateArray[2] . "/" . $dateArray[1] . "/" . $dateArray[0];
        return $novaData;
    }

}

?>
