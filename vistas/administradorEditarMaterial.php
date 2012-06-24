<h1>Modifique los datos desee</h1>
<table align="center">
    <?php
    while ($item = $listado->fetch()) {
        ?>
        <tr>
            <td>ID:</td><td><input id="idMaterial" value="<?php echo $item['id'] ?>"/></td>
        </tr>
        <tr>
            <td>Nombre:</td><td><input id="nombreMaterial" value=" <?php echo $item['nombre'] ?>"/></td>
        </tr>
        <tr>
            <td>Tipo:</td>
            <td>
                <select id="tipoMaterial">
                    <option value="Libro" <?php if ($item['tipo'] == 'Libro') { echo 'selected'; } ?>>Libro</option>
                    <option value="Revista" <?php if ($item['tipo'] == 'Revista') { echo 'selected'; } ?>>Revista</option>
                    <option value="DVD" <?php if ($item['tipo'] == 'DVD') { echo 'selected'; } ?>>DVD</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Autor:</td><td><input id="autorMaterial" value="<?php echo $item['autor'] ?>"/></td>
        </tr>
        <tr>
            <td>Edicion:</td><td><input id="edicionMaterial" value="<?php echo $item['edicion'] ?>"/></td>
        </tr>
        <tr>
            <td>Editorial:</td><td><input id="editorialMaterial" value="<?php echo $item['editorial'] ?>"/></td>
        </tr>
        <tr>
            <td>Resumen:</td><td><textarea id="resumenMaterial"><?php echo $item['resumen'] ?></textarea></td>
        </tr>
        <tr>
            <td><button id="guardarNuevoMaterial" class="boton">Guardar Nuevo Material</button></td><td><button id="cancelar" class="boton">cancelar</button></td>
        </tr>
    <?php
    }
    ?> 
</table>