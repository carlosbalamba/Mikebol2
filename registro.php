<form name="registro" id="registro" action="vista/index.php?c=perfil_capitan&a=GuardarPerfil_capitan" method="POST" class="form-register">

  <h2 class="form__titulo2">FORMULARIO DE REGISTRO</h2>

    <div class="contenedor-inputs2">

        <input type="text" id="nombre" name="nombres" value="<?php echo $pp->nombres; ?>" class="input-100" placeholder="Nombres">

        <input type="text" id="apellido" name="apellidos" value="<?php echo $pp->apellidos; ?>" class="input-100" placeholder="Apellidos">

        <label>Tipo de documento:</label>
        <select name="idtipo_documento" id="tipo_documento">
            <option value="0">Seleccione tipo de documento</option>
                <?php foreach($this->seltdoc->lista_select_tipo_documento() as $r): ?>
            <option value=<?php echo $r->idtipo_documento; ?>><?php echo $r->documento; ?></option>
                <?php endforeach; ?>
        </select>

        <input type="text" id="usuario1" name="num_documento" value="<?php echo $pp->num_documento; ?>" class="input-100" placeholder="Numero documento">

        <label>Numero de ficha:</label>
        <select name="idnum_ficha" id="ficha">
            <option value="0">Seleccione numero de ficha</option>
                <?php foreach($this->selnficha->lista_select_numero_ficha() as $r): ?>
            <option value=<?php echo $r->idnum_ficha; ?>><?php echo $r->ficha; ?></option>
                <?php endforeach; ?>
        </select>

        <input type="text" id="eps" name="eps" value="<?php echo $pp->eps; ?>" class="input-100" placeholder="EPS">

        <input type="text" id="telefono" name="telefono" value="<?php echo $pp->telefono; ?>"  class="input-100" placeholder="telefono movil">

        <input type="text" id="correo" name="correo" value="<?php echo $pp->correo; ?>" class="input-100" placeholder="ejemplo@misena.edu.co">

        <input type="password" id="password1" name="password" value="<?php echo $pp->password; ?>" class="input-100" placeholder="Contrase&ntilde;a">

        <input type="password" id="con_password" name="con_password" class="input-100" placeholder="Repetir Contrase&ntilde;a">

        <label>Equipo:</label>
        <select name="idequipo" id="equipo">
            <option value="0">Seleccione su equipo</option>
                <?php foreach($this->selequipo->lista_select_equipo() as $r): ?>
            <option value=<?php echo $r->idequipo; ?>><?php echo $r->nombre_equipo; ?></option>
                <?php endforeach; ?>
        </select>

        <input id="acepto" type="checkbox" name="acepto"><font><strong class="leido">He leído y acepto las</strong></font><a href="javascript:void(0);" onclick="window.open('www.hori-bai.com/es/component/content/article/51-lopd/152-politica-de-privacidad.html','Privacidad','scrollbars=yes,width=400,height=400') ">

        <b><u><font class="poli">Políticas de privacidad</font></u></b></a>

        <input type="reset" value="Borrar" class="btn-borrar">
        <input type="button" name="registrar" value="Registrar" class="btn-enviar1" onclick="validar();">
    </div>
</form>