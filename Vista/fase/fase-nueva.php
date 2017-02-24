<h1 class="page-header">
    Nuevo Registro
</h1>

<ol class="breadcrumb">
  <li><a href="?c=fase">Fases</a></li>
  <li class="active">Nuevo Registro</li>
</ol>

<form id="frm-fase" action="?c=fase&a=Guardarfase" method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label>Nombre de la fase</label>
      <input type="text" name="descripcion" value="<?php echo $fs->descripcion; ?>" class="form-control" placeholder="Ingrese nombre de la fase" />
    </div>

    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>