<h1 class="page-header">
    <?php echo $grfc->idgrupo_ficha != null ? $grfc->grupo_ficha : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=grupo_ficha">Grupos Fichas</a></li>
  <li class="active"><?php echo $grfc->idgrupo_ficha != null ? $grfc->grupo_ficha : 'Nuevo Registro'; ?></li>
</ol>

<form action="?c=grupo_ficha&a=editarGrupo_ficha" method="post">
    <input type="hidden" name="idgrupo_ficha" value="<?php echo $grfc->idgrupo_ficha; ?>" />

    <div class="form-group">
        <label>Nombre del grupo de la ficha</label>
        <input type="text" name="grupo_ficha" value="<?php echo $grfc->grupo_ficha; ?>" class="form-control" placeholder="Ingrese el nombre del grupo de la ficha" />
    </div>

    <div class="text-right">
        <button class="btn btn-success">Actualizar</button>
    </div>
</form>