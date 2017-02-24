<?php

    //Se incluye el modelo donde conectará el controlador.
    require_once '../modelo/admin_instructor.php';
    require_once '../modelo/seleccionar-tipo_documento.php';
    require_once '../modelo/seleccionar-estado.php';
     require_once '../modelo/seleccionar-rol.php';

    class Admin_instructorControlador
    {
        private $model;
        private $seltdoc;
        private $selestado;

        //Creación del modelo
        public function __construct()
        {
            $this->model = new admin_instructor();
            $this->seltdoc = new select_tipo_documento();
            $this->selestado = new select_estado();
            $this->selrol = new select_rol();
        }

        //Llamado plantilla principal
        public function index()
        {
            require_once '../vista/header.php';
            require_once '../vista/admin_instructor/admin_instructor.php';
            require_once '../vista/footer.php';
        }

        //Llamado a la vista admin_instructor-editar
        public function crudAdmin_instructor()
        {
            $pp = new admin_instructor();

            //Se obtienen los datos de la persona a editar.
            if(isset($_REQUEST['correo']))
            {
                $pp = $this->model->obteneradmin_instructor($_REQUEST['correo']);
            }

            //Llamado de las vistas.
            require_once '../vista/header.php';
            require_once '../vista/admin_instructor/admin_instructor-editar.php';
            require_once '../vista/footer.php';
        }

        //Llamado a la vista admin_instructor-nueva
        public function nuevoAdmin_instructor()
        {
            $pp = new admin_instructor();

            //Llamado de las vistas.
            require_once '../vista/header.php';
            require_once '../vista/admin_instructor/admin_instructor-nuevo.php';
            require_once '../vista/footer.php';
        }


        //Llamado a la vista admin_instructor-nueva
        public function estadoAdmin_instructor()
        {
            $pp = new admin_instructor();

            if(isset($_REQUEST['correo']))
            {
                $pp = $this->model->obteneradmin_instructor($_REQUEST['correo']);
            }

            //Llamado de las vistas.
            require_once '../vista/header.php';
            require_once '../vista/admin_instructor/admin_instructor-estado.php';
            require_once '../vista/footer.php';
        }

        //Método que registrar al modelo un nueva nueva persona.
        public function guardarAdmin_instructor()
        {
            $pp = new admin_instructor();

            //Captura de los datos del formulario (vista).
            $pp->nombres = $_REQUEST['nombres'];
            $pp->apellidos = $_REQUEST['apellidos'];
            $pp->idtipo_documento = $_REQUEST['idtipo_documento'];
            $pp->num_documento = $_REQUEST['num_documento'];
            $pp->correo = $_REQUEST['correo'];
            $pp->password = $_REQUEST['password'];
            $pp->idrol = $_REQUEST['idrol'];

            //Registro al modelo admin_instructor.
            $this->model->registrarAdmin_instructor($pp);

            //header() es usado para enviar encabezados HTTP sin formato.
            //"Location:" No solamente envía el encabezado al navegador, sino que
            //también devuelve el código de status (302) REDIRECT al
            //navegador
            if ($rows == null) 
            {

                print "<script>alert(\"Registro guardado\");window.location='index.php?c=admin_instructor';</script>";
            
                } else {

                header('Location: ?c=admin_instructor');
            }
        }

        //Método que modifica el modelo de una persona.
        public function editaradmin_instructor()
        {
            $pp = new admin_instructor();

            $pp->nombres = $_REQUEST['nombres'];
            $pp->apellidos = $_REQUEST['apellidos'];
            $pp->idtipo_documento = $_REQUEST['idtipo_documento'];
            $pp->num_documento = $_REQUEST['num_documento'];
            $pp->correo = $_REQUEST['correo'];

            $this->model->actualizaradmin_instructor($pp);

            if ($rows == null) 
            {

                print "<script>alert(\"Registro actualizado\");window.location='index.php?c=admin_instructor';</script>";
            
                } else {
                
                header('Location: ?c=admin_instructor');
            }
        }

        //Método que elimina la tupla admin_instructor con el correo dado.
        public function editar_estado_admin_instructor()
        {
            $pp = new admin_instructor();

            $pp->idestado = $_REQUEST['idestado'];
            $pp->correo = $_REQUEST['correo'];

            $this->model->cambiar_estado_admin_instructor($pp);

            header('Location: ?c=admin_instructor');
        }
    }
?>