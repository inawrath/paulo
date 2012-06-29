<h1>Listado de Prestamos:</h1>
<br/>
<table align="center" class="bordered">
    <tr> 
        <th>Rut</th><th>Nombre Usuario</th><th>Materiales</th>
    </tr>
    <?php
    for ($i = 0; $i < $listado['cantidad']; $i++) {
        ?>
        <tr><td><?= $listado[$i]['rut'] ?></td><td><?= $listado[$i]['nombre'] ?></td><td><?php
    for ($j = 0; $j < $listado[$i]['cantidad']; $j++) {
        if ($j != 0)
            echo ', ';
        echo $listado[$i][$j][0] . '(' . $listado[$i][$j][1] . ')';
    }
        ?></td></tr><?php }
    ?>
</table>