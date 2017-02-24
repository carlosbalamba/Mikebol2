<?php

    //Se incluye el modelo donde conectará el controlador.
    require_once '../modelo/perfil_capitan.php';
    require_once '../modelo/seleccionar-tipo_documento.php';
    require_once '../modelo/seleccionar-numero_ficha.php';
    require_once '../modelo/seleccionar-equipo.php';

    class Perfil_capitanControlador
    {
        private $model;
        private $seltdoc;
        private $selnficha;
        private $selequipo;    

        //Creación del modelo
        public function __construct()
        {
            $this->model = new perfil_capitan();
            $this->seltdoc = new select_tipo_documento();
            $this->selnficha = new select_numero_ficha();
            $this->selequipo = new select_equipo();
        }

        //Llamado plantilla principal
        public function index()
        {
            require_once '../index.php';
        }

        //Llamado a la vista perfil_capitan-nuevo
        public function nuevoPerfil_capitan()
        {
            $pp = new perfil_capitan();

            //Llamado de las vistas.
            require_once '../registro.php';
        }

        //Método que registrar al modelo un nuevo registro del capitan.
        public function guardarPerfil_capitan()
        {
            $pp = new perfil_capitan();

            //Captura de los datos del formulario (vista).
            $pp->nombres = $_REQUEST['nombres'];
            $pp->apellidos = $_REQUEST['apellidos'];
            $pp->idtipo_documento = $_REQUEST['idtipo_documento'];
            $pp->num_documento = $_REQUEST['num_documento'];
            $pp->idnum_ficha = $_REQUEST['idnum_ficha'];
            $pp->eps = $_REQUEST['eps'];
            $pp->telefono = $_REQUEST['telefono'];
            $pp->correo = $_REQUEST['correo'];
            $pp->idequipo = $_REQUEST['idequipo'];
            $pp->password = $_REQUEST['password'];

            //Registro al modelo perfil_capitan.
            $this->model->registrarPerfil_capitan($pp);

            //header() es usado para enviar encabezados HTTP sin formato.
            //"Location:" No solamente envía el encabezado al navegador, sino que
            //también devuelve el código de status (302) REDIRECT al
            //navegador
            header('Location: ../index.php');
        }
    }
?>