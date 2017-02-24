<?php
  include 'controlador/session.controlador.php';
  
  session_start();

  if (isset($_SESSION["id_usuario"]) && !isset($_SESSION["estado"]) == 0)
    { header("Location: welcome.php"); }

    $obj = new SessionControlador();

    if (!empty($_POST)) 
    {

      $sql = $obj->inicioSession();

      $rows = $sql;

      if ($rows > null) 
      {
        foreach ($rows as $r) 
      {

        $_SESSION['id_usuario']  = $r->correo;
        $_SESSION['tipousuario']  = $r->idrol;
        $_SESSION['estado']  = $r->idestado;
        

        if($r->idestado == 1)
        {

          header("Location: welcome.php");

        } elseif ($r->idestado == 0) {

          print "<script>alert(\"Su cuenta esta inactiva por favor contacte con el administrador\");window.location='index.php';</script>";

          session_destroy();
        }
      }
    } else { print "<script>alert(\"El usuario o contraseña son incorrectos\");window.location='index.php';</script>"; }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="shortcut icon" href="imagenes/mi.png" type="image/x-icon">
    <title>MIKEBOL</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1, minimum-scale=1">
    <link rel="stylesheet" href="Estilos/estilos/fontello.css">
    <link rel="stylesheet" href="Estilos/estilos/estilos.css">
    <!--<link rel="stylesheet" href="Estilos/css/bootstrap.css">-->
    <script src="https://use.fontawesome.com/e622d3b53e.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>

  <body>
    <header>
      <div class="contenedor">
        <h1><img id="logo" src="imagenes/logo.ico">MIKEBOL</h1>
        <input type="checkbox" id="menu-bar">
        <label class="icon-menu" for="menu-bar"></label>
        <nav class="menu">
          <a href="vista/index.php?c=perfil_capitan&a=NuevoPerfil_capitan" data-toggle="modal" data-target="#modalRegistro" id="modal-nav">Registrarse</a>
          <a data-toggle="modal" href="#modalSesion" id="modal-nav">Ingresar</a>
          <a data-toggle="modal" href="#modalNosotros" id="modal-nav">Nosotros</a>
        </nav>
      </div>
    </header>

    <section id="banner">
      <div class="contendeor">
        <h1 class="titulo-mikebol"><marquee BGcolor="#FFF" direction=left><img src="imagenes/logo3.png" width="70" height="70">BIENVENIDOS A MIKEBOL<img src="imagenes/logo3.png" width="70" height="70"></marquee></h1>
      </div>
    </section>

    <div class="container">
      <br>
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
    
        <!-- Indicadores -->
    
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
          <li data-target="#myCarousel" data-slide-to="3"></li>
          <li data-target="#myCarousel" data-slide-to="4"></li>
        </ol>

      <!-- Envoltorio para slides -->

        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="imagenes/logo3.png" id="img-carousel">
          </div>

          <div class="item">
           <img src="imagenes/img2.jpg" id="img-carousel">
           <div class="carousel-caption">
              <h3>NOSEEEEE</h3>
            </div>
          </div>
    
          <div class="item">
            <img src="imagenes/img3.jpg" id="img-carousel">
          </div>

          <div class="item">
            <img src="imagenes/img4.jpg" id="img-carousel">
          </div>

          <div class="item">
            <img src="imagenes/body.jpg" id="img-carousel">
          </div>
        </div>

        <!-- Controles izquierda y derecha -->

        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        </a>
      </div>
    </div>

    <section id="Redes">
      <a class="icon-facebook" href="https://www.facebook.com/jairoarturo.cifuentes" target="_blank"></a>
      <a class="icon-instagram" href="https://www.instagram.com/jacifuentes521/" target="_blank"></a>
      <?php include'Redes/gmail.php';?>
    </section>
    
    <footer>
      <div>
        <p>MIKEBOL JCYML copyright © <?=date('Y'); ?></p>
      </div>
    </footer>

    <!--Modal quienes somos -->

    <div class="modal fade" id="modalNosotros" role="dialog">
      <div class="modal-dialog" id="estilo-modal">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><b>X</b></button>
            <h4 class="modal-title">¿Quienes somos?</h4>
          </div>
          <div class="modal-body" id="estilo-modal">
            <div class="n">

              <h1 class="q">¿Quienes somos?</h1>

              <p>El Servicio Nacional de Aprendizaje, SENA, es un establecimiento público del orden nacional con personería jurídica, patrimonio propio e independiente y autonomía administrativa.  Adscrito al Ministerio del Trabajo de Colombia, ofrece formación gratuita a millones de colombianos que se benefician con programas técnicos, tecnológicos y complementarios, que enfocados al desarrollo económico, tecnológico y social del país, entran a engrosar las actividades productivas de las empresas y de la industria, para obtener mejor competitividad y producción con los mercados globalizados.</p>

              <p>La Institución está facultada por el Estado para la inversión en infraestructura necesaria para mejorar el desarrollo social y técnico de los trabajadores en las diferentes regiones,  a través de formación profesional integral que logra incorporarse con las metas del Gobierno Nacional, mediante el cubrimiento de las necesidades específicas de recurso humano en las empresas, a través de la vinculación al mercado laboral bien sea como empleado o subempleado, con grandes oportunidades para el desarrollo empresarial, comunitario y tecnológico.</p>

              <p>El SENA jalona el desarrollo tecnológico para que las empresas del país sean altamente productivas y competitivas en los mercados globalizados La Entidad más querida por los colombianos funciona en permanente alianza entre Gobierno, empresarios y trabajadores, desde su creación​ con el firme propósito de lograr la competitividad de Colombia a través del incremento de la productividad en las empresas y regiones, sin dejar de lado la inclusión social en articulación con la política nacional: Más empleo y menos pobreza. Por tal razón, se generan continuamente programas y proyectos de responsabilidad social, empresarial, formación, innovación, internacionalización y transferencia de conocimientos y tecnologías.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--Modal de Iniciar Sesion-->

    <div class="modal fade" id="modalSesion" role="dialog">
      <div class="modal-dialog modal-sm" id="estilo-modal">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><b>X</b></button>
            <h4 class="modal-title">Iniciar Sesión</h4>
          </div>
          <div class="modal-body" id="estilo-modal">
           <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" class="form-sesion">
              <div class="contenedor-inputs">
                <input type="text" id="usuario" name="usuario" placeholder="Ingresa tu direccion de correo electrónico" required>

                <input type="password" id="password" name="password" placeholder="Contraseña" required>
                
                <input type="submit" value="Login" class="btn-login" name="login">

                <a data-toggle="modal" href="#modalCambio" id="olv">¿Olvido su contraseña?</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!--Modal cambio de contraseña-->

    <div class="modal fade" id="modalCambio" role="dialog">
      <div class="modal-dialog" id="estilo-modal">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><b>X</b></button>
            <h4 class="modal-title">Cambio de contraseña</h4>
          </div>
          <div class="modal-body" id="estilo-modal">

            <form action="cambio.php" class="form-cambio" method="POST">
              <h2 class="form__titulo1">Cambio de contraseña</h2>
              <div class="contenedor-inputs1">
                <p>Por favor escriba su direccion de correo electronico y haga click en el botón<strong>"Enviar nueva contraseña"</strong>para enviarle una nueva contraseña .
                </p>
                <input id="ce" type="text" class="input-48s" name="" placeholder="correo electronico" required >
                <input class="input-48s" type="submit" value="Enviar nueva contraseña">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!--Modal de formulario de registro-->

    <div class="modal fade" id="modalRegistro" role="dialog">
      <div class="modal-dialog" id="estilo-modal">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><b>X</b></button>
            <h4 class="modal-title">Formulario de registro</h4>
          </div>
          <div class="modal-body" id="estilo-modal">
          </div>
        </div>
      </div>
    </div>

    <?php include 'Validar/Validaciones.php';?>
    
  </body>
</html>