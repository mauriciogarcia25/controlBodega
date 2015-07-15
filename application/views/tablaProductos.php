<?php if ($cantidad == 0): ?>
    <p>No Hay Productos almacenados!</p>
<?php else: ?>
    <h3>Tabla de Productos</h3>
    <table class="table" id="tablaProductos">
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Responsable</th>
        <th>Fecha</th>
        <?php
        $i = 0;
        foreach ($resultado as $fila):
            ?>
            <tr>
                <td><?php echo $fila->nombre ?></td>
                <td><?php echo $fila->descripcion ?></td>
                <td><?php echo $fila->marca ?></td>
                <td><?php echo $fila->modelo ?></td>
                <td><?php echo $fila->precio ?></td>
                <td><?php echo $fila->stock ?></td>
                <td><?php echo $fila->responsable ?></td>
                <td><?php echo $fila->fecha ?></td>
                <td>
                    <button id='editar<?php echo $i ?>' onclick='editar(<?php echo $fila->id_producto ?>)' class="btn btn-sm btn-default" data-toggle="modal" data-target="#editar"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar</button>
                </td>
                <td>
                    <button id='eliminar<?php echo $i ?>' onclick='eliminar(<?php echo $fila->id_producto ?>)' class="btn btn-sm btn-default"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
                </td>
            </tr>
            <?php
            $i++;
        endforeach;
        ?>
    </table>
<?php endif; ?>
<input type="hidden" id='oculto' value='<?php echo $i ?>'/>

<div class="modal fade" id="editar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title">Editar Productos</h4>
            </div>
            <div class="modal-body">
                <form class="form-signin">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Código</label>
                            <input  id="edCodigo" class="form-control" onblur="validaCodigoEd(this.value)" placeholder="Ej: 2345-4" />
                            <label>Nombre</label>
                            <input id="edNombre" class="form-control" placeholder="Ej: Alarma" autofocus/>
                            <label>Descripción</label>
                            <input id="edDescripcion" class="form-control" placeholder="Ej: Kit Alarma"/>
                            <label>Marca</label>
                            <input id="edMarca" class="form-control" placeholder="Ej: AlarmKits"/>
                            <label>Modelo</label>
                            <input id="edModelo" class="form-control" placeholder="Ej: ESM-780"/> 
                        </div>
                        <div class="col-md-4">
                            <label>Precio</label>
                            <input id="edPrecio" class="form-control" placeholder="Ej: 20500"/>
                            <label>Stock</label>
                            <input id="edStock" class="form-control" placeholder="Ej: 3" />
                            <label>responsable</label>
                            <input id="edResponsable" class="form-control" disabled="true" value="<?php echo $this->session->userdata('nombre') ?>"/>
                            <label>fecha</label>
                            <input id="edFecha" class="form-control" disabled="true"/>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="btnEditar" data-dismiss="modal" onclick="addProductoEditar()"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Editar</button>
                <button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cerrar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->