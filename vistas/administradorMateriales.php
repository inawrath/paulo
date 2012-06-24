<br/>
listado de Materiales:
<br/>
<button id="agregarNuevoMaterial" class="boton">Agregar Nuevo Material</button>

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
        <a href="<?php echo $item['id'] ?>" class="editar boton">editar</a>
        <a href="<?php echo $item['id'] ?>" class="eliminar boton">eliminar</a>
    </span>
    <?php
}
?>