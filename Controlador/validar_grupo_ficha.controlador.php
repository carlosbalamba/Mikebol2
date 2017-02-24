<?php

    class Validar_grupo_fichaControlador
    {
        private $pdo;
        private $seleccionar;

            public function __construct()
            {
                $this->pdo = Database::Conectar();
                $this->seleccionar = array();
            }

            public function validar_grupo_ficha()
            {
                try
                {

                $result = array();

                $grupoficha  = $_POST['grupo_ficha'];

                $fase = $this->pdo->prepare("SELECT idgrupo_ficha FROM grupo_ficha WHERE grupo_ficha = '$grupoficha'");

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