//select2
$(function () {
    //Initialize Select2 Elements
    $(".select2").select2({
        theme: "bootstrap4",
    });
});

//todo llenar inputs
function llenarInput(valor) {
    $.ajax({
        type: "GET",
        url: "search/" + valor,
        dataType: "json",
        success: function (json) {
            $("#id").val(json.id);
            $("#nombre").val(json.nombre);
            $("#totalpersonas").val(json.total_personas);
            $("#fecha_ingreso").val(json.fecha_ingreso);
            $("#valor_alq").val(json.valor_alq);
            $("#deuda").val(json.valor_alq);
            calcularagua();
            calcularExtra();
        },
        error: function (xhr, status) {
            Swal.fire({
                title: "Error",
                text: "Hubo un problema al procesar solicitud",
                icon: "error",
            });
        },
    });
}

//*Calcular agua
function calcularagua() {
    let companeros = document.getElementById("totalpersonas").value;
    let agua = document.getElementById("tarifa_agua").value;

    if (companeros !== "" && agua !== "") {
        let total = companeros * agua;
        document.getElementById("agua").value = total;
        sumar();
    }
}
//*Calcular luz version 2
function calcularExtra() {
    let addExtra = document.getElementById("addExtra").value;
    if (addExtra == "") {
        addExtra = 0;
    }
    if (addExtra !== "") {
        let total = (addExtra * 1).toFixed(1);
        document.getElementById("extra").value = total;
        sumar();
    }
}
//*Suma de cobros
function sumar() {
    var deuda = document.getElementById("deuda").value;
    var luz = document.getElementById("luz").value;
    var agua = document.getElementById("agua").value;
    var extra = document.getElementById("extra").value;

    if (deuda !== "" && luz !== "" && agua !== "" && extra !== "") {
        var suma =
            parseFloat(deuda) +
            parseFloat(luz) +
            parseFloat(agua) +
            parseFloat(extra);
        document.getElementById("total").value = suma;
    }
}

function sumarluz() {
    var tarifa_luz = document.getElementById("tarifa_luz").value;
    var hpreciokwh = document.getElementById("kwh").value;
    var igv = document.getElementById("igv").value;

    if (hpreciokwh !== "" && tarifa_luz !== "" && igv !== "") {
        var sumaluz = tarifa_luz * hpreciokwh;
        var impuesto = sumaluz * (igv / 100);
        let total = (sumaluz + impuesto).toFixed(1);
        document.getElementById("luz").value = total;
        document.getElementById("addLuz").value = "";
        sumar();
    }
}
//*Calcular luz version 2
function sumarluzVer2() {
    let addLuz = document.getElementById("addLuz").value;
    if (addLuz == "") {
        addLuz = 0;
    }
    if (addLuz !== "") {
        let total = (addLuz * 1).toFixed(1);
        document.getElementById("luz").value = total;
        document.getElementById("tarifa_luz").value = "";
        sumar();
    }
}
