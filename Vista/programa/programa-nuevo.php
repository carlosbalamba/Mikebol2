<h1 class="page-header">
    Nuevo Registro
</h1>

<ol class="breadcrumb">
  <li><a href="?c=programa">Programas</a></li>
  <li class="active">Nuevo Registro</li>
</ol>

<form action="?c=programa&a=guardarPrograma" method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label>Nombre del programa</label>
      <input type="text" name="programa" value="<?php echo $pro->programa; ?>" class="form-control" placeholder="Ingrese nombre del programa" />
    </div>

    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>