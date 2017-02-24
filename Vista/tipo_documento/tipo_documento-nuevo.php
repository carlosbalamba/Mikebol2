<h1 class="page-header">
    Nuevo Registro
</h1>

<ol class="breadcrumb">
  <li><a href="?c=tipo_documento">Tipo documento</a></li>
  <li class="active">Nuevo Registro</li>
</ol>

<form action="?c=tipo_documento&a=GuardarTipo_documento" method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label>ID tipo documento</label>
      <input type="text" name="idtipo_documento" value="<?php echo $td->idtipo_documento; ?>" class="form-control" placeholder="Ingrese el ID del tipo de documento" />
      <label>Nombre del tipo de documento</label>
      <input type="text" name="documento" value="<?php echo $td->documento; ?>" class="form-control" placeholder="Ingrese nombre del tipo de documento" />
    </div>
  
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>