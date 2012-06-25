<h1>Modifique los datos del Usuario</h1>
<table align="center">
    <?php
    while ($item = $listado->fetch()) {
        ?>
        <tr>
            <td>Rut:</td><td colspan="2"><input id="rutUsuario" value="<?php echo $item['rut'] ?>"/></td>
        </tr>
        <tr>
            <td>Tipo:</td>
            <td colspan="2">
                <select id="tipoUsuario">
                    <option value="1" <?php if ($item['tipo'] == 1) { echo 'selected'; } ?>>Usuario Normal</option>
                    <option value="2" <?php if ($item['tipo'] == 2) { echo 'selected'; } ?>>Usuario Administrador</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Nombre:</td><td colspan="2"><input id="nombreUsuario" value="<?php echo $item['nombre'] ?>"/></td>
        </tr>
        <tr>
            <td>A. Paterno:</td><td colspan="2"><input id="apellidoPaternoUsuario" value="<?php echo $item['apellido_pat'] ?>"/></td>
        </tr>
        <tr>
            <td>A. Materno:</td><td colspan="2"><input id="apellidoMaternoUsuario" value="<?php echo $item['apellido_mat'] ?>"/></td>
        </tr>
        <tr>
            <td></td><td><button id="actualizarUsuario" class="boton">Guardar Nuevo Usuario</button></td><td><button id="cancelarActualizarUsuario" class="boton">Cancelar</button></td>
        </tr>
        <?php
    }
    ?> 
</table>
