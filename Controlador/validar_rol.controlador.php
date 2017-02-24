<?php

    class Validar_rolControlador
    {
        private $pdo;
        private $seleccionar;

        public function __construct()
        {
            $this->pdo = Database::Conectar();
            $this->seleccionar = array();
        }

        public function validar_rol()
        {
            try
            {

                $result = array();

                $descripcion_rol  = $_POST['descripcion_rol'];

                $rol = $this->pdo->prepare("SELECT idrol FROM rol WHERE descripcion_rol = '$descripcion_rol'");

                $rol->execute();

                return $rol->fetchAll(PDO::FETCH_OBJ);
            }
            catch(Exception $e)
            {
            die($e->getMessage());
            }
        }
    }
?>