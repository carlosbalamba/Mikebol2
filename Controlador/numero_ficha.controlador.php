<?php

    //Se incluye el modelo donde conectará el controlador.
    require_once '../modelo/numero_ficha.php';
    require_once '../modelo/seleccionar-grupo_ficha.php';
    require_once '../modelo/seleccionar-programa.php';

    class Numero_fichaControlador
    {
        private $model;
        private $selgru;
        private $selpro;
    
        //Creación del modelo
        public function __construct()
        {
            $this->model = new numero_ficha();
            $this->selgru = new select_grupoficha();
            $this->selpro = new select_programa();
        }

        //Llamado plantilla principal
        public function index()
        {
            require_once '../vista/header.php';
            require_once '../vista/numero_ficha/numero_ficha.php';
            require_once '../vista/footer.php';
        }

        //Llamado a la vista numero_ficha-editar
        public function crudNumero_ficha()
        {
            $nfi = new numero_ficha();

            //Se obtienen los datos del numero de ficha a editar.
            if(isset($_REQUEST['idnum_ficha']))
            {
                $nfi = $this->model->obtenerNumero_ficha($_REQUEST['idnum_ficha']);
            }

            //Llamado de las vistas.
            require_once '../vista/header.php';
            require_once '../vista/numero_ficha/numero_ficha-editar.php';
            require_once '../vista/footer.php';
        }

        //Llamado a la vista numero_ficha-nuevo
        public function nuevoNumero_ficha()
        {
            $nfi = new numero_ficha();

            //Llamado de las vistas.
            require_once '../vista/header.php';
            require_once '../vista/numero_ficha/numero_ficha-nuevo.php';
            require_once '../vista/footer.php';
        }

        //Método que registrar al modelo un nuevo numero de ficha.
        public function guardarNumero_ficha()
        {
            $nfi = new numero_ficha();

            //Captura de los datos del formulario (vista).
            $nfi->ficha = $_REQUEST['ficha'];
            $nfi->idgrupo_ficha = $_REQUEST['idgrupo_ficha'];
            $nfi->idnom_programa = $_REQUEST['idnom_programa'];

            //Registro al modelo numero de ficha.
            $this->model->registrarNumero_ficha($nfi);

            //header() es usado para enviar encabezados HTTP sin formato.
            //"Location:" No solamente envía el encabezado al navegador, sino que
            //también devuelve el código de status (302) REDIRECT al
            //navegador

            if ($rows == null) 
            {

                print "<script>alert(\"Número de ficha guardada\");window.location='index.php?c=numero_ficha';</script>";
            
                } else {

                header('Location: ?c=numero_ficha');
            }
        }

        //Método que modifica el modelo de un numero de ficha.
        public function editarNumero_ficha()
        {
            $nfi = new numero_ficha();

            $nfi->idnum_ficha = $_REQUEST['idnum_ficha'];
            $nfi->ficha = $_REQUEST['ficha'];
            $nfi->idgrupo_ficha = $_REQUEST['idgrupo_ficha'];
            $nfi->idnom_programa = $_REQUEST['idnom_programa'];

            $this->model->actualizarNumero_ficha($nfi);

            if ($rows == null) 
            {

                print "<script>alert(\"Numero de ficha actualizada\");window.location='index.php?c=numero_ficha';</script>";
            
                } else {
                
                header('Location: ?c=numero_ficha');
            }
        }

        //Método que elimina la tupla numero de ficha con el idnum_ficha dado.
        public function eliminarNumero_ficha()
        {
            $this->model->eliminarNumero_ficha($_REQUEST['idnum_ficha']);
            header('Location: ?c=numero_ficha');
        }
    }
?>