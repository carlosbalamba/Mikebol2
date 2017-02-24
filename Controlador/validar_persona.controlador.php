<?php

    class Validar_personaControlador
    {
        private $pdo;
        private $seleccionar;

            public function __construct()
            {
                $this->pdo = Database::Conectar();
                $this->seleccionar = array();
            }

            public function validar_persona()
            {
                try
                {

                $result = array();

                $num_documento  = $_POST['num_documento'];
                $idtipo_documento  = $_POST['idtipo_documento'];
                $correo  = $_POST['correo'];

                $fase = $this->pdo->prepare("SELECT `perfil_persona`.`num_documento`, `user`.`idtipo_documento`, `user`.`correo` FROM `perfil_persona` LEFT JOIN `user` ON `perfil_persona`.`correo` = `user`.`correo` WHERE `perfil_persona`.`num_documento` = '$num_documento' AND `user`.`idtipo_documento` = '$idtipo_documento' OR `user`.`correo` = '$correo'");

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