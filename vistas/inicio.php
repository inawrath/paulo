<h1>Listado de Materiales:</h1>

<table align="center" class="bordered">
    <tr> 
        <th>Nombre</th><th>Tipo</th><th>Resumen</th>
    </tr>
    <?php
    while ($item = $listado->fetch()) {
        ?>
        <tr>
            <td><?= $item['nombre'] ?></td><td><?= $item['tipo'] ?></td><td><?= $item['resumen'] ?></td>
        </tr>
        <?php
    }
    ?>
</table>