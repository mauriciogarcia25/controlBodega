<label>Codigo</label>
<input  id="inCodigoProductoRetiro" class="form-control" onblur="validaCodigoRetiro(this.value)" placeholder="Ej: 2345-4" maxlength="20" autofocus required/>
<label>Nombre</label>
<input id="inNombreProductoRetiro" class="form-control" placeholder="Ej: Alarma" required maxlength="20" disabled="true"/>
<label>Cantidad</label>
<input id="inCantRetiro" class="form-control" placeholder="Ej: 3" maxlength="20" onKeyPress="return soloNumeros(event)" required/>
<label>N° Boleta</label>
<input type="text" id="inMotivo" class="form-control" placeholder="Ej:N° 456777" required maxlength="20" required>