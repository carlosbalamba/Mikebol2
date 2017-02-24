<h1 class="page-header">Personas</h1>

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
            <th style="width:180px;">Nombres</th>
            <th style="width:120px;">Apellidos</th>
            <th style="width:120px;">Tipo Documento</th>
            <th style="width:120px;">Documento</th>
            <th style="width:120px;">Ficha</th>
            <th style="width:120px;">Eps</th>
            <th style="width:120px;">Telefono</th>
            <th style="width:120px;">Correo</th>
            <th style="width:120px;">Equipo</th>
            <th style="width:120px;">Rol</th>
            <th style="width:120px;">Estado</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->ListarPerfil_persona() as $r): ?>
        <tr>
            <td><?php echo $r->nombres; ?></td>
            <td><?php echo $r->apellidos; ?></td>
            <td><?php echo $r->documento; ?></td>
            <td><?php echo $r->num_documento; ?></td>
            <td><?php echo $r->ficha; ?></td>
            <td><?php echo $r->eps; ?></td>
            <td><?php echo $r->telefono; ?></td>
            <td><?php echo $r->correo; ?></td>
            <td><?php echo $r->nombre_equipo; ?></td>
            <td><?php echo $r->descripcion_rol; ?></td>
            <td><?php echo $r->descripcion; ?></td>
            <td>
                <a href="?c=perfil_persona&a=crudPerfil_persona&correo=<?php echo $r->correo; ?>">Editar</a>
            </td>
            <td>
                <a href="?c=perfil_persona&a=estadoPerfil_persona&correo=<?php echo $r->correo; ?>">Estado</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</div>