<?php

    class Validar_novedadControlador
    {
        private $pdo;
        private $seleccionar;

        public function __construct()
        {
            $this->pdo = Database::Conectar();
            $this->seleccionar = array();
        }

        public function validar_novedad()
        {
            try
            {

                $result = array();

                $descripcion  = $_POST['descripcion'];

                $novedad = $this->pdo->prepare("SELECT idnovedad FROM novedad WHERE descripcion = '$descripcion'");

                $novedad->execute();

                return $novedad->fetchAll(PDO::FETCH_OBJ);
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
        }
    }
?>