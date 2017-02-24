<h1 class="page-header">
    Nuevo Registro
</h1>

<ol class="breadcrumb">
  <li><a href="?c=rol">Roles</a></li>
  <li class="active">Nuevo Registro</li>
</ol>

<form action="?c=rol&a=GuardarRol" method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label>Nombre del rol</label>
      <input type="text" name="descripcion_rol" value="<?php echo $rl->descripcion_rol; ?>" class="form-control" placeholder="Ingrese el nombre del rol" />
    </div>

    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>