<h1 class="page-header">
    <?php echo $pro->idnom_programa != null ? $pro->programa : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=programa">Programas</a></li>
  <li class="active"><?php echo $pro->idnom_programa != null ? $pro->programa : 'Nuevo Registro'; ?></li>
</ol>

<form action="?c=programa&a=editarPrograma" method="post">
    <input type="hidden" name="idnom_programa" value="<?php echo $pro->idnom_programa; ?>" />

    <div class="form-group">
        <label>Nombre del programa</label>
        <input type="text" name="programa" value="<?php echo $pro->programa; ?>" class="form-control" placeholder="Ingrese el nombre del programa" />
    </div>

    <div class="text-right">
        <button class="btn btn-success">Actualizar</button>
    </div>
</form>