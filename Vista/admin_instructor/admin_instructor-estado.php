<h1 class="page-header">
    <?php echo $pp->correo != null ? $pp->nombres : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=admin_instructor">Admin e instructor</a></li>
  <li class="active"><?php echo $pp->correo != null ? $pp->descripcion : 'Nuevo Registro'; ?></li>
</ol>

<form action="?c=admin_instructor&a=Editar_Estado_Admin_instructor" method="post">
    <input type="hidden" name="correo" value="<?php echo $pp->correo; ?>" />

    <div class="form-group">
        <label>Estado</label>
        <br />
        <select name="idestado" class="form-control input sm">
                <option value="0">Cambiar estado</option>
                <?php foreach($this->selestado->lista_Select_Estado() as $r): ?>
                    <option value=<?php echo $r->idestado; ?>><?php echo $r->descripcion; ?></option>
                <?php endforeach; ?>
        </select>
    </div>

    <div class="text-right">
        <button class="btn btn-success">Actualizar Estado</button>
    </div>
</form>