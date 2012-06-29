<h1>Modifique los datos desee</h1>
<table align="center" class="tablaEntrada">
    <?php
    while ($item = $listado->fetch()) {
        ?>
        <tr>
            <td>Clasificación:</td><td colspan="2"><input id="clasificacionMaterial" value="<?php echo $item['CLASIFICACION'] ?>" readonly/></td>
        </tr>
        <tr>
            <td>Nombre:</td><td colspan="2"><input id="nombreMaterial" value="<?php echo $item['DESCRIPCION.NOMBRE'] ?>"/></td>
        </tr>
        <tr>
            <td>Tipo:</td>
            <td colspan="2">
                <select id="tipoMaterial">
                    <option value="Libro" <?php if ($item['DESCRIPCION.TIPO '] == 'Libro') { echo 'selected'; } ?>>Libro</option>
                    <option value="Revista" <?php if ($item['DESCRIPCION.TIPO'] == 'Revista') { echo 'selected'; } ?>>Revista</option>
                    <option value="DVD" <?php if ($item['DESCRIPCION.TIPO'] == 'DVD') { echo 'selected'; } ?>>DVD</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Autor:</td><td colspan="2"><input id="autorMaterial" value="<?php echo $item['DESCRIPCION.AUTOR'] ?>"/></td>
        </tr>
        <tr>
            <td>Edicion:</td><td colspan="2"><input id="edicionMaterial" value="<?php echo $item['DESCRIPCION.EDICION'] ?>"/></td>
        </tr>
        <tr>
            <td>A&ntilde;o Edicion:</td><td colspan="2"><input id="anioMaterial" value="<?php echo $item['DESCRIPCION.ANIO'] ?>"/></td>
        </tr>
        <tr>
            <td>Editorial:</td><td colspan="2"><input id="editorialMaterial" value="<?php echo $item['DESCRIPCION.EDITORIAL'] ?>"/></td>
        </tr>
        <tr>
            <td>Nro Copias:</td><td colspan="2"><input id="copiasMaterial" value="<?php echo $item['CANTIDAD'] ?>"/></td>
        </tr>
        <tr>
            <td>Resumen:</td><td><textarea id="resumenMaterial"><?php echo $item['DESCRIPCION.RESUMEN'] ?></textarea></td>
        </tr>
        <tr>
            <td></td><td><button id="guardarActualizarMaterial" class="boton">Guardar Nuevo Material</button></td><td><button id="cancelarActualizarMaterial" class="boton">cancelar</button></td>
        </tr>
        <?php
    }
    ?> 
</table>