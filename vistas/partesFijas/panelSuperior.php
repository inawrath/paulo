<header id="panelSuperior" class="grid_20 green">
    hola panel superior
    <?php
    if ($_SESSION['tipo'] == 1 || $_SESSION['tipo'] == 2) {
        ?>
        <button id="salir" class="boton">Salir</button>
        <?php
    }
    ?>
</header>
<div class="clear"></div>