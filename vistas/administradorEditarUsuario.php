<h1>Modifique los datos del Usuario</h1>
<table align="center" class="tablaEntrada">
    <?php
    require_once 'controladores/inicioControlador.php';

    while ($item = $listado->fetch()) {
        $fecha['year'] = $item[14];
        $fecha['mon'] = $item[13];
        $fecha['mday'] = $item[12];
        $fechaActual = getdate();
        $estado = inicioControlador::compararFechas($fecha, $fechaActual);
        $_SESSION['fecha_suspencion'] = $fecha['mday'].'/'.$fecha['mon'].'/'.$fecha['year'];
        $_SESSION['estado'] = $estado;
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
            <td>Region:</td><td colspan="2">
            <select id="regionDireccionUsuario">
                <option value="15" <?php if($item['DIRECCION.REGION'] == 15) { echo 'selected'; }?>>Arica y Parinacota</option>
                <option value="1" <?php if($item['DIRECCION.REGION'] == 1) { echo 'selected'; }?>>Tarapac&aacute;</option>
                <option value="2" <?php if($item['DIRECCION.REGION'] == 2) { echo 'selected'; }?>>Antofagasta</option>
                <option value="3" <?php if($item['DIRECCION.REGION'] == 3) { echo 'selected'; }?>>Atacama</option>
                <option value="4" <?php if($item['DIRECCION.REGION'] == 4) { echo 'selected'; }?>>Coquimbo</option>
                <option value="5" <?php if($item['DIRECCION.REGION'] == 5) { echo 'selected'; }?>>Valpara&iacute;so</option>
                <option value="13" <?php if($item['DIRECCION.REGION'] == 13) { echo 'selected'; }?>>Region Metropolitana</option>
                <option value="6" <?php if($item['DIRECCION.REGION'] == 6) { echo 'selected'; }?>>O&apos;Higgins</option>
                <option value="7" <?php if($item['DIRECCION.REGION'] == 7) { echo 'selected'; }?>>Maule</option>
                <option value="8" <?php if($item['DIRECCION.REGION'] == 8) { echo 'selected'; }?>>Biob&iacute;o</option>
                <option value="9" <?php if($item['DIRECCION.REGION'] == 9) { echo 'selected'; }?>>Araucan&iacute;a</option>
                <option value="14" <?php if($item['DIRECCION.REGION'] == 14) { echo 'selected'; }?>>Los R&iacute;os</option>
                <option value="10" <?php if($item['DIRECCION.REGION'] == 10) { echo 'selected'; }?>>Los Lagos</option>
                <option value="11" <?php if($item['DIRECCION.REGION'] == 11) { echo 'selected'; }?>>Ays&eacute;n</option>
                <option value="12" <?php if($item['DIRECCION.REGION'] == 12) { echo 'selected'; }?>>Magallanes</option>
            </select></td>
        </tr>
        <tr>
            <td>Telefono:</td><td colspan="2"><input id="telefonoUsuario" value="<?php echo $item['COLUMN_VALUE'] ?>"/></td>
        </tr>
        <tr>
            <td>Estado: </td>
            <td colspan="2">
                <select id="estadoUsuario">
                    <option value="1" <?php if ($estado == 2) { echo 'selected'; } ?>>Activado</option>
                    <option value="0" <?php if ($estado == 0 || $estado == 1) { echo 'selected'; } ?>>Suspendido</option>
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