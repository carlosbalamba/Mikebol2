<?php

    //Se incluye el modelo donde conectará el controlador.
    require_once '../modelo/grupo.php';

    class GrupoControlador
    {
        private $model;

        //Creación del modelo
        public function __construct()
        {
            $this->model = new grupo();
        }

        //Llamado plantilla principal
        public function index()
        {
            require_once '../vista/header.php';
            require_once '../vista/grupo/grupo.php';
            require_once '../vista/footer.php';
        }

        //Llamado a la vista grupo-editar
        public function crudGrupo()
        {
            $gr = new grupo();

            //Se obtienen los datos del grupo a editar.
            if(isset($_REQUEST['idgrupo']))
            {
                $gr = $this->model->obtenergrupo($_REQUEST['idgrupo']);
            }

            //Llamado de las vistas.
            require_once '../vista/header.php';
            require_once '../vista/grupo/grupo-editar.php';
            require_once '../vista/footer.php';
        }

        //Llamado a la vista grupo-nuevo
        public function nuevoGrupo()
        {
            $gr = new grupo();

            //Llamado de las vistas.
            require_once '../vista/header.php';
            require_once '../vista/grupo/grupo-nuevo.php';
            require_once '../vista/footer.php';
        }

        //Método que registrar al modelo un nuevo grupo.
        public function guardarGrupo()
        {
            $gr = new grupo();

            //Captura de los datos del formulario (vista).
            $gr->descripcion = $_REQUEST['descripcion'];

            //Registro al modelo grupo.
            $this->model->registrarGrupo($gr);

            //header() es usado para enviar encabezados HTTP sin formato.
            //"Location:" No solamente envía el encabezado al navegador, sino que
            //también devuelve el código de status (302) REDIRECT al
            //navegador
            if ($rows == null) 
            {

                print "<script>alert(\"Grupo guardado\");window.location='index.php?c=grupo';</script>";
            
                } else {

                header('Location: ?c=grupo');
            }
        }

        //Método que modifica el modelo de un grupo.
        public function editarGrupo()
        {
            $gr = new grupo();

            $gr->idgrupo = $_REQUEST['idgrupo'];
            $gr->descripcion = $_REQUEST['descripcion'];

            $this->model->actualizarGrupo($gr);

            if ($rows == null) 
            {

                print "<script>alert(\"Grupo actualizado\");window.location='index.php?c=grupo';</script>";
            
                } else {
                
                header('Location: ?c=grupo');
            }
        }

        //Método que elimina la tupla grupo con el idgrupo dado.
        public function eliminarGrupo()
        {
            $this->model->eliminarGrupo($_REQUEST['idgrupo']);
            
            header('Location: ?c=grupo');
        }
    }
?>