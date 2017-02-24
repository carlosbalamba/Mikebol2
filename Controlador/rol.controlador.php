<?php

    //Se incluye el modelo donde conectará el controlador.
    require_once '../modelo/rol.php';

    class RolControlador
    {
        private $model;

        //Creación del modelo
        public function __construct()
        {
            $this->model = new rol();
        }

        //Llamado plantilla principal
        public function index()
        {
            require_once '../vista/header.php';
            require_once '../vista/rol/rol.php';
            require_once '../vista/footer.php';
        }

        //Llamado a la vista rol-editar
        public function crudRol()
        {
            $rl = new rol();

            //Se obtienen los datos del rol a editar.
            if(isset($_REQUEST['idrol']))
            {
                $rl = $this->model->ObtenerRol($_REQUEST['idrol']);
            }

            //Llamado de las vistas.
            require_once '../vista/header.php';
            require_once '../vista/rol/rol-editar.php';
            require_once '../vista/footer.php';
        }

        //Llamado a la vista rol-nuevo
        public function nuevoRol()
        {
            $rl = new rol();

            //Llamado de las vistas.
            require_once '../vista/header.php';
            require_once '../vista/rol/rol-nuevo.php';
            require_once '../vista/footer.php';
        }

        //Método que registrar al modelo un nuevo rol.
        public function guardarRol()
        {
            $rl = new rol();

            //Captura de los datos del formulario (vista).
            $rl->descripcion_rol = $_REQUEST['descripcion_rol'];

            //Registro al modelo rol.
            $this->model->registrarRol($rl);

            //header() es usado para enviar encabezados HTTP sin formato.
            //"Location:" No solamente envía el encabezado al navegador, sino que
            //también devuelve el código de status (302) REDIRECT al
            //navegador
        
            if ($rows == null) 
            {

                print "<script>alert(\"Rol guardado\");window.location='index.php?c=rol';</script>";
            
                } else {

                header('Location: ?c=rol');
            }
        }

        //Método que modifica el modelo de un rol.
        public function editarRol()
        {
            $rl = new rol();

            $rl->idrol = $_REQUEST['idrol'];
            $rl->descripcion_rol = $_REQUEST['descripcion_rol'];

            $this->model->actualizarRol($rl);

            if ($rows == null) 
            {

                print "<script>alert(\"Rol actualizado\");window.location='index.php?c=rol';</script>";
            
                } else {
                
                header('Location: ?c=rol');
            }
        }

        //Método que elimina la tupla rol con el idrol dado.
        public function eliminarRol()
        {
            $this->model->eliminarRol($_REQUEST['idrol']);
            header('Location: ?c=rol');
        }
    }
?>