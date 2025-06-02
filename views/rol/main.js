function calcularIngreso() {
    const sueldo = parseFloat(document.getElementById('sueldo').value);
    const bonos = parseFloat(document.getElementById('bonos').value);
    const hora_25 = parseFloat(document.getElementById('horas25').value);
    const hora_50 = parseFloat(document.getElementById('horas50').value);
    const hora_100 = parseFloat(document.getElementById('horas100').value);

    const hora_n = (sueldo / 160).toFixed(2);
    const total_25 = ((hora_n * 1.25) * hora_25);
    document.getElementById('temp_total_25').value = total_25.toFixed(2);

    const total_50 = ((hora_n * 1.50) * hora_50);
    document.getElementById('temp_total_50').value = total_50.toFixed(2);

    const total_100 = ((hora_n * 2) * hora_100);
    document.getElementById('temp_total_100').value = total_100.toFixed(2);

    const total_ingreso = sueldo + bonos + total_25 + total_50 + total_100;
    document.getElementById('ingresoT').value = total_ingreso.toFixed(2);
}

function calcularEgreso() {
    const multas = parseFloat(document.getElementById('multas').value);
    const atrasos = parseFloat(document.getElementById('atrasos').value);
    const alimentacion = parseFloat(document.getElementById('alimentacion').value);
    const anticipo = parseFloat(document.getElementById('anticipo').value);
    const otros = parseFloat(document.getElementById('otros').value);
    const sueldo = parseFloat(document.getElementById('sueldo').value);

    const totalIess = (sueldo * 9.5 / 100);
    document.getElementById('iess').value = totalIess;

    const total_egreso = (totalIess + multas + atrasos + alimentacion + anticipo + otros).toFixed(2);
    document.getElementById('egresosT').value = total_egreso;
}

function netoPagar() {
    const ingreso = parseFloat(document.getElementById('ingresoT').value) || 0;
    const egreso = parseFloat(document.getElementById('egresosT').value) || 0;
    const totalPagar = ingreso - egreso;
    document.getElementById('totalpagar').value = totalPagar.toFixed(2);
}

const formulario = document.getElementById('rolPagos');
formulario.addEventListener('submit', (e) => {
    calcularIngreso();
    calcularEgreso();
    netoPagar();

    const form = document.createElement('form');
    form.method = 'POST';   
    form.action = '../../controllers/RolController.php';

    const campos = {
        total_25: document.getElementById('temp_total_25').value,
        total_50: document.getElementById('temp_total_50').value,
        total_100: document.getElementById('temp_total_100').value,
        ingreso_Total: document.getElementById('totalpagar').value,
    };

    for (const key in campos) {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = key;
        input.value = campos[key];
        form.appendChild(input);
    }

    const camposegresos = {
        iess: document.getElementById('iess').value,
        totalEgreso: document.getElementById('egresosT').value,
    };

    for (const key in camposegresos) {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = key;
        input.value = camposegresos[key];
        form.appendChild(input);
    }

    const totalp = {
    totalneto: document.getElementById('totalpagar').value, // ← ID correcto
    };

    for (const key in totalp) {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = key;
        input.value = totalp[key];
        form.appendChild(input);
    }

    document.body.appendChild(form);
    form.submit();
});
