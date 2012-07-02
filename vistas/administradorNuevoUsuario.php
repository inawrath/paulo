<h1>Ingrese datos Usuario Nuevo</h1>
<table align="center"  class="tablaEntrada">
    <tr>
        <td>Rut:</td><td colspan="2"><input id="rutUsuario" /></td>
    </tr>
    <tr>
        <td>Contrase&ntilde;a:</td><td colspan="2"><input id="contrasenaUsuario" /></td>
    </tr>
    <tr>
        <td>Tipo:</td><td colspan="2"><select id="tipoUsuario"><option value="1">Usuario Normal</option><option value="2">Usuario Administrador</option></select></td>
    </tr>
    <tr>
        <td>Nombre:</td><td colspan="2"><input id="nombreUsuario" /></td>
    </tr>
    <tr>
        <td>A. Paterno:</td><td colspan="2"><input id="apellidoPaternoUsuario" /></td>
    </tr>
    <tr>
        <td>A. Materno:</td><td colspan="2"><input id="apellidoMaternoUsuario" /></td>
    </tr>
    <tr>
        <td>Direccion </td><td colspan="2"></td>
    </tr>
    <tr>
        <td>Calle:</td><td colspan="2"><input id="calleDireccionUsuario" /></td>
    </tr>
    <tr>
        <td>Numero:</td><td colspan="2"><input id="numeroDireccionUsuario" /></td>
    </tr>
    <tr>
        <td>Ciudad:</td><td colspan="2"><input id="ciudadDireccionUsuario" /></td>
    </tr>
    <tr>
        <td>Region:</td><td colspan="2">
            <select id="regionDireccionUsuario">
                <option value="15">Arica y Parinacota</option>
                <option value="1">Tarapac&aacute;</option>
                <option value="2">Antofagasta</option>
                <option value="3">Atacama</option>
                <option value="4">Coquimbo</option>
                <option value="5">Valpara&iacute;so</option>
                <option value="13">Region Metropolitana</option>
                <option value="6">O&apos;Higgins</option>
                <option value="7">Maule</option>
                <option value="8">Biob&iacute;o</option>
                <option value="9">Araucan&iacute;a</option>
                <option value="14">Los R&iacute;os</option>
                <option value="10">Los Lagos</option>
                <option value="11">Ays&eacute;n</option>
                <option value="12">Magallanes</option>
            </select></td>
    </tr>
    <tr>
        <td>Telefono:</td><td colspan="2"><input id="telefonoUsuario" maxlength="20"/></td>
    </tr>
    <tr>
        <td></td><td><button id="guardarNuevoUsuario" class="boton">Guardar Nuevo Usuario</button></td><td><button id="cancelarNuevoUsuario" class="boton">Cancelar</button></td>
    </tr>
</table>
