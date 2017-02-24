<?php

    require_once 'modelo/database.php';

    class SessionControlador
    {
        private $pdo;
        private $seleccionar;

        //Creación del modelo
  
        public function __construct()
        {
            $this->pdo = Database::Conectar();
            $this->seleccionar = array();
        }

        public function inicioSession()
        {
            try
            {

                $result = array();

                $usuario  = $_POST['usuario'];
                $password = $_POST['password'];

                $session = $this->pdo->prepare("SELECT correo, idrol, idestado FROM user WHERE correo = '$usuario' AND password = '$password'");

                $session->execute();

                return $session->fetchAll(PDO::FETCH_OBJ);
            }
            catch(Exception $e)
            {

                die($e->getMessage());
            }
        }
    }
?>