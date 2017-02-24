<?php

    //Se incluye el modelo donde conectará el controlador.
    require_once '../modelo/fase.php';

    class FaseControlador
    {
        private $model;

        //Creación del modelo
        public function __construct()
        {
            $this->model = new fase();
        }

        //Llamado plantilla principal
        public function index()
        {
            require_once '../vista/header.php';
            require_once '../vista/fase/fase.php';
            require_once '../vista/footer.php';
        }

        //Llamado a la vista fase-editar
        public function crudFase()
        {
        
            $fs = new fase();

            //Se obtienen los datos del fase a editar.
            if(isset($_REQUEST['idfase']))
            {
                $fs = $this->model->obtenerFase($_REQUEST['idfase']);
            }

            //Llamado de las vistas.
            require_once '../vista/header.php';
            require_once '../vista/fase/fase-editar.php';
            require_once '../vista/footer.php';
        }

        //Llamado a la vista fase-nuevo
        public function nuevaFase()
        {
            $fs = new fase();

            //Llamado de las vistas.
            require_once '../vista/header.php';
            require_once '../vista/fase/fase-nueva.php';
            require_once '../vista/footer.php';
        }

        //Método que registrar al modelo un nuevo fase.
        public function guardarfase()
        {
            
            $fs = new fase();

            //Captura de los datos del formulario (vista).
            $fs->descripcion = $_REQUEST['descripcion'];

            //Registro al modelo fase.
            $this->model->registrarFase($fs);

            //header() es usado para enviar encabezados HTTP sin formato.
            //"Location:" No solamente envía el encabezado al navegador, sino que
            //también devuelve el código de status (302) REDIRECT al
            //navegador

            if ($rows == null) 
            {

                print "<script>alert(\"Fase guardada\");window.location='index.php?c=fase';</script>";
            
                } else {

                header('Location: ?c=fase');
            }
        }

        //Método que modifica el modelo de un fase.
        public function editarFase()
        {
        
            $fs = new fase();

            $fs->idfase = $_REQUEST['idfase'];
            $fs->descripcion = $_REQUEST['descripcion'];

            $this->model->actualizarFase($fs);

            if ($rows == null) 
            {

                print "<script>alert(\"Fase actualizada\");window.location='index.php?c=fase';</script>";
            
                } else {
                
                header('Location: ?c=fase');
            }
        }

        //Método que elimina la tupla fase con el idfase dado.
        public function eliminarFase()
        {
        
            $this->model->eliminarFase($_REQUEST['idfase']);
        
            header('Location: ?c=fase');
        }
    }
?>