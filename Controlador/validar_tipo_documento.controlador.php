<?php

    class Validar_tipo_documentoControlador
    {
        private $pdo;
        private $seleccionar;

        public function __construct()
        {
            $this->pdo = Database::Conectar();
            $this->seleccionar = array();
        }

        public function validar_tipo_documento()
        {
            try
            {

                $result = array();

                $documento  = $_POST['documento'];

                $tipo_documento = $this->pdo->prepare("SELECT idtipo_documento FROM tipo_documento WHERE documento = '$documento'");

                $tipo_documento->execute();

                return $tipo_documento->fetchAll(PDO::FETCH_OBJ);
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
        }
    }
?>