<br>
<div class="row">
    <div class="col-md-2">
        <button class="btn btn-sm btn-success btn-block" 
                data-toggle="modal" data-target="#agregar">
            <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> 
            Agregar un Producto</button>
    </div>
    <div class="col-md-2">
        <button onclick="actualizaTabla()" 
                class="btn btn-sm btn-success btn-block">
            <span class="glyphicon glyphicon-list" aria-hidden="true"></span> 
            Lista de Productos</button>
    </div>
    <div class="col-md-2">
        <button onclick="retirarProducto()"
                class="btn btn-sm btn-primary btn-block" 
                data-toggle="modal" data-target="#retirar">
            <span class="glyphicon glyphicon-minus-sign" aria-hidden="true"></span> 
            Retirar un Producto</button>
    </div>
    <div class="col-md-2">
        <button onclick="infoProductoRetirados()" 
                class="btn btn-sm btn-primary btn-block">
            <span class="glyphicon glyphicon-list" aria-hidden="true"></span> 
            Productos Retirados</button>
    </div>
    <div class="col-md-2">
        <button class="btn btn-sm btn-warning btn-block" 
                data-toggle="modal" data-target="#agregaUser">
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span> 
            Agregar un Usuario</button>
    </div>
    <div class="col-md-2">
        <button onclick="listarUsuarios()" 
                class="btn btn-sm btn-warning btn-block">
            <span class="glyphicon glyphicon-list" aria-hidden="true"></span> 
            Lista de Usuarios</button>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div id="cuerpo" class="jumbotron"></div>
    </div>
</div>

<div class="modal fade" id="agregar">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h5 class="modal-title">Agregar Producto</h5>
            </div>
            <div class="modal-body">
                <label>Código</label>
                <input  id="addCodigo" class="form-control" onblur="validaCodigoAdd(this.value)" placeholder="Ej: 2345-4" maxlength="20" autofocus required/>
                <label>Nombre</label>
                <input id="addNombre" class="form-control" placeholder="Ej: Alarma" required maxlength="20" />
                <label>Descripción</label>
                <input id="addDescripcion" class="form-control" placeholder="Ej: Kit Alarma" maxlength="20" required/>
                <label>Marca</label>
                <input id="addMarca" class="form-control" placeholder="Ej: AlarmKits" maxlength="20" required/>
                <label>Modelo</label>
                <input id="addModelo" class="form-control" placeholder="Ej: ESM-780" maxlength="20" required/>
                <label>Precio</label>
                <input id="addPrecio" class="form-control" placeholder="Ej: 20500" maxlength="20" onKeyPress="return soloNumeros(event)" required/>
                <label>Cantidad</label>
                <input id="addStock" class="form-control" placeholder="Ej: 3" maxlength="20" onKeyPress="return soloNumeros(event)" required/>
                <div id="mensajeAgregar"></div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="btnAgregar" onclick="addProductoAgregar()"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Agregar</button>
                <button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cerrar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="agregaUser">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h5 class="modal-title">Agregar Usuario Nuevo</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <label>nombre</label>
                        <input  id="inNombreUser" class="form-control" placeholder="Ej: Roberto" autofocus maxlength="20" required/>
                        <label>Apellido</label>
                        <input id="inApellidoUser" class="form-control" placeholder="Ej: Nahuel" maxlength="20" required/>
                        <label>Dirección</label>
                        <input id="inDirecUser" class="form-control" placeholder="Ej: Pje 8 #230 SanClemente, Talca" maxlength="30" required/>
                    </div>
                    <div class="col-md-6">
                        <label>Tipo de Usuario</label>
                        <select class="dropdown-header" id="inTipo">
                            <option value="1">Administrador</option>
                            <option value="2">Asistente</option>
                        </select>
                        <br>
                        <label>Id del Usurio</label>
                        <input id="nikUser" class="form-control" placeholder="Ej: RoNahuel" maxlength="20" required/>
                        <label>Clave de Usuario</label>
                        <input id="nClaveUser" class="form-control" type="password" placeholder="Ej: go.23.7" maxlength="20" required/>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="addUser()"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Agregar Usuario</button>
                <button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cerrar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="retirar">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h5 class="modal-title">Retirar Producto</h5>
            </div>
            <div class="modal-body">
                <div id="retiro">

                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="btnRetirar"  type="submit" onclick="retirar()"><span class="glyphicon glyphicon-circle-arrow-up" aria-hidden="true"></span> Retirar</button>
                <button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cerrar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->