<h1 class="page-header">
    Nuevo Registro
</h1>

<ol class="breadcrumb">
  <li><a href="?c=grupo">Grupos</a></li>
  <li class="active">Nuevo Registro</li>
</ol>

<form action="?c=grupo&a=guardarGrupo" method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label>Nombre del grupo</label>
      <input type="text" name="descripcion" value="<?php echo $gr->descripcion; ?>" class="form-control" placeholder="Ingrese nombre del grupo" />
    </div>
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>