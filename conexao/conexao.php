<?php

abstract class Conexao {

    private static $instanciar;

    public static function instaciar() {
        try {
            if (!isset(self::$instanciar)){
                self::$instanciar = new PDO("mysql:host=localhost;dbname=bdevento;charset=UTF8", "root", "");
                self::$instanciar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
           return self::$instanciar;
        } catch (PDOException $exc) {
            echo "Erro ao conectar ao banco de dados :".$exc->getMessage() ;
        }
    }

}

