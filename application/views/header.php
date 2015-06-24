<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
            <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>estilos/bootstrap.css">
            <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>estilos/bootstrap.min.css">
            <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>estilos/signin.css">
            <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/login.css">
            <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>estilos/jumbotron.css">
            <script type="text/javascript" src="<?php echo base_url()?>javascript/jquery.js"></script>
            <script type="text/javascript" src="<?php echo base_url()?>javascript/jquery-ui.js"></script>
            <script type="text/javascript" src="<?php echo base_url()?>javascript/funciones.js"></script>
            <script type="text/javascript">
                var base_url ='<?php echo base_url()?>index.php/';
            </script>
    </head>
    <body>
        <div id="web" class="container"><!--Container full web -->
            <div id="header"><!--star header-->
                <nav class="navbar navbar-inverse navbar-fixed-top"><!--star bar-static-->
                    <div class="container"><!--Conteniner bar-->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar" href="<?php echo base_url()?>"></span>
                                <span class="icon-bar" onclick="registro()"></span>
                                <span class="icon-bar" onclick="verInforme()"></span>
                            </button> 
                            <a class="navbar-brand" href="<?php echo base_url()?>">AutoVip</a>
                        </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <form class="navbar-form navbar-right">
                            <a href="<?php echo base_url()?>"   type="submit" id="btnInicio"    class="btn btn-success btn-sm">Inicio</a>
                            <a href="#" onclick="registro()"    type="submit" id="btnRegistro"  class="btn btn-success btn-sm">Registro</a>
                            <a href="#" onclick="verInforme()"  type="submit" id="btnInforme"   class="btn btn-success btn-sm">Informe</a>
                        </form>
                    </div><!--/.navbar-collapse -->
                    </div><!--end Conteniner bar-->
                </nav><!--end bar-static-->
            </div><!--end header-->
        <div id="mensajeModal" title="Mensaje"><!-- star mensaje-->
        </div>
        <div id="userConect"><!-- star user conect-->
        </div>
        <div id="central"><!-- end conect-->