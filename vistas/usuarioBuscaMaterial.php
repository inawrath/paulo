<h1>Materiales</h1>

<table align="center" class="bordered">
    <tr> 
        <th>Nombre</th><th>Tipo</th><th>Resumen</th><th>Copias disponibles</th><th>Solicitar Prestamo</th>
    </tr>
    <?php
    while ($item = $listado->fetch()) {
        ?>
        <tr>
            <td><?= $item[0] ?></td><td><?= $item[1] ?></td><td><?= $item[2] ?></td><td><?= $item[5] ?></td>
            <?php
            if ($item[5] != 0) {
                ?>
                <td><a href="<?php echo $item[3] ?>" class="solicitarPrestamo boton">Solicitar Prestamo</a></td>
                <?php
            }
            ?>
        </tr>
        <?php
    }
    ?>
</table>