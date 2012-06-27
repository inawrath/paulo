<h1>Modifique los datos del Usuario</h1>
<table align="center" class="tablaEntrada">
    <?php
    while ($item = $listado->fetch()) {
        
        ?><tr>
            <td>Rut:</td><td colspan="2"><input id="rutUsuario" value="<?php echo $item['RUT'] ?>" readonly/></td>
        </tr>
        <tr>
            <td>Contrase&ntilde;a:</td><td colspan="2"><input id="contrasenaUsuario" /></td>
        </tr>
        <tr>
            <td>Tipo:</td>
            <td colspan="2">
                <select id="tipoUsuario">
                    <option value="1" <?php if ($item['TIPO'] == 1) { echo 'selected'; } ?>>Usuario Normal</option>
                    <option value="2" <?php if ($item['TIPO'] == 2) { echo 'selected'; } ?>>Usuario Administrador</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Nombre:</td><td colspan="2"><input id="nombreUsuario" value="<?php echo $item['NOMBRE'] ?>"/></td>
        </tr>
        <tr>
            <td>A. Paterno:</td><td colspan="2"><input id="apellidoPaternoUsuario" value="<?php echo $item['APELLIDO_PAT'] ?>"/></td>
        </tr>
        <tr>
            <td>A. Materno:</td><td colspan="2"><input id="apellidoMaternoUsuario" value="<?php echo $item['APELLIDO_MAT'] ?>"/></td>
        </tr>
        <tr>
            <td>Direccion </td><td colspan="2"></td>
        </tr>
        <tr>
            <td>Calle:</td><td colspan="2"><input id="calleDireccionUsuario" value="<?php echo $item['DIRECCION.CALLE'] ?>"/></td>
        </tr>
        <tr>
            <td>Numero:</td><td colspan="2"><input id="numeroDireccionUsuario" value="<?php echo $item['DIRECCION.NUMERO'] ?>"/></td>
        </tr>
        <tr>
            <td>Ciudad:</td><td colspan="2"><input id="ciudadDireccionUsuario" value="<?php echo $item['DIRECCION.CIUDAD'] ?>"/></td>
        </tr>
        <tr>
            <td>Region:</td><td colspan="2"><input id="regionDireccionUsuario" value="<?php echo $item['DIRECCION.REGION'] ?>"/></td>
        </tr>
        <tr>
            <td>Telefono:</td><td colspan="2"><input id="telefonoUsuario" value="<?php echo $item['COLUMN_VALUE'] ?>"/></td>
        </tr>
        <tr>
            <td>Estado: </td>
            <td colspan="2">
                <select id="estadoUsuario">
                    <option value="1" <?php if ($item['BORRADO_LOGICO'] == 1) { echo 'selected'; } ?>>Activado</option>
                    <option value="2" <?php if ($item['BORRADO_LOGICO'] == 0) { echo 'selected'; } ?>>Desactivado</option>
                </select>
            </td>
        </tr>
        <tr>
            <td></td><td><button id="actualizarUsuario" class="boton">Guardar Nuevo Usuario</button></td><td><button id="cancelarActualizarUsuario" class="boton">Cancelar</button></td>
        </tr>
    <?php
}
?> 
</table>
