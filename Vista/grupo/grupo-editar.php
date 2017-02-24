<h1 class="page-header">
    <?php echo $gr->idgrupo != null ? $gr->descripcion : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=grupo">grupos</a></li>
  <li class="active"><?php echo $gr->idgrupo != null ? $gr->descripcion : 'Nuevo Registro'; ?></li>
</ol>

<form action="?c=grupo&a=editarGrupo" method="post">
    <input type="hidden" name="idgrupo" value="<?php echo $gr->idgrupo; ?>" />

    <div class="form-group">
        <label>Nombre del grupo</label>
        <input type="text" name="descripcion" value="<?php echo $gr->descripcion; ?>" class="form-control" placeholder="Ingrese el nombre del grupo" />
    </div>

    <div class="text-right">
        <button class="btn btn-success">Actualizar</button>
    </div>
</form>