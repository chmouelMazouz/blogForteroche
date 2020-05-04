<?php


class Database{
    public static function getPdo(): PDO{
        $pdo = new PDO('mysql:host=mysql-forteroche.alwaysdata.net;dbname=forteroche_2;charset=utf8', '200367', 'Chmouel@2020', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
        return $pdo ;
    }
}
/* Retourne une connexion à la BDD
*/








