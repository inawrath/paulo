<h1>Materiales</h1>

<table align="center" class="bordered">
    <tr> 
        <th>Nombre</th><th>Tipo</th><th>Resumen</th><th>Copias disponibles</th><th>Solicitar Prestamo</th>
    </tr>
    <?php
    while ($item = $listado->fetch()) {
        ?>
        <tr>
            <td><?= $item['nombre'] ?></td><td><?= $item['tipo'] ?></td><td><?= $item['resumen'] ?></td><td><?= $item['cantidad'] ?></td>
            <?php
            if ($item['cantidad'] != 0) {
                ?>
                <td><a href="<?php echo $item['id'] ?>" class="solicitarPrestamo boton">Solicitar Prestamo</a></td>
                <?php
            }
            ?>
        </tr>
        <?php
    }
    ?>
</table>