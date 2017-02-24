<h1 class="page-header">
    <?php echo $pp->correo != null ? $pp->nombres : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=admin_instructor">Admin e instructor</a></li>
  <li class="active"><?php echo $pp->correo != null ? $pp->nombres : 'Nuevo Registro'; ?></li>
</ol>

<form action="?c=admin_instructor&a=EditarAdmin_instructor" method="post">
    <input type="hidden" name="correo" value="<?php echo $pp->correo; ?>" />

    <div class="form-group">
        <label>Nombres</label>
        <input type="text" name="nombres" value="<?php echo $pp->nombres; ?>" class="form-control" placeholder="Nombres" />
    </div>

    <div class="form-group">
        <label>Apellidos</label>
        <input type="text" name="apellidos" value="<?php echo $pp->apellidos; ?>" class="form-control" placeholder="Apellidos" />
    </div>

    <div class="form-group">
        <label>Tipo de documento</label>
        <br />
        <select name="idtipo_documento" class="form-control input sm">
                <option value="0">Seleccione tipo de documento</option>
                <?php foreach($this->seltdoc->lista_select_tipo_documento() as $r): ?>
                    <option value=<?php echo $r->idtipo_documento; ?>><?php echo $r->documento; ?></option>
                <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label>Numero de documento</label>
        <input type="text" name="num_documento" value="<?php echo $pp->num_documento; ?>" class="form-control" placeholder="Número de documento" />
    </div>

    <div class="form-group">
        <label>Correo</label>
        <input type="text" name="correo" value="<?php echo $pp->correo; ?>" class="form-control" placeholder="ejemplo@misena.edu.co" />
    </div>

    <div class="text-right">
        <button class="btn btn-success">Actualizar</button>
    </div>
</form>