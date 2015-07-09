<?php if ($cantidad == 0): ?>
    <p>No Hay Productos almacenados!</p>
<?php else: ?>
    <h3>Tabla de Productos</h3>
    <table class="table" id="tablaProductos">
        <th>Código</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Precio</th>
        <td>motivo</td>
        <th>Responsable</th>
        <th>Fecha</th>
        <?php $i = 0;
        foreach ($resultado as $fila): ?>
            <tr>
                <td><?php echo $fila->id_producto ?></td>
                <td><?php echo $fila->nombre ?></td>
                <td><?php echo $fila->descripcion ?></td>
                <td><?php echo $fila->marca ?></td>
                <td><?php echo $fila->modelo ?></td>
                <td><?php echo $fila->precio ?></td>
                <td><?php echo $fila->motivo ?></td>
                <td><?php echo $fila->responsable ?></td>
                <td><?php echo $fila->fecha ?></td>
                <td>
                    <button id='eliminarR<?php echo $i ?>' onclick='eliminar(<?php echo $fila->id_producto ?>)'>Eliminar</button>
                </td>
            </tr>
        <?php $i++;
    endforeach; ?>
    </table>
<?php endif; ?>
<input type="hidden" id='ocultoR' value='<?php echo $i ?>'/>