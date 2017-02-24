<h1 class="page-header">Roles</h1>

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
            <th style="width:180px;">Código del rol </th>
            <th style="width:120px;">Nombre del rol</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->listarRol() as $r): ?>
        <tr>
            <td><?php echo $r->idrol; ?></td>
            <td><?php echo $r->descripcion_rol; ?></td>
            <td>
                <a href="?c=rol&a=crudRol&idrol=<?php echo $r->idrol; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=rol&a=eliminarRol&idrol=<?php echo $r->idrol; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</div>