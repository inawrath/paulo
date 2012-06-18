<nav id="panelMenu" class="grid_4 yellow">
    <div id="contenedorMenu">
        <?php
        if (isset($_SESSION['ACCESO']) && isset($_SESSION['userid']) && $_SESSION['userid'] != '0') {
            switch ($_SESSION['tipo']) {
                case 1:
                    ?>
                    <button id="usuarioBuscaMaterial" class="boton w90">Buscar Material</button>
                    <button id="usuarioPrestamosActivos" class="boton w90">Prestamos Activos</button>
                    <?php
                    break;
                case 2:
                    ?>
                    <button id="administradorUsuarios" class="boton w90">Usuarios</button>
                    <button id="administradorMateriales" class="boton w90">Materiales</button>
                    <?php
                    break;
                default:
                    break;
            }
        } else {
            $_SESSION['ACCESO'] = FALSE;
            ?>
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
            <div id="alertaIngreso">
            </div>
            <?php
        }
        ?>
    </div>
</nav>
