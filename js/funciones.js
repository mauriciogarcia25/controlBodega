$(document).ready(
        function () {
            validarSesion();
            estadoUsuario();
        });
function usuario() {
    $.post(base_url + "controlador/usuario", {
        usuario: $("#inUsuario").val(),
        clave: $("#inClave").val()},
    function (datos) {
        mensajes(datos);
        validarSesion();
    }, 'json'
            );
}
function validarSesion() {
    $.post(base_url + "controlador/validarSesion", {},
            function (pagina, datos) {
                $("#inicio").html(pagina, datos);
                $("#btnLogin").click(
                        function () {
                            usuario();
                        });
            });
}
function salir() {
    $.post(base_url + "controlador/salir", {},
            function () {
                validarSesion();
            });
}
function infoProducto() {
    actualizaTabla();
}
function actualizaTabla() {
    $.post(base_url + "controlador/actualizaTabla", {},
            function (pagina, datos) {
                $("#cuerpo").html(pagina, datos);
            });
}
function infoProductoRetirados() {
    $.post(base_url + "controlador/infoProductoRetirados", {},
            function (pagina, datos) {
                $("#cuerpo").html(pagina, datos);
            });
}
function eliminar(codigo) {
    $.post(base_url + "controlador/eliminarProducto", {codigo: codigo},
    function () {
        alert("Articulo Eliminado Correctamente");
        actualizaTabla();
    }, 'json'
            );
}
function editar(codigo) {
    validaCodigoEd(codigo);
}
function addProductoAgregar() {
    $.post(base_url + "controlador/addProducto", {
        codigo: $("#addCodigo").val(),
        nombre: $("#addNombre").val(),
        descripcion: $("#addDescripcion").val(),
        marca: $("#addMarca").val(),
        modelo: $("#addModelo").val(),
        precio: $("#addPrecio").val(),
        stock: $("#addStock").val()
    }, function () {
        alert("Operación Realizada con Exito");
        actualizaTabla();
    }, 'json'
            );
}
function addProductoEditar() {
    $.post(base_url + "controlador/addProducto", {
        codigo: $("#edCodigo").val(),
        nombre: $("#edNombre").val(),
        descripcion: $("#edDescripcion").val(),
        marca: $("#edMarca").val(),
        modelo: $("#edModelo").val(),
        precio: $("#edPrecio").val(),
        stock: $("#edStock").val()
    }, function () {
        alert("Operación Realizada con Exito", "Ok");
        actualizaTabla();
    }, 'json'
            );
}
function validaCodigoAdd(codigo) {
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
function validaCodigoEd(codigo) {
    $.post(base_url + "controlador/validaCodigoProducto", {codigo: codigo},
    function (datos) {
        $("#edCodigo").val(datos.codigo);
        $("#edNombre").val(datos.nombre);
        $("#edDescripcion").val(datos.descripcion);
        $("#edMarca").val(datos.marca);
        $("#edModelo").val(datos.modelo);
        $("#edPrecio").val(datos.precio);
        $("#edStock").val(datos.stock);
        $("#edResponsable").val(datos.responsable);
        $("#edFecha").val(datos.fecha);
    }, 'json'
            );
}
function retirarProducto() {
    $.post(base_url + "controlador/retirarProducto", {},
            function (datos) {
                $("#retiro").html(datos);
            });
}
function estadoUsuario() {
    $.post(base_url + "controlador/estadoUsuario", {},
            function (pagina) {
                $("#forma").html(pagina);
                $("#btnSalir").click(
                        function () {
                            salir();
                        });
            }
    );
}
function addUser() {
    $.post(base_url + "controlador/addUser", {
        nombre: $("#inNombreUser").val(),
        apellido: $("#inApellidoUser").val(),
        direccion: $("#inDirecUser").val(),
        tipo: $("#inTipo").val(),
        usuario: $("#nikUser").val(),
        clave: $("#nClaveUser").val()
    }, function () {
        validarSesion();
    }, 'json'
            );
}
function editarUser(codigo) {
    $.post(base_url + "controlador/editarUser", {codigo: codigo},
    function (datos) {
        $("#inNombreUser").val(datos.nombre);
        $("#inApellidoUser").val(datos.apellido);
        $("#inDirecUser").val(datos.direccion);
        $("#nikUser").val(datos.usuario);
        $("#nClaveUser").val(datos.clave);
    }, 'json');
}
function eliminarUser(codigo) {
    $.post(base_url + "controlador/eliminarUser", {codigo: codigo},
    function () {
        listarUsuarios();

    }, 'json'
    );
}
function listarUsuarios() {
    $.post(base_url + "controlador/listarUsuarios", {},
            function (pagina, datos) {
                $("#cuerpo").html(pagina, datos);
            });
}
function retirar() {
    $.post(base_url + "controlador/retirar", {
        codigo: $("#inProducto").val(),
        motivo: $("#inMotivo").val()
    }, function () {
        infoProductoRetirados();
    });
}
function eliminarPR(codigo){
    $.post(base_url + "controlador/eliminarPR",{codigo: codigo},
        function(){
            infoProductoRetirados();
        });
}