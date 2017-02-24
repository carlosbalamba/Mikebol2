<?php

    class Database
    {
        //Esta función permite la conexión al SGBD: MariaDB.
        //host = tipo de conexión local - 'localhost'.
        //dbname = nombre de la base de datos.
        //charset = utf8, indica la codificación de caracteres utilizada.
        //root = nombre de usuario.
        //'' = contraseña del root.

    public static function Conectar()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=mikebol;charset=utf8', 'root', '');
        //Filtrando posibles errores de conexión.
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}