<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Autovip</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>jquery/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/estilos.css">
        <script type="text/javascript" src="<?php echo base_url() ?>jquery/jquery.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>jquery/jquery-ui.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>js/funciones.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
        <script type="text/javascript">var base_url = '<?php echo base_url() ?>index.php/';</script>
    </head>
    <body>
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" 
                            data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url() ?>"><img src="fonts/autovip.png" id="logo"></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                    </ul>
                    <ul>
                        <form class="navbar-form navbar-right" id="forma"></form>
                    </ul>
                </div>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
    <div class="container">
        <div id="inicio"></div>
        <div id="mensajes"></div>
        <div id="addProductoModal" title="Agregar Producto"></div>
    </div>
</body>
</html>