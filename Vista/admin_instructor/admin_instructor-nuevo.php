<h1 class="page-header">
    Nuevo Registro
</h1>

<ol class="breadcrumb">
  <li><a href="?c=admin_instructor">Admin e instructores</a></li>
  <li class="active">Nuevo Registro</li>
</ol>

<form action="?c=admin_instructor&a=guardarAdmin_instructor" method="post" enctype="multipart/form-data">

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
        <label>Correo</label>
        <input type="text" name="correo" value="<?php echo $pp->correo; ?>" class="form-control" placeholder="ejemplo@misena.edu.co" />
    </div>

    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" value="<?php echo $pp->password; ?>" class="form-control" placeholder="Contraseña" />
    </div>

    <div class="form-group">
        <label>Rol</label>
        <br />
        <select name="idrol" class="form-control input sm">
            <option value="0">Seleccione rol</option>
                <?php foreach($this->selrol->lista_Select_Rol() as $r): ?>
            <option value=<?php echo $r->idrol; ?>><?php echo $r->descripcion_rol; ?></option>
                <?php endforeach; ?>
        </select>
    </div>

    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>