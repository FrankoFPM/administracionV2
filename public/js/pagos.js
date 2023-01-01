$(function () {
    //Initialize Select2 Elements
    $(".select2").select2({
        theme: "bootstrap4",
    });
});
//Date picker
$("#reservationdate").datetimepicker({
    format: "L",
    Default: false,
    format: "YYYY-MM-DD",
    extraFormats: ["YYYY-MM-DD"],
});

function llenarInput2(valor) {
    $.ajax({
        type: "GET",
        url: "search/" + valor,
        data: {
            valor: valor,
        },
        dataType: "json",
        success: function (json) {
            $("#id").val(json.id_arrendatario);
            $("#nombre").val(json.nombre);
            $("#totalpersonas").val(json.total_personas);
            $("#fecha_ingreso").val(json.fecha_ingreso);
            $("#valor_alq").val(json.valor_alq);

            $("#id_cobro").val(json.id);
            $("#deuda_inmueble").val(json.deuda_inmueble);
            $("#serv_luz").val(json.serv_luz);
            $("#serv_agua").val(json.serv_agua);
            $("#serv_extra").val(json.serv_extra);
            $("#total").val(json.total);

            $("#mora_anterior").val(json.total_mora);
        },
        error: function (xhr, status) {
            alert("Disculpe, existió un problema");
        },
    });
}
//*registrar pago
function sumarPago() {
    let alquiler = document.getElementById("alquiler_base").value;
    let luz = document.getElementById("pago_luz").value;
    let agua = document.getElementById("pago_agua").value;
    let extra = document.getElementById("pago_extra").value;

    if (alquiler !== "" && luz !== "" && agua !== "" && extra !== "") {
        let suma = (
            parseFloat(alquiler) +
            parseFloat(luz) +
            parseFloat(agua) +
            parseFloat(extra)
        ).toFixed(1);
        document.getElementById("total_final").value = suma;
        document.getElementById("total_pagado").value = suma;
    }
    resumenPago();
}
//*mora
function mora() {
    let dias = document.getElementById("dias_retrazado").value;
    let mora_anterior = document.getElementById("mora_anterior").value;
    let tarifa = document.getElementById("tarifa_mora").value;

    if (dias !== "" && tarifa !== "" && mora_anterior !== "") {
        calcular_mora = parseFloat(dias) * parseFloat(tarifa);
        sumar_mora = parseFloat(mora_anterior) + calcular_mora;
        document.getElementById("total_mora").value = calcular_mora.toFixed(1);
        document.getElementById("final_mora").value = sumar_mora.toFixed(1);
        document.getElementById("mora_final").value = sumar_mora.toFixed(1);
        pagoMora();
    }
    registroFinal();
}
///*pago de mora
function pagoMora() {
    let pago = document.getElementById("pagar_mora").value;
    let importe = document.getElementById("final_mora").value;

    if (pago !== "" && importe !== "") {
        resta = parseFloat(importe) - parseFloat(pago);

        document.getElementById("mora_pagada").value =
            parseFloat(pago).toFixed(1);
        document.getElementById("mora_deuda").value = resta.toFixed(1);
    }
    registroFinal();
}
//*resumen
function resumenPago() {
    //!pagos
    let alquiler = document.getElementById("alquiler_base").value;
    let luz = document.getElementById("pago_luz").value;
    let agua = document.getElementById("pago_agua").value;
    let extra = document.getElementById("pago_extra").value;
    //!deudas
    let deuda_alquiler = document.getElementById("deuda_inmueble").value;
    let deuda_luz = document.getElementById("serv_luz").value;
    let deuda_agua = document.getElementById("serv_agua").value;
    let deuda_extra = document.getElementById("serv_extra").value;

    if (alquiler !== "" && luz !== "" && agua !== "" && extra !== "") {
        alquilerR = parseFloat(deuda_alquiler) - parseFloat(alquiler);
        luzR = parseFloat(deuda_luz) - parseFloat(luz);
        aguaR = parseFloat(deuda_agua) - parseFloat(agua);
        extraR = parseFloat(deuda_extra) - parseFloat(extra);

        totalRestante = alquilerR + aguaR + extraR + luzR;

        document.getElementById("alquiler_final").value = alquilerR.toFixed(1);
        document.getElementById("luz_final").value = luzR.toFixed(1);
        document.getElementById("agua_final").value = aguaR.toFixed(1);
        document.getElementById("extra_final").value = extraR.toFixed(1);
        document.getElementById("importe_final").value =
            totalRestante.toFixed(1);
        registroFinal();
    }
}
//*deuda e importe general
function registroFinal() {
    let totalPagado = document.getElementById("total_pagado").value;
    let moraPagada = document.getElementById("pagar_mora").value;

    let deuda = document.getElementById("total").value;
    let moraDeuda = document.getElementById("mora_final").value;

    let deudaFinal = document.getElementById("importe_final").value;
    let moraFinal = document.getElementById("mora_deuda").value;

    if (
        totalPagado !== "" &&
        moraPagada !== "" &&
        moraDeuda !== "" &&
        deuda !== ""
    ) {
        pagaTotal = parseFloat(totalPagado) + parseFloat(moraPagada);
        deudaTotal = parseFloat(deuda) + parseFloat(moraDeuda);
        deudaFinal = parseFloat(deudaFinal) + parseFloat(moraFinal);

        document.getElementById("deuda_general").value = deudaTotal.toFixed(1);
        document.getElementById("deuda_actual").value = deudaFinal.toFixed(1);
        document.getElementById("importe_general").value = pagaTotal.toFixed(1);
    }
}
