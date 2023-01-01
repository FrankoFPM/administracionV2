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
//*Calcular luz sumando lo anterior
function sumarluces() {
    let tarifa_luz = document.getElementById("tarifa_luz").value;
    let hpreciokwh = document.getElementById("kwh").value;
    let igv = document.getElementById("igv").value;
    let luzdeuda = document.getElementById("luz2").value;
    if (tarifa_luz == "") {
        tarifa_luz = 0;
    }
    if (hpreciokwh !== "" && tarifa_luz !== "" && igv !== "" && luz !== "") {
        let sumaluz = parseFloat(tarifa_luz) * parseFloat(hpreciokwh);
        let impuesto = parseFloat(sumaluz) * (parseFloat(igv) / 100);
        let total = (
            parseFloat(sumaluz) +
            parseFloat(impuesto) +
            parseFloat(luzdeuda)
        ).toFixed(1);
        document.getElementById("luz").value = total;
        document.getElementById("addLuz").value = "";
        sumar();
    }
}
//*Calcular agua sumando lo anterior
function sumarAguaMes() {
    let companeros = document.getElementById("totalpersonas").value;
    let agua = document.getElementById("tarifa_agua").value;
    let aguaInicial = document.getElementById("agua2").value;

    if (companeros !== "" && agua !== "") {
        let total = (
            parseFloat(companeros) * parseFloat(agua) +
            parseFloat(aguaInicial)
        ).toFixed(1);
        document.getElementById("agua").value = total;
        sumar();
    }
}
//*Calcular servicios extra sumando lo anterior
function sumarServiciosExtra() {
    let extra = document.getElementById("extra2").value;
    let extraAnterior = document.getElementById("addExtra").value;

    if (extra !== "" && extraAnterior !== "") {
        let total = (parseFloat(extra) + parseFloat(extraAnterior)).toFixed(1);
        document.getElementById("extra").value = total;
        sumar();
    }
}
//*Calcular deuda del alquiler sumando lo anterior
function sumarAlquiler() {
    let alquiler = document.getElementById("valor_alq").value;
    let alquilerAnterior = document.getElementById("deuda2").value;

    if (alquiler !== "" && alquilerAnterior !== "") {
        let total = (
            parseFloat(alquiler) + parseFloat(alquilerAnterior)
        ).toFixed(1);
        document.getElementById("deuda").value = total;
    }
}
//*Calcular luces sumando lo anterior version 2
function sumarlucesVer2() {
    let addLuz = document.getElementById("addLuz").value;
    let luzdeuda = document.getElementById("luz2").value;
    if (addLuz == "") {
        addLuz = 0;
    }
    if (addLuz !== "" && luzdeuda !== "") {
        let sumaLuzV2 = (parseFloat(addLuz) + parseFloat(luzdeuda)).toFixed(1);
        document.getElementById("luz").value = sumaLuzV2;
        document.getElementById("tarifa_luz").value = "";
        sumar();
    }
}

function calcularagua() {
    let companeros = document.getElementById("totalpersonas").value;
    let agua = document.getElementById("tarifa_agua").value;

    if (companeros !== "" && agua !== "") {
        let total = companeros * agua;
        document.getElementById("agua").value = total;
        sumar();
    }
}
window.onload = function arrancar() {
    sumarAguaMes();
    sumarServiciosExtra();
    sumarAlquiler();
    sumar();
};
