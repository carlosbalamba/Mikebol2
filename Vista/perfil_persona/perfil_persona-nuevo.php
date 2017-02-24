<h1 class="page-header">
    Nuevo Registro
</h1>

<ol class="breadcrumb">
  <li><a href="?c=perfil_persona">Personas</a></li>
  <li class="active">Nuevo Registro</li>
</ol>

<form action="?c=perfil_persona&a=guardarPerfil_persona" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label>Nombres</label>
        <input type="text" name="nombres" value="<?php echo $pp->nombres; ?>" class="form-control" placeholder="Nombres" />
    </div>

    <div class="form-group">
        <label>Apellidos</label>
        <input type="text" name="apellidos" value="<?php echo $pp->apellidos; ?>" class="form-control" placeholder="Apellidos" />
    </div>

    <div class="form-group">
        <label>Tipo de documento</label>
        <br />
        <select name="idtipo_documento" class="form-control input sm">
            <option value="0">Seleccione tipo de documento</option>
                <?php foreach($this->seltdoc->lista_Select_Tipo_documento() as $r): ?>
            <option value=<?php echo $r->idtipo_documento; ?>><?php echo $r->documento; ?></option>
                <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label>Numero de documento</label>
        <input type="text" name="num_documento" value="<?php echo $pp->num_documento; ?>" class="form-control" placeholder="Número de documento" />
    </div>

    <div class="form-group">
        <label>Número de ficha</label>
        <br />
        <select name="idnum_ficha" class="form-control input sm">
            <option value="0">Seleccione numero de ficha</option>
                <?php foreach($this->selnficha->lista_Select_Numero_ficha() as $r): ?>
            <option value=<?php echo $r->idnum_ficha; ?>><?php echo $r->ficha; ?></option>
                <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label>Eps</label>
        <input type="text" name="eps" value="<?php echo $pp->eps; ?>" class="form-control" placeholder="Eps" />
    </div>

    <div class="form-group">
        <label>Teléfono móvil</label>
        <input type="text" name="telefono" value="<?php echo $pp->telefono; ?>" class="form-control" placeholder="Teléfono móvil" />
    </div>

    <div class="form-group">
        <label>Correo</label>
        <input type="text" name="correo" value="<?php echo $pp->correo; ?>" class="form-control" placeholder="ejemplo@misena.edu.co" />
    </div>

    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" value="<?php echo $pp->password; ?>" class="form-control" placeholder="Contraseña" />
    </div>

    <div class="form-group">
        <label>Equipo</label>
        <br />
        <select name="idequipo" class="form-control input sm">
                <option value="0">Seleccione su equipo</option>
                <?php foreach($this->selequipo->lista_Select_Equipo() as $r): ?>
                    <option value=<?php echo $r->idequipo; ?>><?php echo $r->nombre_equipo; ?></option>
                <?php endforeach; ?>
        </select>
    </div>

    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>