<?php

    //Se incluye el modelo donde conectará el controlador.
    require_once '../modelo/tipo_documento.php';

    class Tipo_documentoControlador
    {
        private $model;

        //Creación del modelo
        public function __construct()
        {
            $this->model = new tipo_documento();
        }

        //Llamado plantilla principal
        public function index()
        {
            require_once '../vista/header.php';
            require_once '../vista/tipo_documento/tipo_documento.php';
            require_once '../vista/footer.php';
        }

        //Llamado a la vista tipo_documento-editar
        public function crudTipo_documento()
        {
            $td = new tipo_documento();

            //Se obtienen los datos del tipo_documento a editar.
            if(isset($_REQUEST['idtipo_documento']))
            {
                $td = $this->model->obtenerTipo_documento($_REQUEST['idtipo_documento']);
            }

            //Llamado de las vistas.
            require_once '../vista/header.php';
            require_once '../vista/tipo_documento/tipo_documento-editar.php';
            require_once '../vista/footer.php';
        }

        //Llamado a la vista tipo_documento-nuevo
        public function nuevoTipo_documento()
        {
            $td = new tipo_documento();

            //Llamado de las vistas.
            require_once '../vista/header.php';
            require_once '../vista/tipo_documento/tipo_documento-nuevo.php';
            require_once '../vista/footer.php';
        }

        //Método que registrar al modelo un nuevo tipo de documento.
        public function guardarTipo_documento()
        {
            $td = new tipo_documento();

            //Captura de los datos del formulario (vista).
            $td->idtipo_documento = $_REQUEST['idtipo_documento'];
            $td->documento = $_REQUEST['documento'];

            //Registro al modelo tipo_documento.
            $this->model->registrarTipo_documento($td);

            //header() es usado para enviar encabezados HTTP sin formato.
            //"Location:" No solamente envía el encabezado al navegador, sino que
            //también devuelve el código de status (302) REDIRECT al
            //navegador
            if ($rows == null) 
            {

                print "<script>alert(\"Tipo de documento guardado\");window.location='index.php?c=tipo_documento';</script>";
            
                } else {

                header('Location: ?c=tipo_documento');
            }
        }

        //Método que modifica el modelo de un tipo de documento.
        public function editarTipo_documento()
        {
            $td = new tipo_documento();

            $td->idtipo_documento = $_REQUEST['idtipo_documento'];
            $td->documento = $_REQUEST['documento'];

            $this->model->actualizarTipo_documento($td);

            if ($rows == null) 
            {

                print "<script>alert(\"Tipo de documento actualizado\");window.location='index.php?c=tipo_documento';</script>";
            
                } else {
                
                header('Location: ?c=tipo_documento');
            }
        }

        //Método que elimina la tupla tipo_documento con el idtipo_documento dado.
        public function eliminarTipo_documento()
        {
            $this->model->eliminarTipo_documento($_REQUEST['idtipo_documento']);
            
            header('Location: ?c=tipo_documento');
        }
    }
?>