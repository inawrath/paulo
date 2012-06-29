<h1>Materiales</h1>

<table align="center" class="bordered">
    <tr> 
        <th>Nombre</th><th>Tipo</th><th>Resumen</th><th>Copias disponibles</th><th>Solicitar Prestamo</th>
    </tr>
    <?php
    while ($item = $listado->fetch()) {
        ?>
        <tr>
            <td><?= $item['DESCRIPCION.NOMBRE'] ?></td><td><?= $item['DESCRIPCION.TIPO'] ?></td><td><?= $item['DESCRIPCION.RESUMEN'] ?></td><td><?= $item['CANTIDAD'] ?></td>
            <?php
            if ($item['CANTIDAD'] != 0) {
                ?>
                <td><a href="<?php echo $item['CLASIFICACION'] ?>" class="solicitarPrestamo boton">Solicitar Prestamo</a></td>
                <?php
            }
            ?>
        </tr>
        <?php
    }
    ?>
</table>