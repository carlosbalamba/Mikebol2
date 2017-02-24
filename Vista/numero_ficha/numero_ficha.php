<h1 class="page-header">Numero de fichas</h1>

<div class="btn-group btn-group-sm">
    <a class="btn btn-primary" href="?c=equipo&a=NuevoEquipo">Nuevo Equipo</a>
    <a class="btn btn-primary" href="?c=fase&a=NuevaFase">Nueva Fase</a>
    <a class="btn btn-primary" href="?c=grupo&a=NuevoGrupo">Nuevo Grupo</a>
    <a class="btn btn-primary" href="?c=grupo_ficha&a=NuevoGrupo_ficha">Nuevo Grupo Ficha</a>
    <a class="btn btn-primary" href="?c=programa&a=NuevoPrograma">Nuevo Programa</a>
    <a class="btn btn-primary" href="?c=novedad&a=NuevaNovedad">Nueva Novedad</a>
    <a class="btn btn-primary" href="?c=rol&a=NuevoRol">Nuevo Rol</a>
    <a class="btn btn-primary" href="?c=tipo_documento&a=NuevoTipo_documento">Nuevo Tipo documento</a>
    <a class="btn btn-primary" href="?c=numero_ficha&a=NuevoNumero_ficha">Nuevo Numero de ficha</a>
    <a class="btn btn-primary" href="?c=perfil_persona&a=NuevoPerfil_persona">Nueva Persona</a>
    <a class="btn btn-primary" href="?c=admin_instructor&a=Nuevoadmin_instructor">Nuevo admin o instructor</a>        
</div>

<div class="table-responsive">
<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Numero de la ficha</th>
            <th style="width:120px;">Grupo de la ficha</th>
            <th style="width:120px;">Nombre del programa</th>
            <th style="width:120px;">Estado</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->listarNumero_ficha() as $r): ?>
        <tr>
            <td><?php echo $r->ficha; ?></td>
            <td><?php echo $r->grupo_ficha; ?></td>
            <td><?php echo $r->programa; ?></td>
            <td><?php echo $r->descripcion; ?></td>
            <td>
                <a href="?c=numero_ficha&a=CrudNumero_ficha&idnum_ficha=<?php echo $r->idnum_ficha; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=numero_ficha&a=EliminarNumero_ficha&idnum_ficha=<?php echo $r->idnum_ficha; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</div>