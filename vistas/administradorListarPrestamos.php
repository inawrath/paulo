<h1>Listado de Materiales:</h1>
<br/>
<table align="center" class="bordered">
    <tr> 
        <th>Rut</th><th>Nombre Usuario</th><th>Materiales</th>
    </tr>
    <?php
    while ($item = $listado->fetch()) {
        ?>
        <tr>
            <td><?= $item[0] ?></td><td><?= $item[1] ?></td><td><?= $item[2] ?></td>
            <?php
            if ($item[3] == 0) {
                ?>
                <td colspan="2"><a href="<?php echo $item[4] ?>" class="activar boton">Activar</a></td>
                <?php
            } else {
                ?>
                <td><a href="<?php echo $item[4] ?>" class="editar boton">editar</a></td><td><a href="<?php echo $item[4] ?>" class="eliminar boton">eliminar</a></td>
                <?php
            }
            ?>
        </tr>
        <?php
    }
    ?>
</table>