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
        <th>precio</th>
        <th>stock</th>
        <?php $i = 0;
        foreach ($resultado as $fila): ?>
            <tr>
                <td><?php echo $fila->codigo ?></td>
                <td><?php echo $fila->nombre ?></td>
                <td><?php echo $fila->descripcion ?></td>
                <td><?php echo $fila->marca ?></td>
                <td><?php echo $fila->modelo ?></td>
                <td><?php echo $fila->precio ?></td>
                <td><?php echo $fila->stock ?></td>
                <td>
                    <button id='editar<?php echo $i ?>' onclick='editar(<?php echo $fila->codigo ?>)'>Editar</button>
                </td>
                <td>
                    <button id='eliminar<?php echo $i ?>' onclick='eliminar(<?php echo $fila->codigo ?>)'>Eliminar</button>
                </td>
            </tr>
        <?php $i++;
    endforeach; ?>
    </table>
<?php endif; ?>
<input type="hidden" id='oculto' value='<?php echo $i ?>'/>