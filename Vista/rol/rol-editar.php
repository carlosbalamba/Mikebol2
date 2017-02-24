<h1 class="page-header">
    <?php echo $rl->idrol != null ? $rl->descripcion_rol : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=rol">Roles</a></li>
  <li class="active"><?php echo $rl->idrol != null ? $rl->descripcion_rol : 'Nuevo Registro'; ?></li>
</ol>

<form action="?c=rol&a=EditarRol" method="post">
    <input type="hidden" name="idrol" value="<?php echo $rl->idrol; ?>" />

    <div class="form-group">
        <label>Nombre rol</label>
        <input type="text" name="descripcion_rol" value="<?php echo $rl->descripcion_rol; ?>" class="form-control" placeholder="Ingrese el nombre del rol" />
    </div>

    <hr />

    <div class="text-right">
        <button class="btn btn-success">Actualizar</button>
    </div>
</form>