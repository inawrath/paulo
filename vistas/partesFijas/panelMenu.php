<nav id="panelMenu" class="grid_4 yellow">
    hola2 panelMenu

    <?php
    if (isset($_SESSION['username']) && isset($_SESSION['userid']) && $_SESSION['username'] != '' && $_SESSION['userid'] != '0') {
        
    } else {
        $_SESSION['ACCESO'] = FALSE;
        /* boton que abre la ventana login-modal que contiene el ingreso/registro sesion */
        ?>
        <div id="contenedorIngresoModal">
            <form method="post" action="">
                <table cellpadding="0" cellspacing="0" border="0" align="center">
                    <tr>
                        <td>Rut:</td>
                    </tr>
                    <tr>
                        <td><input type="text" name="usuarioIngresoModal" id="usuarioIngresoModal" /></td>
                    </tr>
                    <tr>
                        <td>Contrase&ntilde;a:</td>
                    </tr>
                    <tr>
                        <td><input type="password" name="contrasenaIngresModal" id="contrasenaIngresoModal" /></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right"><span class="cargando" id="cargando"></span><button id="botonIngresoModal" class="boton">Ingresar</button></td>
                    </tr>
                </table>
            </form>
        </div>
        <div id="alertasUsuario">
        </div>
    </div>
    <?php
}
?>
</nav>
