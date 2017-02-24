<h1 class="page-header">
    Nuevo Registro
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Numero_ficha">Numero de fichas</a></li>
  <li class="active">Nuevo Registro</li>
</ol>

<form action="?c=Numero_ficha&a=GuardarNumero_ficha" method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label>Numero de la ficha</label>
      <input type="text" name="ficha" value="<?php echo $nfi->ficha; ?>" class="form-control" placeholder="Ingrese nombre del grupo de la ficha" />
    </div>

    <div class="form-group">
        <label>Grupo de la ficha</label>
        <br />
        <select name="idgrupo_ficha" class="form-control input sm">
                <option value="0">Seleccione Grupo de  la ficha</option>
                <?php foreach($this->selgru->lista_select_grupoficha() as $r): ?>
                    <option value=<?php echo $r->idgrupo_ficha; ?>><?php echo $r->grupo_ficha; ?></option>
                <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label>Nombre del programa</label>
        <br />
        <select name="idnom_programa" class="form-control input sm">
                <option value="0">Seleccione nombre del programa</option>
                <?php foreach($this->selpro->lista_select_programa() as $r): ?>
                    <option value=<?php echo $r->idnom_programa; ?>><?php echo $r->programa; ?></option>
                <?php endforeach; ?>
        </select>
    </div>

    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>