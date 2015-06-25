/*-----------------------------------------------------
cuando la pagina esté completamente cargada
continuará con lo que está dentro del document ready
-----------------------------------------------------*/
$(document).ready(
/*-----------------------------------------------------
se llama al validador de usuarios y sus mensajes para 
así restringir la pagina.
-----------------------------------------------------*/
    function(){
        validaLogin();
            $("#mensajeModal").dialog({
                modal:true,
                autoOpen: false,
                buttons: {
                Ok: function() {
                  $( this ).dialog( "close" );
                }
            }
        });
    }
);
/*--------------------------------------------------------------------
Se llama una función del controlador 
para estimar si existe un usuario loggeado,
esto para restringir el acceso a la pagina 
en el caso de que no exista un usuario activo.
--------------------------------------------------------------------*/
function validaLogin(){
/*--------------------------------------------------------------------
mediante base_url se lláma por post a los metodos del controlador
--------------------------------------------------------------------*/
    $.post(
        base_url+"controlador/validaLogin",{},
            function(pagina,datos){
                $("#userConect").html(pagina,datos);
                $("#btnLogin").button().click(
                    function(){
                        login();
                    }
                );
                $("#btnSalir") .button().click(
                    function(){
                        salir();
                    }
                );
            }
    );
}
function login(){
/*--------------------------------------------------------
Por post se envian los datos ingresados por el usuario
al controlador, este a su vez llama un metodo alojado en
el modelo para validar los datos ingresados con los de
la base de datos
----------------------------------------------------------*/
    $.post(
        base_url+"controlador/login",
        {
            usuario:$("#usuario").val(),
            clave :$("#clave").val()
        },
        function(){
            validaLogin();
        }
    );
}
function salir(){
/*----------------------------------------------------------
Esta función llama a un metodo del controlador para eliminar
la sesión activa y eliminarla de las cookies
----------------------------------------------------------*/
    $.post(
        base_url+"controlador/matarCookie",
        {},
        function(){
            validaLogin();
        }
    );
}
/*----------------------------------------------------------
------------------------------------------------------------
function cargaRegistro(){

    $.post(
        base_url+"controlador/cargaRegistro",{},
        function(pagina,datos){
            $("#central").html(pagina,datos);
            $("#btnRegisto").button().click(
                function(){
                    cargarInforme();
                }
            );
        }
    )
}
function cargarInforme(){
    $.post(
        base_url+"controlador/cargarInforme",
        {
            nombre : $("#nombreN").val(),
            apellido : $("#apellidoN").val(),
            direccion : $("#direccionN").val(), 
            telefono : $("#telefonoN").val(),
            edad : $("#edadN").val()
        },
        function(datos){
            $("#mensajeModal").html("<p>"+datos.mensaje+"</p>");
            $("#mensajeModal").dialog("open");
            //alert(datos.mensaje);
           // $("#informe").html(pagina,datos);
        },'json'
    )
}
function verInforme(){
    $.post(
        base_url+"controlador/validaSession2",{},
        function(datos){
            if(datos.mensaje=='valido'){
                $.post(
                    base_url + "controlador/cargarRegistros",{},
                    function(pagina,datos){
                        $("#central").html(pagina,datos);
                    }
                );
                //$("#registro").hide("fast");
                //$("#informe").hide("slow");
            }
            else{               
                $("#central").html("<p>Usuario no Registrado</p>");      
            }
        },'json');
    
}
-----------------------------------------------------------------------
---------------------------------------------------------------------*/