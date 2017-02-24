<?php

    class Validar_programaControlador
    {
        private $pdo;
        private $seleccionar;

        public function __construct()
        {
            $this->pdo = Database::Conectar();
            $this->seleccionar = array();
        }

        public function validar_programa()
        {
            try
            {

                $result = array();

                $programa  = $_POST['programa'];

                $nomprograma = $this->pdo->prepare("SELECT idnom_programa FROM nom_programa WHERE programa = '$programa'");

                $nomprograma->execute();

                return $nomprograma->fetchAll(PDO::FETCH_OBJ);
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
        }
    }
?>