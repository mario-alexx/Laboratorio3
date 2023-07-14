function cargaDesplegable(){

    var desplegable = $("#filtroProvincia");
    var desplegableModif = $("#provinciaModif");
    var desplegableAlta = $("#provinciaAlta");

    $.ajax({
        type:"get",
        url:"provincias.php",
        success: function(respuestaServer){
            alert(respuestaServer);
            var objRespuesta = JSON.parse(respuestaServer);
            
            objRespuesta.provincias.forEach(provincia => {
                var opcion = document.createElement("option");
                var opcionModif = document.createElement("option");
                var opcionAlta = document.createElement("option");

                opcion.innerHTML = provincia.nombreProvincia;
                opcionModif.innerHTML = provincia.nombreProvincia;
                opcionAlta.innerHTML = provincia.nombreProvincia;

                desplegable.append(opcion);
                desplegableModif.append(opcionModif);
                desplegableAlta.append(opcionAlta);
            });
        }
    });
}

function cargaModif(dni){
    $.ajax({
        type: "get",
        url: "salidaJsonCliente.php",
        data:{ dni : dni},
        success: function(respuestaServer,estado){
            objetoDato = JSON.parse(respuestaServer);
            $("#dniModif").val(objetoDato.dni);
            $("#nombreModif").val(objetoDato.nombre);
            $("apellidoModif").val(objetoDato.apellido);
            $("#provinciaModif").val(objetoDato.provincia);
            $("#telefonoModif").val(objetoDato.telefono);
            $("#fechaModif").val(objetoDato.fecha);
        }
    });
}

function modificar(){
    var data = new FormData($("#formModalModif")[0]);
    $.ajax({
        type:"post",
        method:"post",
        enctype:"multipart/form-data",
        url:"modi.php",
        processData:false,
        contentType:false,
        cache:false,
        data:data,
        success: function(respuesta){
            alert(respuestaServer);
            $("#respuestaModal").css("visibility","visible");
            $("#respuesta").text(respuesta);
        }
    });
}   

function cargaPDF(dni){
    $.ajax({
        type:"get",
        url:"archivo.php",
        data:{dni: dni},
        success: function(respuestaServer){
            $("#respuesta").empty();
            var objetoDato = JSON.parse(respuestaServer);
            $("#respuestaModal").css("visibility","visible");
            $("#respuesta").html("<iframe width='500px' height='500px' src='data:application/pdf;base64," + objetoDato.documentoPDF + "'></iframe>");
        }
    });
}

function alta(){
    var data = new FormData($("#formModalAlta")[0]);
    $.ajax({
        type:"post",
        method:"post",
        enctype:"multipart/form-data",
        url:"alta.php",
        processData:false,
        contentType:false,
        cache:false,
        data: data,
        success: function(respuesta){
            $("#respuestaModal").css("visibility","visible");
            $("#respuesta").text(respuesta);
            vaciarAlta();
        }
    });
}

function baja(dni){ 
    $.ajax({
        type:"post",
        url:"baja.php",
        data:{dni:dni},  
        success: function(respuesta){
            document.getElementById("respuestaModal").className="modalON";
            document.getElementById("respuesta").innerHTML = respuesta;
            $("#respuestaModal").css("visibility","visible");
            $("#respuesta").text(respuesta);
        }
    });
}

function vaciarAlta(){
    $("#dniAlta").val("");
    $("#nombreAlta").val("");
    $("#apellidoAlta").val("");
    $("#provinciaAlta").val("");
    $("#telefonoAlta").val("");
    $("#fechaAlta").val("");
    $("#pdfAlta").val("");
}

function validarModif(){
    if(document.getElementById("formModalModif").checkValidity()==true){
        $("#enviarModif").attr("disabled",false);
    }
    else{
        $("#enviarModif").attr("disabled",true);
    }
}

function validarAlta(){
    if(document.getElementById("formModalAlta").checkValidity()==true){
        $("#enviarAlta").attr("disabled",false);
    }
    else{
        $("#enviarAlta").attr("disabled",true);
    }
}

