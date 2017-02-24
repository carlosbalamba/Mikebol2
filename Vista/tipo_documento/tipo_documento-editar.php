<h1 class="page-header">
    <?php echo $td->idtipo_documento != null ? $td->documento : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=tipo_documento">Tipo documento</a></li>
  <li class="active"><?php echo $td->idtipo_documento != null ? $td->documento : 'Nuevo Registro'; ?></li>
</ol>

<form action="?c=tipo_documento&a=editartipo_documento" method="post">
    <input type="hidden" name="idtipo_documento" value="<?php echo $td->idtipo_documento; ?>" />

    <div class="form-group">
        <label>Nombre del tipo de documento</label>
        <input type="text" name="documento" value="<?php echo $td->documento; ?>" class="form-control" placeholder="Ingrese el nombre del tipo de documento" />
    </div>

    <hr />

    <div class="text-right">
        <button class="btn btn-success">Actualizar</button>
    </div>
</form>