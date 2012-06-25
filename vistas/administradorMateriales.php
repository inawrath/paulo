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
            <td><?= $item['nombre'] ?></td><td><?= $item['tipo'] ?></td><td><?= $item['resumen'] ?></td>
            <?php
            if ($item['borrado_logico'] == 0) {
                ?>
                <td colspan="2"><a href="<?php echo $item['id'] ?>" class="activar boton">Activar</a></td>
                <?php
            } else {
                ?>
                <td><a href="<?php echo $item['id'] ?>" class="editar boton">editar</a></td><td><a href="<?php echo $item['id'] ?>" class="eliminar boton">eliminar</a></td>
                <?php
            }
            ?>
        </tr>
        <?php
    }
    ?>
</table>