function cargarDatos(){
    $.ajax({
        type:"get",
        url:"clientes.php",
        data:{
            orden: $("#orden").val(),
            dni: $("#filtroDni").val(),
            nombre: $("#filtroNombre").val(), 
            apellido: $("#filtroApellido").val(),
            provincia: $("#filtroProvincia").val(),
            telefono: $("#filtroTelefono").val(),
            fecha: $("#filtroFecha").val(),
        },
        success: function(respuestaServer){
            alert(respuestaServer);
            $("#tbDatos").empty();
            var objJson = JSON.parse(respuestaServer);
            objJson.clientes.forEach(function(valor,indice){

                var objTr = document.createElement("tr");
                var tdDni = document.createElement("td");
                var tdNombre = document.createElement("td");
                var tdApellido = document.createElement("td");
                var tdProvincia = document.createElement("td");
                var tdTelefono = document.createElement("td");
                var tdFecha = document.createElement("td");
                var tdPDF = document.createElement("td");
                var tdBaja = document.createElement("td");
                var tdModif = document.createElement("td");

                tdDni.setAttribute("campo-dato","dni");
                tdNombre.setAttribute("campo-dato","nombre");
                tdApellido.setAttribute("campo-dato","apellido");
                tdProvincia.setAttribute("campo-dato","provincia");
                tdTelefono.setAttribute("campo-dato","telefono");
                tdFecha.setAttribute("campo-dato","fecha");
                tdPDF.setAttribute("campo-dato","PDF");
                tdModif.setAttribute("campo-dato","modif");
                tdBaja.setAttribute("campo-dato","baja");

                tdDni.innerHTML = valor.dni;
                objTr.appendChild(tdDni);

                tdNombre.innerHTML = valor.nombre;
                objTr.appendChild(tdNombre);

                tdApellido.innerHTML = valor.apellido;
                objTr.appendChild(tdApellido);

                tdProvincia.innerHTML = valor.provincia;
                objTr.appendChild(tdProvincia);

                tdTelefono.innerHTML = valor.telefono;
                objTr.appendChild(tdTelefono);

                tdFecha.innerHTML = valor.fecha;
                objTr.appendChild(tdFecha);

                tdPDF.innerHTML = "<button class='boton' campo-dato='PDF'>PDF</button>";
                objTr.appendChild(tdPDF);

                tdModif.innerHTML = "<button class='boton' campo-dato='modif'>Modi</button>";
                objTr.appendChild(tdModif);

                tdBaja.innerHTML = "<button class='boton' campo-dato='baja'>Borrar</button>";
                objTr.appendChild(tdBaja);

                tdPDF.onclick=function(){
                    cargaPDF(valor.dni);
                }

                tdModif.onclick=function(){
                    $("#contenedorP").addClass("contenedorOFF");
                    $("#modalModif").css("visibility","visible");
                    cargaModif(valor.dni, valor.nombre, valor.apellido, valor.provincia, valor.telefono, valor.fecha);
                };

                tdBaja.onclick = function(){
                    if(confirm("¿Está seguro de borrar este registro?")){
                        baja(valor.dni);
                    }
                };
                $("#tbDatos").append(objTr);
            });
            $("#footer").text("cantidad de registros: " + objJson.cuenta);
        }
    });
}

$(document).ready(function(){
    cargaDesplegable();

    $("#formModalAlta").keyup(function(){
        validarAlta();
    });

    $("#formModalModif").keyup(function(){
        validarModif();
    });

    $("#limpiarFiltros").click(function(){
        $("#orden").val("dni");
        $("#filtroDni").val("");
        $("#filtroNombre").val("");
        $("#filtroApellido").val("");
        $("#filtroProvincia").val("");
        $("#filtroTelefono").val("");
        $("#filtroFecha").val("");
    });

    $("#thDni").click(function(){
        $("#orden").val("dni");
    });

    $("#thNombre").click(function(){
        $("#orden").val("nombre");
    });

    $("#thApellido").click(function(){
        $("#orden").val("apellido");
    });

    $("#thProvincia").click(function(){
        $("#orden").val("provincia");
    });

    $("#thTelefono").click(function(){
        $("#orden").val("telefono");
    });
    $("#thFecha").click(function(){
        $("#orden").val("fecha");
    });    

    $("#cerrarModif").click(function(){
        $("#contenedorP").removeClass("contenedorOFF");
        $("#contenedorP").addClass("contenedorON");
        $("#modalModif").css("visibility","hidden");
    });

    $("#cerrarAlta").click(function(){
        $("#modalAlta").css("visibility","hidden");
        $("#contenedorP").removeClass("contenedorOFF");
        $("#contenedorP").addClass("contenedorON");
        document.getElementById("contenedorP").className="contenedorON";
        vaciarAlta();
    });

    $("#cerrarRespuesta").click(function(){
        $("#modalModif").css("visibility","hidden");
        $("#modalAlta").css("visibility","hidden");
        $("#respuestaModal").css("visibility","hidden");
        $("#contenedorP").removeClass("contenedorOFF");
        $("#contenedorP").addClass("contenedorON");
    });

    $("#enviarModif").click(function(){
        if(confirm("¿Está seguro de modificar registro?")){
            modificar();
        }
    });

    $("#enviarAlta").click(function(){
        if(confirm("¿Está seguro de insertar registro?")){
            alta();
        }
    });

    $("#cargar").click(function(){
        $("#tbDatos").empty();
        $("#tbDatos").html("<h3>Cargando Datos...</h3>");
        cargarDatos();
    });

    $("#vaciar").click(function(){
        $("#tbDatos").empty();
        $("#footer").text("Pie");
    });

    $("#alta").click(function(){
        $("#contenedorP").addClass("contenedorOFF");
        $("#modalAlta").css("visibility","visible");            
        validarAlta();
    });
});