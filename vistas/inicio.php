inicio

<br/>
listado de Materiales:

<?php
// $listado es una variable asignada desde pruebaControlador $data['listado'] 
// la cual se le pasa a base vistas la cual hace la conversion a $listado
for ($index = 0; $index < 3; $index++) {
    echo '<br/>';
}
while ($item = $listado->fetch()) {
    ?>
    <br/>
    <span>
        <?php echo $item['nombre'] ?>
        <?php echo $item['tipo'] ?>
        <?php echo $item['autor'] ?>
    </span>
    <?php
}
?>
