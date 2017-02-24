<?php
  //Se incluye la configuración de conexión a datos en el
  //SGBD: MariaDB.
  require_once '../modelo/database.php';

  $controlador = 'equipo';

  // Todo esta lógica hara el papel de un FrontController
  if(!isset($_REQUEST['c']))
  {
    //Llamado de la página principal
    require_once "../controlador/$controlador.controlador.php";
    $controlador = ucwords($controlador) . 'controlador';
    $controlador = new $controlador;
    $controlador->Index();
  }
  else
  {
    // Obtiene el controlador a cargar
    $controlador = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';

    // Instancia el controlador
    require_once "../controlador/$controlador.controlador.php";
    $controlador = ucwords($controlador) . 'controlador';
    $controlador = new $controlador;

    // Llama la accion
    call_user_func( array( $controlador, $accion ) );
  }
?>