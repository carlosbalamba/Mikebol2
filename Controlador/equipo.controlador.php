<?php

    //Se incluye el modelo donde conectará el controlador.

    require_once '../modelo/equipo.php';

    class EquipoControlador
    {
        private $model;

        //Creación del modelo
        public function __construct()
        {
            $this->model = new equipo();
        }

        //Llamado plantilla principal
        public function index()
        {
            require_once '../vista/header.php';
            require_once '../vista/equipo/equipo.php';
            require_once '../vista/footer.php';
        }

        //Llamado a la vista equipo-editar
        public function crudEquipo()
        {
            $eqp = new equipo();

            //Se obtienen los datos del equipo a editar.
            if(isset($_REQUEST['idequipo']))
            {
                $eqp = $this->model->obtenerEquipo($_REQUEST['idequipo']);
            }

            //Llamado de las vistas.
            require_once '../vista/header.php';
            require_once '../vista/equipo/equipo-editar.php';
            require_once '../vista/footer.php';
        }

        //Llamado a la vista equipo-nuevo
        public function nuevoEquipo()
        {
            
            $eqp = new equipo();

            //Llamado de las vistas.
            require_once '../vista/header.php';
            require_once '../vista/equipo/equipo-nuevo.php';
            require_once '../vista/footer.php';
        }

        //Método que registrar al modelo un nuevo equipo.
        public function guardarEquipo()
        {
            
            $eqp = new equipo();

            //Captura de los datos del formulario (vista).
            $eqp->nombre_equipo = $_REQUEST['nombre_equipo'];

            //Registro al modelo equipo.
            $this->model->registrarEquipo($eqp);

            //header() es usado para enviar encabezados HTTP sin formato.
            //"Location:" No solamente envía el encabezado al navegador, sino que
            //también devuelve el código de status (302) REDIRECT al
            //navegador

            if ($rows == null)
            {

                print "<script>alert(\"equipo guardado\");window.location='index.php?c=equipo';</script>";
            
                } else {

                header('Location: ?c=equipo');
            }
        }

        //Método que modifica el modelo de un equipo.
        public function editarEquipo()
        {
            
            $eqp = new equipo();

            $eqp->idequipo = $_REQUEST['idequipo'];
            $eqp->nombre_equipo = $_REQUEST['nombre_equipo'];

            $this->model->actualizarEquipo($eqp);

            if ($rows == null) 
            {

                print "<script>alert(\"Equipo actualizado\");window.location='index.php?c=equipo';</script>";
            
                } else {

                header('Location: ?c=equipo');
            }
        }

        //Método que elimina la tupla equipo con el idequipo dado.
        public function eliminarEquipo()
        {

        $this->model->eliminarEquipo($_REQUEST['idequipo']);

        header('Location: ?c=equipo');
        }
    }
?>