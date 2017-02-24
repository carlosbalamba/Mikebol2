<?php

    //Se incluye el modelo donde conectará el controlador.
    require_once '../modelo/programa.php';

    class ProgramaControlador
    {
        private $model;

        //Creación del modelo
        public function __construct()
        {
            $this->model = new programa();
        }

        //Llamado plantilla principal
        public function index()
        {
            require_once '../vista/header.php';
            require_once '../vista/programa/programa.php';
            require_once '../vista/footer.php';
        }

        //Llamado a la vista programa-editar
        public function crudPrograma()
        {
            $pro = new programa();

            //Se obtienen los datos del programa a editar.
            if(isset($_REQUEST['idnom_programa']))
            {
                $pro = $this->model->obtenerPrograma($_REQUEST['idnom_programa']);
            }

            //Llamado de las vistas.
            require_once '../vista/header.php';
            require_once '../vista/programa/programa-editar.php';
            require_once '../vista/footer.php';
        }

        //Llamado a la vista programa-nueva
        public function nuevoPrograma()
        {
            $pro = new programa();

            //Llamado de las vistas.
            require_once '../vista/header.php';
            require_once '../vista/programa/programa-nuevo.php';
            require_once '../vista/footer.php';
        }

        //Método que registrar al modelo un nuevo programa.
        public function guardarPrograma()
        {
            $pro = new programa();

            //Captura de los datos del formulario (vista).
            $pro->programa = $_REQUEST['programa'];

            //Registro al modelo programa.
            $this->model->registrarPrograma($pro);

            //header() es usado para enviar encabezados HTTP sin formato.
            //"Location:" No solamente envía el encabezado al navegador, sino que
            //también devuelve el código de status (302) REDIRECT al
            //navegador

            if ($rows == null) 
            {

                print "<script>alert(\"Programa guardado\");window.location='index.php?c=programa';</script>";
            
                } else {

                    header('Location: ?c=programa');
            }
        }

        //Método que modifica el modelo de un programa.
        public function editarPrograma()
        {
            $pro = new programa();

            $pro->idnom_programa = $_REQUEST['idnom_programa'];
            $pro->programa = $_REQUEST['programa'];

            $this->model->actualizarPrograma($pro);

            if ($rows == null) 
            {

                print "<script>alert(\"Programa actualizado\");window.location='index.php?c=programa';</script>";
            
                } else {
                
                header('Location: ?c=programa');
            }
        }

        //Método que elimina la tupla programa con el idnom_programa dado.
        public function eliminarPrograma()
        {
            $this->model->eliminarPrograma($_REQUEST['idnom_programa']);
            header('Location: ?c=programa');
        }
    }
?>