
function cargarLista(){
    var lista = $("#filtroProvincia");

    $.ajax({
            type: "get",
            url:"./provincias.php",
            success: function(respuestaServer)
            {
                alert(respuestaServer);
                var objRespuesta = JSON.parse(respuestaServer);
                
                objRespuesta.provincias.forEach(provincia => {
                    var opcion = document.createElement("option");
                    opcion.innerHTML = provincia.nombreProvincia;
                    lista.append(opcion);
                });
            }
        });
}

$(document).ready(function(){
    
    cargarLista();

    $("#btnDni").click(function(){
        $("#orden").val("dni");
    });
    $("#btnNombre").click(function(){
        $("#orden").val("nombre");
    });
    $("#btnApellido").click(function(){
        $("#orden").val("apellido");
    });
    $("#btnProvincia").click(function(){
        $("#orden").val("provincia");
    });
    $("#btnTelefono").click(function(){
        $("#orden").val("telefono");
    });
    $("#btnFecha").click(function(){
        $("#orden").val("fecha");
    });


    $("#cargar").click(function(){
        
        $("#tbDatos").empty();
        $("#tbDatos").html("<p>Esperando Respuesta...</p>");
        
        $.ajax({
            type: "get",
            url: "./clientes.php",
            data: {
                orden: $("#orden").val(),
                dni: $("#filtroDni").val(),
                nombre: $("#filtroNombre").val(), 
                apellido: $("#filtroApellido").val(),
                provincia: $("#filtroProvincia").val(),
                telefono: $("#filtroTelefono").val(),
                fecha: $("#filtroFecha").val() 
            },
            success: function(respuestaServer){
                alert(respuestaServer);
                $("#tbDatos").empty();
                var objJson = JSON.parse(respuestaServer);
                objJson.clientes.forEach(function(valor){
                    
                    var objTr = document.createElement("tr");
                    var tdDni = document.createElement("td");
                    var tdNombre = document.createElement("td");
                    var tdApellido = document.createElement("td");
                    var tdProvincia = document.createElement("td");
                    var tdTelefono = document.createElement("td");
                    var tdFecha = document.createElement("td");
                
                    tdDni.setAttribute("campo-dato", "dni");
                    tdDni.innerHTML = valor.dni;
                    objTr.appendChild(tdDni);

                    tdNombre.setAttribute("campo-dato", "nombre");
                    tdNombre.innerHTML = valor.nombre;
                    objTr.appendChild(tdNombre);

                    tdApellido.setAttribute("campo-dato", "apellido");
                    tdApellido.innerHTML = valor.apellido;
                    objTr.appendChild(tdApellido);

                    tdProvincia.setAttribute("campo-dato", "provincia");
                    tdProvincia.innerHTML = valor.provincia;
                    objTr.appendChild(tdProvincia);

                    tdTelefono.setAttribute("campo-dato", "telefono");
                    tdTelefono.innerHTML = valor.telefono;
                    objTr.appendChild(tdTelefono);

                    tdFecha.setAttribute("campo-dato", "fecha");
                    tdFecha.innerHTML = valor.fecha;
                    objTr.appendChild(tdFecha);
                    
                    $("#tbDatos").append(objTr); 
                });
                $('#footer').html("Nro de registros: " + objJson.cuenta);
            }   
        })
        $("#filtroDni").val("");
        $("#filtroNombre").val("");
        $("#filtroApellido").val("");
        $("#filtroProvincia").val("");
        $("#filtroTelefono").val("");
        $("#filtroFecha").val("");
    }); 
    $("#vaciar").click(function(){
        $("#tbDatos").empty();
    })
}); 
