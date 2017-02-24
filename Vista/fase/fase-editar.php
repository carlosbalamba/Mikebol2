<h1 class="page-header">
    <?php echo $fs->idfase != null ? $fs->descripcion : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=fase">Fases</a></li>
  <li class="active"><?php echo $fs->idfase != null ? $fs->descripcion : 'Nuevo Registro'; ?></li>
</ol>

<form action="?c=fase&a=editarFase" method="post">
    <input type="hidden" name="idfase" value="<?php echo $fs->idfase; ?>" />

    <div class="form-group">
        <label>Nombre de la fase</label>
        <input type="text" name="descripcion" value="<?php echo $fs->descripcion; ?>" class="form-control" placeholder="Ingrese el nombre de la fase" />
    </div>

    <div class="text-right">
        <button class="btn btn-success">Actualizar</button>
    </div>
</form>