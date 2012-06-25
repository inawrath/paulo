<h1>Listado de Usuarios:</h1>

<button id="agregarNuevoUsuario" class="boton">Agregar Nuevo Usuario</button>
<br/>
<br/>
<table align="center">
    <tr> 
        <th>Rut</th><th>Nombre</th><th>Tipo</th><th>Editar</th><th>Eliminar</th>
    </tr>
    <?php
    while ($item = $listado->fetch()) {
        ?>
        <tr>
            <td><?= $item['rut'] ?></td><td><?= $item['nombre'] ?></td><td><?= $item['tipo'] ?></td>
            <?php
            if ($item['borrado_logico'] == 0) {
                ?>
                <td colspan="2"><a href="<?php echo $item['rut'] ?>" class="activar boton">Activar</a></td>
                <?php
            } else {
                ?>
                <td><a href="<?php echo $item['rut'] ?>" class="editar boton">editar</a></td><td><a href="<?php echo $item['rut'] ?>" class="eliminar boton">eliminar</a></td>
                <?php
            }
            ?>
        </tr>
        <?php
    }
    ?>
</table>