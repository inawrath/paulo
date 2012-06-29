<h1>Listado de Materiales:</h1>

<button id="agregarNuevoMaterial" class="boton">Agregar Nuevo Material</button>
<br/>
<br/>
<table align="center" class="bordered">
    <tr> 
        <th>Nombre</th><th>Tipo</th><th>Resumen</th><th>Editar</th><th>Eliminar</th>
    </tr>
    <?php
    while ($item = $listado->fetch()) {
        ?>
        <tr>
            <td><?= $item['DESCRIPCION.NOMBRE'] ?></td><td><?= $item['DESCRIPCION.TIPO'] ?></td><td><?= $item['DESCRIPCION.RESUMEN'] ?></td>
            <?php
            if ($item['BORRADO_LOGICO'] == 0) {
                ?>
                <td colspan="2"><a href="<?php echo $item['CLASIFICACION'] ?>" class="activar boton">Activar</a></td>
                <?php
            } else {
                ?>
                <td><a href="<?php echo $item['CLASIFICACION'] ?>" class="editar boton">editar</a></td><td><a href="<?php echo $item['CLASIFICACION'] ?>" class="eliminar boton">eliminar</a></td>
                <?php
            }
            ?>
        </tr>
        <?php
    }
    ?>
</table>