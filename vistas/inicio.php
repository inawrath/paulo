<h1>Listado de Materiales:</h1>

<table align="center">
    <tr> 
        <th>Nombre</th><th>Tipo</th><th>Resumen</th>
    </tr>
    <?php
    while ($item = $listado->fetch()) {
        ?>
        <tr>
            <td><?= $item[0] ?></td><td><?= $item[1] ?></td><td><?= $item[2] ?></td>
        </tr>
        <?php
    }
    ?>
</table>

