<?php

    class Validar_equipoControlador
    {

        private $pdo;
        private $seleccionar;
 
        public function __construct()
        {
            $this->pdo = Database::Conectar();
            $this->seleccionar = array();
        }

        public function validar_equipo()
        {
            try
            {

                $result = array();

                $nombre_equipo  = $_POST['nombre_equipo'];

                $equipo = $this->pdo->prepare("SELECT idequipo FROM equipo WHERE nombre_equipo = '$nombre_equipo'");

                $equipo->execute();

                return $equipo->fetchAll(PDO::FETCH_OBJ);
            }
            catch(Exception $e)
            {

                die($e->getMessage());
            }
        }
    }
?>