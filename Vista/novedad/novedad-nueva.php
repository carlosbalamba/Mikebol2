<h1 class="page-header">
    Nuevo Registro
</h1>

<ol class="breadcrumb">
  <li><a href="?c=novedad">Novedades</a></li>
  <li class="active">Nuevo Registro</li>
</ol>

<form action="?c=novedad&a=guardarNovedad" method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label>Nombre de la novedad</label>
      <input type="text" name="descripcion" value="<?php echo $nvd->descripcion; ?>" class="form-control" placeholder="Ingrese nombre de la novedad" />
    </div>

    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>