<?php

    class Validar_faseControlador
    {

        private $pdo;
        private $seleccionar;

        public function __construct()
        {
            $this->pdo = Database::Conectar();
            $this->seleccionar = array();
        }

        public function validar_fase()
        {
            try
            {

                $result = array();

                $descripcion  = $_POST['descripcion'];

                $fase = $this->pdo->prepare("SELECT idfase FROM fase WHERE descripcion = '$descripcion'");

                $fase->execute();

                return $fase->fetchAll(PDO::FETCH_OBJ);
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
        }
    }
?>