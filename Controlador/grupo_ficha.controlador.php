<?php

    //Se incluye el modelo donde conectará el controlador.  
    require_once '../modelo/grupo_ficha.php';

    class Grupo_fichaControlador
    {
        private $model;

        //Creación del modelo
        public function __construct()
        {
            $this->model = new grupo_ficha();
        }

        //Llamado plantilla principal
        public function index()
        {
            require_once '../vista/header.php';
            require_once '../vista/grupo_ficha/grupo_ficha.php';
            require_once '../vista/footer.php';
        }

        //Llamado a la vista grupo_ficha-editar
        public function crudGrupo_ficha()
        {
            $grfc = new grupo_ficha();

            //Se obtienen los datos del grupo_ficha a editar.
            if(isset($_REQUEST['idgrupo_ficha']))
            {
                $grfc = $this->model->obtenerGrupo_ficha($_REQUEST['idgrupo_ficha']);
            }

            //Llamado de las vistas.
            require_once '../vista/header.php';
            require_once '../vista/grupo_ficha/grupo_ficha-editar.php';
            require_once '../vista/footer.php';
        }

        //Llamado a la vista grupo_ficha-nuevo
        public function nuevoGrupo_ficha()
        {
            $grfc = new grupo_ficha();

            //Llamado de las vistas.
            require_once '../vista/header.php';
            require_once '../vista/grupo_ficha/grupo_ficha-nueva.php';
            require_once '../vista/footer.php';
        }

        //Método que registrar al modelo un nuevo grupo_ficha.
        public function guardarGrupo_ficha()
        {
            $grfc = new grupo_ficha();

            //Captura de los datos del formulario (vista).
            $grfc->grupo_ficha = $_REQUEST['grupo_ficha'];

            //Registro al modelo grupo_ficha.
            $this->model->registrarGrupo_ficha($grfc);

            //header() es usado para enviar encabezados HTTP sin formato.
            //"Location:" No solamente envía el encabezado al navegador, sino que
            //también devuelve el código de status (302) REDIRECT al
            //navegador
            if ($rows == null) 
            {

                print "<script>alert(\"Grupo de la ficha guardada\");window.location='index.php?c=grupo_ficha';</script>";
            
                } else {

                header('Location: ?c=grupo_ficha');
            }
        }

        //Método que modifica el modelo de un grupo_ficha.
        public function editarGrupo_ficha()
        {
            $grfc = new grupo_ficha();

            $grfc->idgrupo_ficha = $_REQUEST['idgrupo_ficha'];
            $grfc->grupo_ficha = $_REQUEST['grupo_ficha'];

            $this->model->actualizarGrupo_ficha($grfc);

            if ($rows == null) 
            {

                print "<script>alert(\"Grupo de la ficha actualizada\");window.location='index.php?c=grupo_ficha';</script>";
            
                } else {
                
                header('Location: ?c=grupo_ficha');
            }
        }

        //Método que elimina la tupla grupo_ficha con el idgrupo dado.
        public function eliminarGrupo_ficha()
        {
            $this->model->eliminarGrupo_ficha($_REQUEST['idgrupo_ficha']);
        
            header('Location: ?c=grupo_ficha');
        }
    }
?>