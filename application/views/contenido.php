<div id="activo">
    <form class="form-signin-heading">
        <p>Bienvenido : <?php echo $nombre ?></p>
        <button class="btn btn-danger btn-sm btn-block" id="btnSalir">Salir</button>
    </form>
</div>
<br>
<div class="jumbotron">
    <div class="row">
        <h2>Bodega AutoVip</h2>
        <div class="col-md-2">
            <br>
            <button onclick="agregarProducto()" class="btn btn-sm btn-success btn-block">Agregar Producto</button>
            <button onclick="retirarProducto()" class="btn btn-sm btn-danger btn-block">Retirar Producto</button>
            <button onclick="infoProducto()" class="btn btn-sm btn-primary btn-block">Productos</button>
            <button onclick="infoProductoRetirados()" class="btn btn-sm btn-primary btn-block">Productos Retirados</button>
            <br>
            <br>
        </div>

        <div class="col-md-10">
            <div id="cuerpo"></div>
        </div>
    </div>
</div>