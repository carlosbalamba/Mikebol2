<h1 class="page-header">
    <?php echo $nvd->idnovedad != null ? $nvd->descripcion : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=novedad">Novedades</a></li>
  <li class="active"><?php echo $nvd->idnovedad != null ? $nvd->descripcion : 'Nuevo Registro'; ?></li>
</ol>

<form action="?c=novedad&a=EditarNovedad" method="post">
    <input type="hidden" name="idnovedad" value="<?php echo $nvd->idnovedad; ?>" />

    <div class="form-group">
        <label>Nombre novedad</label>
        <input type="text" name="descripcion" value="<?php echo $nvd->descripcion; ?>" class="form-control" placeholder="Ingrese el nombre de la novedad" />
    </div>
    
    <div class="text-right">
        <button class="btn btn-success">Actualizar</button>
    </div>
</form>