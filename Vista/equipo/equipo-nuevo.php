<h1 class="page-header">
    Nuevo Registro
</h1>

<ol class="breadcrumb">
  <li><a href="?c=equipo">Equipos</a></li>
  <li class="active">Nuevo Registro</li>
</ol>

<form action="?c=equipo&a=guardarEquipo" method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label>Nombre del equipo</label>
      <input type="text" name="nombre_equipo" value="<?php echo $eqp->nombre_equipo; ?>" class="form-control" placeholder="Ingrese nombre del equipo" />
    </div>

    <div class="text-right">
      <button class="btn btn-success">Guardar</button>
    </div>
</form>