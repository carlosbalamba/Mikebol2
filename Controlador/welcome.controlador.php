<?php

    require_once 'modelo/database.php';

    session_start();

    class WelcomeControlador
    {
        private $pdo;
        private $seleccionar;

        public function __construct()
        {
            $this->pdo = Database::Conectar();
            $this->seleccionar = array();
        }

        public function saludoApp()
        {
            try
            {

                $result = array();

                $idUsuario = $_SESSION['id_usuario'];

                $saludo = $this->pdo->prepare("SELECT `user`.`correo`, `perfil_persona`.`nombres`, `perfil_persona`.`apellidos` FROM `user` LEFT JOIN `perfil_persona` ON `user`.`correo` = `perfil_persona`.`correo` WHERE `user`.`correo` = '$idUsuario' ");

                $saludo->execute();

                return $saludo->fetchAll(PDO::FETCH_OBJ);
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
        }

        public function saludoApp2()
        {
            try
            {

                $result = array();

                $idUsuario = $_SESSION['id_usuario'];

                $saludo = $this->pdo->prepare("SELECT `user`.`correo`, `admin_e_instructor`.`nombres`, `admin_e_instructor`.`apellidos` FROM `user` LEFT JOIN `admin_e_instructor` ON `user`.`correo` = `admin_e_instructor`.`correo` WHERE `user`.`correo` = '$idUsuario' ");

                $saludo->execute();

                return $saludo->fetchAll(PDO::FETCH_OBJ);
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
        }
    }
?>