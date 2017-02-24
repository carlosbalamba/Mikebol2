<?php

    class Validar_grupoControlador
    {
        private $pdo;
        private $seleccionar;

        public function __construct()
        {
            $this->pdo = Database::Conectar();
            $this->seleccionar = array();
        }

        public function validar_grupo()
        {
            try
            {

                $result = array();

                $descripcion  = $_POST['descripcion'];

                $grupo = $this->pdo->prepare("SELECT idgrupo FROM grupo WHERE descripcion = '$descripcion'");

                $grupo->execute();

                return $grupo->fetchAll(PDO::FETCH_OBJ);
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
        }
    }
?>