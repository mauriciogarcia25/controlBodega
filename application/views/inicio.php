<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Bodega AutoVip</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>jquery/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/navbar-fixed-top.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/hojaEstilos.css">
        <script type="text/javascript" src="<?php echo base_url() ?>jquery/jquery.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>jquery/jquery-ui.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>js/funciones.js"></script>
        <script type="text/javascript">var base_url = '<?php echo base_url() ?>index.php/';</script>
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" 
                            data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    </button>
                    <a class="navbar-brand" href="#">Control Bodega Autovip</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?php echo base_url() ?>">inicio</a></li>
                    </ul>
                    <ul id="infoUser"></ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
        <div class="container">
            <h1>Bodega Autovip</h1>
            <br>
            <div class="jumbotron">
                <div class="row">
                    <div class="col-md-2">
                        <br>
                        <br>
                        <button onclick="agregarProducto()" class="btn btn-sm btn-primary btn-block">Agregar Producto</button>
                        <button onclick="retirarProducto()" class="btn btn-sm btn-danger btn-block">Retirar Producto</button>
                        <button onclick="infoProducto()" class="btn btn-sm btn-success btn-block">Listado de Productos</button>
                        <br>
                        <br>
                    </div>
                    <div class="col-md-6">
                        <div id="cuerpo"></div>
                        <div id="mensajes"></div>
                    </div>
                </div>
            </div>
            <div id="addProductoModal" title="Agregar Producto"></div>
        </div>
    </body>
</html>
