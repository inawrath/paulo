hola

<br/>
listado de usuarios:
<button id="agregarNuevoUsuario" class="boton">Agregar Nuevo Usuario</button>
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
        <?php echo $item['usu_id'] ?>
        <?php echo $item['usu_usuario'] ?>
        <?php echo $item['usu_tipo'] ?>
    </span>
    <?php
}
?>