<?php if ($cantidad == 0): ?>
    <p>No Hay Productos almacenados!</p>
<?php else: ?>
    <h3>Tabla de Productos</h3>
    <table class="table" id="tablaProductos">
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Dirección</th>
        <th>Tipo</th>
        <th>Nick Usuario</th>
        <?php
        $i = 0;
        foreach ($resultado as $fila):
            ?>
            <tr>
                <td><?php echo $fila->nombre ?></td>
                <td><?php echo $fila->apellido ?></td>
                <td><?php echo $fila->direccion ?></td>
                <td><?php echo $fila->tipo ?></td>
                <td><?php echo $fila->usuario ?></td>
                <td>
                    <button id='editar<?php echo $i ?>' 
                            onclick='editarUser(<?php echo $fila->id_usuario ?>)' 
                            class="btn btn-sm btn-default" 
                            data-toggle="modal" 
                            data-target="#editarUser">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true">
                        </span> Editar</button>
                </td>
                <td>
                    <button id='eliminar<?php echo $i ?>' 
                            onclick='eliminarUser(<?php echo $fila->id_usuario ?>)' 
                            class="btn btn-sm btn-default">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true">
                        </span></button>
                </td>
            </tr>
            <?php
            $i++;
        endforeach;
        ?>
    </table>
<?php endif; ?>
<input type="hidden" id='oculto' value='<?php echo $i ?>'/>

<div class="modal fade" id="editarUser">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h5 class="modal-title">Editar Usuario</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <form class="form-signin">
                            <label>nombre</label>
                            <input  id="inNombreUser" class="form-control" placeholder="Ej: Roberto" autofocus/>
                            <label>Apellido</label>
                            <input id="inApellidoUser" class="form-control" placeholder="Ej: Nahuel" />
                            <label>Dirección</label>
                            <input id="inDirecUser" class="form-control" placeholder="Ej: Pje 8 #230 SanClemente, Talca"/>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <form class="form-signin">
                            <label>Tipo de Usuario</label>
                            <select class="dropdown-header" id="inTipo">
                                <option value="1">Administrador</option>
                                <option value="2">Asistente</option>
                            </select>
                            <br>
                            <label>Id del Usurio</label>
                            <input id="nikUser" class="form-control" placeholder="Ej: RoNahuel"/>
                            <label>Clave de Usuario</label>
                            <input id="nClaveUser" class="form-control" type="password" placeholder="Ej: go.23.7"/>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-dismiss="modal" onclick="addUser()"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Agregar Usuario</button>
                <button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cerrar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

