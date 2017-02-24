<?php

    //Se incluye el modelo donde conectará el controlador.
    require_once '../modelo/perfil_persona.php';
    require_once '../modelo/seleccionar-tipo_documento.php';
    require_once '../modelo/seleccionar-numero_ficha.php';
    require_once '../modelo/seleccionar-equipo.php';
    require_once '../modelo/seleccionar-estado.php';

    class Perfil_personaControlador
    {
        private $model;
        private $seltdoc;
        private $selnficha;
        private $selequipo;
        private $selestado;

        //Creación del modelo
        public function __construct()
        {
            $this->model = new perfil_persona();
            $this->seltdoc = new select_tipo_documento();
            $this->selnficha = new select_numero_ficha();
            $this->selequipo = new select_equipo();
            $this->selestado = new select_estado();
        }

        //Llamado plantilla principal
        public function index()
        {
            require_once '../vista/header.php';
            require_once '../vista/perfil_persona/perfil_persona.php';
            require_once '../vista/footer.php';
        }

        //Llamado a la vista perfil_persona-editar
        public function crudPerfil_persona()
        {
            $pp = new perfil_persona();

            //Se obtienen los datos de la persona a editar.
            if(isset($_REQUEST['correo']))
            {
                $pp = $this->model->obtenerPerfil_persona($_REQUEST['correo']);
            }

            //Llamado de las vistas.
            require_once '../vista/header.php';
            require_once '../vista/perfil_persona/perfil_persona-editar.php';
            require_once '../vista/footer.php';
        }

        //Llamado a la vista perfil_persona-nueva
        public function nuevoPerfil_persona()
        {
            $pp = new perfil_persona();

            //Llamado de las vistas.
            require_once '../vista/header.php';
            require_once '../vista/perfil_persona/perfil_persona-nuevo.php';
            require_once '../vista/footer.php';
        }


        //Llamado a la vista perfil_persona-nueva
        public function estadoPerfil_persona()
        {
            $pp = new perfil_persona();

            if(isset($_REQUEST['correo']))
            {
                $pp = $this->model->obtenerPerfil_persona($_REQUEST['correo']);
            }

            //Llamado de las vistas.
            require_once '../vista/header.php';
            require_once '../vista/perfil_persona/perfil_persona-estado.php';
            require_once '../vista/footer.php';
        }

        //Método que registrar al modelo un nueva nueva persona.
        public function guardarPerfil_persona()
        {
            $pp = new perfil_persona();

            //Captura de los datos del formulario (vista).
            $pp->nombres = $_REQUEST['nombres'];
            $pp->apellidos = $_REQUEST['apellidos'];
            $pp->idtipo_documento = $_REQUEST['idtipo_documento'];
            $pp->num_documento = $_REQUEST['num_documento'];
            $pp->idnum_ficha = $_REQUEST['idnum_ficha'];
            $pp->eps = $_REQUEST['eps'];
            $pp->telefono = $_REQUEST['telefono'];
            $pp->correo = $_REQUEST['correo'];
            $pp->idequipo = $_REQUEST['idequipo'];
            $pp->password = $_REQUEST['password'];

            //Registro al modelo perfil_persona.
            $this->model->registrarPerfil_persona($pp);

            //header() es usado para enviar encabezados HTTP sin formato.
            //"Location:" No solamente envía el encabezado al navegador, sino que
            //también devuelve el código de status (302) REDIRECT al
            //navegador
            if ($rows == null) 
            {

                print "<script>alert(\"Registro guardado\");window.location='index.php?c=perfil_persona';</script>";
            
                } else {

                header('Location: ?c=perfil_persona');
            }
        }

        //Método que modifica el modelo de una persona.
        public function editarPerfil_persona()
        {
            $pp = new perfil_persona();

            $pp->nombres = $_REQUEST['nombres'];
            $pp->apellidos = $_REQUEST['apellidos'];
            $pp->idtipo_documento = $_REQUEST['idtipo_documento'];
            $pp->num_documento = $_REQUEST['num_documento'];
            $pp->idnum_ficha = $_REQUEST['idnum_ficha'];
            $pp->eps = $_REQUEST['eps'];
            $pp->telefono = $_REQUEST['telefono'];
            $pp->correo = $_REQUEST['correo'];

            $this->model->actualizarPerfil_persona($pp);

            if ($rows == null) 
            {

                print "<script>alert(\"Registro actualizado\");window.location='index.php?c=perfil_persona';</script>";
            
                } else {
                
                header('Location: ?c=perfil_persona');
            }
        }

        //Método que elimina la tupla perfil_persona con el correo dado.
        public function editar_estado_Perfil_persona()
        {
            $pp = new perfil_persona();

            $pp->idestado = $_REQUEST['idestado'];
            $pp->correo = $_REQUEST['correo'];

            $this->model->cambiar_estado_perfil_persona($pp);

            header('Location: ?c=perfil_persona');
        }
    }
?>