<?php

    //Se incluye el modelo donde conectará el controlador.
    require_once '../modelo/novedad.php';

    class NovedadControlador
    {
        private $model;

        //Creación del modelo
        public function __construct()
        {
            $this->model = new novedad();
        }

        //Llamado plantilla principal
        public function index()
        {
            require_once '../vista/header.php';
            require_once '../vista/novedad/novedad.php';
            require_once '../vista/footer.php';
        }

        //Llamado a la vista novedad-editar
        public function crudNovedad()
        {
            $nvd = new novedad();

            //Se obtienen los datos de la novedad a editar.
            if(isset($_REQUEST['idnovedad']))
            {
                $nvd = $this->model->obtenerNovedad($_REQUEST['idnovedad']);
            }

            //Llamado de las vistas.
            require_once '../vista/header.php';
            require_once '../vista/novedad/novedad-editar.php';
            require_once '../vista/footer.php';
        }

        //Llamado a la vista novedad-nuevo
        public function nuevaNovedad()
        {
            $nvd = new novedad();

            //Llamado de las vistas.
            require_once '../vista/header.php';
            require_once '../vista/novedad/novedad-nueva.php';
            require_once '../vista/footer.php';
        }

        //Método que registrar al modelo un nueva novedad.
        public function guardarNovedad()
        {
            $nvd = new novedad();

            //Captura de los datos del formulario (vista).
            $nvd->descripcion = $_REQUEST['descripcion'];

            //Registro al modelo novedad.
            $this->model->registrarNovedad($nvd);

            //header() es usado para enviar encabezados HTTP sin formato.
            //"Location:" No solamente envía el encabezado al navegador, sino que
            //también devuelve el código de status (302) REDIRECT al
            //navegador
        
            if ($rows == null) 
            {

                print "<script>alert(\"Novedad guardada\");window.location='index.php?c=novedad';</script>";
            
                } else {

                header('Location: ?c=novedad');
            }
        }

        //Método que modifica el modelo de un novedad.
        public function editarNovedad()
        {
            $nvd = new novedad();

            $nvd->idnovedad = $_REQUEST['idnovedad'];
            $nvd->descripcion = $_REQUEST['descripcion'];

            $this->model->actualizarNovedad($nvd);

            if ($rows == null) 
            {

                print "<script>alert(\"Nocvedad actualizada\");window.location='index.php?c=novedad';</script>";
            
                } else {
                
                header('Location: ?c=novedad');
            }
        }

        //Método que elimina la tupla novedad con el idnovedad dado.
        public function eliminarNovedad()
        {
            $this->model->eliminarNovedad($_REQUEST['idnovedad']);
            
            header('Location: ?c=novedad');
        }
    }
?>