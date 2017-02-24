<h1 class="page-header">
    Nuevo Registro
</h1>

<ol class="breadcrumb">
  <li><a href="?c=grupo_ficha">Grupos de ficha</a></li>
  <li class="active">Nuevo Registro</li>
</ol>

<form action="?c=Grupo_ficha&a=guardarGrupo_ficha" method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label>Nombre del grupo</label>
      <input type="text" name="grupo_ficha" value="<?php echo $grfc->grupo_ficha; ?>" class="form-control" placeholder="Ingrese nombre del grupo de la ficha" />
    </div>
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>