<?php

    class Validar_numero_fichaControlador
    {
        private $pdo;
        private $seleccionar;

        public function __construct()
        {
            $this->pdo = Database::Conectar();
            $this->seleccionar = array();
        }

        public function validar_numero_ficha()
        {
            try
            {

                $result = array();

                $ficha  = $_POST['ficha'];

                $num_ficha = $this->pdo->prepare("SELECT idnum_ficha FROM num_ficha WHERE ficha = '$ficha'");

                $num_ficha->execute();

                return $num_ficha->fetchAll(PDO::FETCH_OBJ);
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
        }
    }
?>