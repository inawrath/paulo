<nav id="panelMenu" class="grid_4 yellow">
    hola2 panelMenu

    <?php
    if (isset($_SESSION['ACCESO']) && isset($_SESSION['userid']) && $_SESSION['userid'] != '0') {
        switch ($_SESSION['tipo']) {
            case 1:
                echo "menu usuario";
                ?>
    <button id="botonIngreso" class="boton">Ingresar</button>
    <button id="botonIngreso" class="boton">Ingresar</button>
                <?php
                break;
            case 2:
                echo "menu administrador";
                ?>
    <button id="administradorUsuarios" class="boton">Ingresar</button>
    <button id="administradorMateriales" class="boton">Ingresar</button>
                <?php
                break;
            default:
                break;
        }
    } else {
        $_SESSION['ACCESO'] = FALSE;
        ?>
        <div id="contenedorIngresoModal">
            <form method="post" action="">
                <table cellpadding="0" cellspacing="0" border="0" align="center">
                    <tr>
                        <td>Rut:</td>
                    </tr>
                    <tr>
                        <td><input type="text" name="usuarioIngresoModal" id="usuarioIngreso" /></td>
                    </tr>
                    <tr>
                        <td>Contrase&ntilde;a:</td>
                    </tr>
                    <tr>
                        <td><input type="password" name="contrasenaIngresModal" id="contrasenaIngreso" /></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right"><span class="cargando" id="cargandoIngreso"></span><button id="botonIngreso" class="boton">Ingresar</button></td>
                    </tr>
                </table>
            </form>
        </div>
        <div id="alertaIngreso">
        </div>
    </div>
    <?php
}
?>
</nav>
