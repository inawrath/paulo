<header id="panelSuperior" class="grid_20 green">
    <?php
    if ($_SESSION['tipo'] == 1 || $_SESSION['tipo'] == 2) {
        ?>
        <span>Bienvenido <?= $_SESSION['username']; ?>  <button id="salir" class="boton">Salir</button></span>
        <?php
    }
    ?>
</header>
<div class="clear"></div>