<br/>
listado de usuarios:
<br/>
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
        <?php echo $item['rut'] ?>
        <?php echo $item['nombre'] ?>
        <?php echo $item['tipo'] ?>
        <a href="<?php echo $item['rut'] ?>" class="editar boton">editar</a>
        <a href="<?php echo $item['rut'] ?>" class="eliminar boton">eliminar</a>
    </span>
    <?php
}
?>