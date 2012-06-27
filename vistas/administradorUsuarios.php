<h1>Listado de Usuarios:</h1>

<button id="agregarNuevoUsuario" class="boton">Agregar Nuevo Usuario</button>
<br/>
<br/>
<table align="center" class="bordered">
    <tr> 
        <th>Rut</th><th>Nombre</th><th>Tipo</th><th>Editar</th><th>Eliminar</th>
    </tr>
    <?php
    while ($item = $listado->fetch()) {
        ?>
        <tr>
            <td><?= $item['RUT'] ?></td><td><?= $item['NOMBRE'] ?></td><td><? if($item['TIPO'] == '2'){ echo 'Administrador'; }else{ echo 'Usuario'; } ?></td>
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