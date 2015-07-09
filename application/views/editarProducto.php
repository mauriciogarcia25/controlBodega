<div class="form-control-static">
    <table class="table-condensed">
        <tr>
            <td>Código</td>
            <td>: <input  id="addCodigo" onblur="validaCodigoProducto(this.value)" placeholder="Ej: 2345-4" autofocus/></td>
        </tr>
        <tr>
            <td>Nombre</td>
            <td>: <input id="addNombre" placeholder="Ej: Alarma" required/></td>
        </tr>
        <tr>
            <td>Descripción</td>
            <td>: <input id="addDescripcion" placeholder="Ej: Kit Alarma"/></td>
        </tr>
        <tr>
            <td>Marca</td>
            <td>: <input id="addMarca" placeholder="Ej: AlarmKits"/></td>
        </tr>
        <tr>
            <td>Modelo</td>
            <td>: <input id="addModelo" placeholder="Ej: ESM-780"/></td>
        </tr>
        <tr>
            <td>Precio</td>
            <td>: <input id="addPrecio" placeholder="Ej: 20500"/></td>
        </tr>
        <tr>
            <td>Stock</td>
            <td>: <input id="addStock" placeholder="Ej: 3" disabled="true"/></td>
        </tr>
        <tr>
            <td>responsable</td>
            <td>: <input id="addResponsable" disabled="true" value="<?php echo $this->session->userdata('nombre')?>" /></td>
        </tr>
        <tr>
            <td>fecha</td>
            <td>: <input id="addFecha" disabled="true" /></td>
        </tr>
    </table>
</div>