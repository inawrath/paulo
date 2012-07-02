<h1>Listado de Usuarios:</h1>

<button id="agregarNuevoUsuario" class="boton">Agregar Nuevo Usuario</button>
<br/>
<br/>
<table align="center" class="bordered">
    <tr> 
        <th>Rut</th><th>Nombre</th><th>Tipo</th><th>Estado</th><th>Editar</th><th>Eliminar</th>
    </tr>
    <?php
    require_once 'controladores/inicioControlador.php';
    while ($item = $listado->fetch()) {
        $fecha['mday'] = $item['DIA_S'];
        $fecha['mon'] = $item['MES_S'];
        $fecha['year'] = $item['ANIO_S'];

        $fechaActual = getdate();
        $estado = inicioControlador::compararFechas($fecha, $fechaActual);
        ?>
        <tr>
            <td><?= $item['RUT'] ?></td><td><?= $item['NOMBRE'] ?></td><td><? if($item['TIPO'] == '2'){ echo 'Administrador'; }else{ echo 'Usuario'; } ?></td><td><?php if($estado == 2){ echo 'Activo'; } else { echo 'Suspendido'; } ?></td>
            <?php
            if ($item['BORRADO_LOGICO'] == 0) {
                ?>
                <td colspan="2"><a href="<?php echo $item['RUT'] ?>" class="activar boton">Activar</a></td>
                <?php
            } else {
                ?>
                <td><a href="<?php echo $item['RUT'] ?>" class="editar boton">editar</a></td><td><a href="<?php echo $item['RUT'] ?>" class="eliminar boton">eliminar</a></td>
                <?php
            }
            ?>
        </tr>
        <?php
    }
    ?>
</table>