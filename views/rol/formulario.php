<?php
require_once '../../models/Rol.php';
$rolModel = new Rol();
$data=['mes'=>'',
  'bonos'=>'',
  'sueldo'=>'',
  'multas'=>'',
  'atrasos'=>'',
  'alimentacion'=>'',
  'anticipos'=>'',
  'otros'=>'',
  'ci_empleado'=>'',
];

$rol=$rolModel->obtenerTodos();


?>


<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <title>Formulario de Nómina</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
  body {
    background: linear-gradient(135deg, #e0f7fa, #f1f8e9);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #333;
  }

  .container {
    background-color: #ffffff;
    padding: 30px;
    border-radius: 1rem;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    max-width: 850px;
    margin-top: 30px;
    border-left: 8px solid #0d6efd;
  }

  h2 {
    font-weight: bold;
    color: #0d6efd;
    border-bottom: 2px solid #0d6efd;
    padding-bottom: 10px;
  }

  h4 {
    margin-top: 25px;
    font-weight: 600;
    color: #17a2b8;
    border-bottom: 1px solid #dee2e6;
    padding-bottom: 5px;
  }

  .form-label {
    font-weight: 600;
    color: #495057;
  }

  .form-control, .form-select {
    border-radius: 0.5rem;
    border: 1px solid #ced4da;
    background-color: #fdfdfd;
    transition: all 0.2s ease-in-out;
  }

  .form-control:focus, .form-select:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
    background-color: #ffffff;
  }

  .btn-primary {
    background-color: #0d6efd;
    border: none;
    padding: 10px 25px;
    font-weight: bold;
    border-radius: 0.5rem;
    transition: background-color 0.3s ease;
  }

  .btn-primary:hover {
    background-color: #0b5ed7;
  }

  select.form-select option[disabled] {
    color: #6c757d;
  }
</style>


<body class="p-4">

  <div class="container">
    <h2 class="mb-4">Formulario de Nómina</h2>
  <form id="rolPagos" method="POST" action="../../controllers/RolController.php">
      <!-- Mes -->
      <div class="mb-3">
        <label for="mes" class="form-label">Mes</label>
        <select class="form-select" id="mes" name="mes">
          <option selected disabled>Selecciona el mes</option>
          <option>Enero</option>
          <option>Febrero</option>
          <option>Marzo</option>
          <option>Abril</option>
          <option>Mayo</option>
          <option>Junio</option>
          <option>Julio</option>
          <option>Agosto</option>
          <option>Septiembre</option>
          <option>Octubre</option>
          <option>Noviembre</option>
          <option>Diciembre</option>
        </select>
      </div>


    <label >Empleado</label>
    <select class="form-select" name="ci_empleado" required>
      <option value="">Empleado</option>
        <?php
        foreach ($rol as $d): ?>
            <option value="<?=$d['ci_empleado']?>"
            <?=$d['ci_empleado']?>>
              <?=htmlspecialchars($d['nombre'] . '-'.$d ['apellido'])?>
            </option>
            <?php endforeach; ?>
    </select>


      <!-- Ingresos y Egresos en dos columnas -->
      <div class="row">
        <!-- Ingresos -->
        <div class="col-md-6">
          <h4>Ingresos</h4>
          <div class="mb-3">
            <label for="horas25" class="form-label">Horas al 25%</label>
            <input type="number" class="form-control" id="horas25" name="horas25">
          </div>
          <div class="mb-3">
            <label for="horas50" class="form-label">Horas al 50%</label>
            <input type="number" class="form-control" id="horas50" name="horas50">
          </div>
          <div class="mb-3">
            <label for="horas100" class="form-label">Horas al 100%</label>
            <input type="number" class="form-control" id="horas100" name="horas100">
          </div>
          <div class="mb-3">
            <label for="bonos" class="form-label">Bonos</label>
            <input type="number" class="form-control" id="bonos" name="bonos">
          </div>
          <div class="mb-3">
            <label for="sueldo" class="form-label">Sueldo</label>
            <input type="number" class="form-control" id="sueldo" name="sueldo">
          </div>
        

         

        </div>

        <!-- Egresos -->
        <div class="col-md-6">
          <h4>Egresos</h4>
          <div class="mb-3">
            <label for="iess" class="form-label">IESS</label>
            <input type="number" class="form-control" id="iess" name="iess" readonly >
          </div>
          <div class="mb-3">
            <label for="multas" class="form-label">Multas</label>
            <input type="number" class="form-control" id="multas" name="multas">
          </div>
          <div class="mb-3">
            <label for="atrasos" class="form-label">Atrasos</label>
            <input type="number" class="form-control" id="atrasos" name="atrasos">
          </div>
          <div class="mb-3">
            <label for="alimentacion" class="form-label">Alimentación</label>
            <input type="number" class="form-control" id="alimentacion" name="alimentacion">
          </div>
          <div class="mb-3">
            <label for="anticipo" class="form-label">Anticipo</label>
            <input type="number" class="form-control" id="anticipo" name="anticipos">
          </div>
          <div class="mb-3">
            <label for="otros" class="form-label">Otros</label>
            <input type="number" class="form-control" id="otros" name="otros">
          </div>
         

        </div>
      </div>

      
       <input type="hidden" id="temp_total_25" name="total_25">
      <input type="hidden" id="temp_total_50" name="total_50">
      <input type="hidden" id="temp_total_100" name="total_100">
      <input type="hidden" id="ingresoT" name="ingreso_Total">
      <input type="hidden" id="egresosT" name="totalEgreso">
      <input type="hidden" id="totalpagar" name="totalneto">

        <input type="hidden" name="accion" value="crear">


      <button type="submit" class="btn btn-primary mt-3">Enviar</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="main.js"></script>
</body>
