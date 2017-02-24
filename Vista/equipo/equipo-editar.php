<h1 class="page-header">
    <?php echo $eqp->idequipo != null ? $eqp->nombre_equipo : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=equipo">Equipos</a></li>
  <li class="active"><?php echo $eqp->idequipo != null ? $eqp->nombre_equipo : 'Nuevo Registro'; ?></li>
</ol>

<form action="?c=equipo&a=editarEquipo" method="post">
    <input type="hidden" name="idequipo" value="<?php echo $eqp->idequipo; ?>" />

    <div class="form-group">
        <label>Nombre del equipo</label>
        <input type="text" name="nombre_equipo" value="<?php echo $eqp->nombre_equipo; ?>" class="form-control" placeholder="Ingrese el nombre del equipo" />
    </div>

    <div class="text-right">
        <button class="btn btn-success">Actualizar</button>
    </div>
</form>