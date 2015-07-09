$(document).ready(
        function () {
            validarSesion();
            $("#addProductoModal").dialog({
                modal: true, autoOpen: false, width: 460,
                buttons: {
                    "Guardar": function () {
                        $(this).dialog("close");
                        if (parseInt($("#addPrecio").val()) <= 0 || parseInt($("#addStock").val()) <= 0) {
                            mensajes("Precio o Stock no validos <br> Producto no almacenado!", "Error");
                        } else {
                            addProducto();
                        }
                    }
                }
            });
        });
//loggeo de usuarios--------------------------------
function usuario() {
    $.post(base_url + "controlador/usuario", {
        usuario: $("#inUsuario").val(),
        clave: $("#inClave").val()},
    function () {
        validarSesion();
    });
}
function validarSesion() {
    $.post(base_url + "controlador/validarSesion", {},
            function (pagina, datos) {
                $("#inicio").html(pagina, datos);
                $("#btnLogin").click(
                        function () {
                            usuario();
                        });
                $("#btnSalir").click(
                        function () {
                            salir();
                        });
            });
}
function salir() {
    $.post(base_url + "controlador/salir", {},
            function () {
                validarSesion();
            });
}
//tablas productos existentes-----------------------
function infoProducto() {
    actualizaTabla();
}
function actualizaTabla() {
    $.post(base_url + "controlador/actualizaTabla", {},
            function (pagina, datos) {
                $("#cuerpo").html(pagina, datos);
                designaBotones();
            });
}
function designaBotones() {
    for (i = 0; i < parseInt($("#oculto").val()); i++) {
        $("#editar" + i).button({
            icons: {primary: "ui-icon-pencil"},
            text: false
        }).tooltip({
            position: {
                my: "left top",
                at: "right+5 top-2"
            }
        });
        $("#eliminar" + i).button({
            icons: {primary: "ui-icon-trash"},
            text: false
        }).tooltip({
            position: {
                my: "left top",
                at: "right+5 top-2"
            }
        });
    }
}
function eliminar(codigo) {
    $.post(base_url + "controlador/eliminarProducto", {codigo: codigo},
    function () {
        mensajes("Articulo Eliminado Correctamente", "Error");
        actualizaTabla();
    }
    );
}
function editar(codigo) {
    $.post(base_url + "controlador/agregarProducto", {},
            function (pagina, datos) {
                $("#addProductoModal").html(pagina, datos);
                validaCodigoProducto(codigo);
                $("#addProductoModal").dialog({title: "Editar Producto"});
                $("#addProductoModal").dialog("open");
            }
    );
}
//mensajes------------------------------------------
function mensajes(msj, tipo) {
    $("#mensajes").hide();
    $("#mensajes").html("<p class='msj" + tipo + "'>" + msj + "</p>");
    $("#mensajes").fadeIn(200).delay(700).fadeOut(2000);
}
//Agregar Productos---------------------------------
function agregarProducto() {
    $.post(base_url + "controlador/agregarProducto", {},
            function (pagina, datos) {
                $("#addProductoModal").html(pagina, datos);
                $("#addProductoModal").dialog({title: "Agregar Producto"});
                $("#addProductoModal").dialog("open");
            }
    );
}
function addProducto() {
    $.post(base_url + "controlador/addProducto", {
        codigo: $("#addCodigo").val(),
        nombre: $("#addNombre").val(),
        descripcion: $("#addDescripcion").val(),
        marca: $("#addMarca").val(),
        modelo: $("#addModelo").val(),
        precio: $("#addPrecio").val(),
        stock: $("#addStock").val()
    }, function () {
        mensajes("Operación Realizada con Exito", "Ok");
        actualizaTabla();
    }
    );
}
function validaCodigoProducto(codigo) {
    $.post(base_url + "controlador/validaCodigoProducto", {codigo: codigo},
    function (datos) {
        $("#addCodigo").val(datos.codigo);
        $("#addNombre").val(datos.nombre);
        $("#addDescripcion").val(datos.descripcion);
        $("#addMarca").val(datos.marca);
        $("#addModelo").val(datos.modelo);
        $("#addPrecio").val(datos.precio);
        $("#addStock").val(datos.stock);
        $("#addResponsable").val(datos.responsable);
        $("#addFecha").val(datos.fecha);
    }, 'json'
            );
}
//retirar productos
function retirarProducto() {
    $.post(base_url + "controlador/retirarProducto", {},
            function (pagina, datos) {
                $("#cuerpo").html(pagina, datos);
            });
}