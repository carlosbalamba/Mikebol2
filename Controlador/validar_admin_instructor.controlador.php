<?php

    class Validar_admin_instructorControlador
    {
        private $pdo;
        private $seleccionar;

            public function __construct()
            {
                $this->pdo = Database::Conectar();
                $this->seleccionar = array();
            }

            public function validar_admin_instructor()
            {
                try
                {

                $result = array();

                $num_documento  = $_POST['num_documento'];
                $idtipo_documento  = $_POST['idtipo_documento'];
                $correo  = $_POST['correo'];

                $fase = $this->pdo->prepare("SELECT `admin_e_instructor`.`num_documento`, `user`.`idtipo_documento`, `user`.`correo` FROM `admin_e_instructor` LEFT JOIN `user` ON `admin_e_instructor`.`correo` = `user`.`correo` WHERE `admin_e_instructor`.`num_documento` = '$num_documento' AND `user`.`idtipo_documento` = '$idtipo_documento'");

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