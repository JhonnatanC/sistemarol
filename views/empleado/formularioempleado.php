<?php
require_once '../../models/empleados.php';
require_once '../../models/departamento.php';

$departamentoModel = new Departamento();
$departamentos = $departamentoModel->obtenerTodos();

$empleadoModel = new Empleado();
$data = [
    'ci_empleado' => '',
    'nombre' => '',
    'apellido' => '',
    'telefono' => '',
    'direccion' => '',
    'correo' => '',
    'id_departamento' => ''
];

if (isset($_GET['id'])) {
    $data = $empleadoModel->obtenerPorId($_GET['id']);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Formulario Empleado</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 0;
      min-height: 100vh;
      background: linear-gradient(135deg, #e0f7fa, #f1f8e9);
      background-attachment: fixed;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .glass-card {
      background: rgba(255, 255, 255, 0.4);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      padding: 30px;
      border-radius: 1rem;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.3);
      width: 100%;
      max-width: 800px;
    }

    h2 {
      font-weight: bold;
      color: #00695c;
      margin-bottom: 25px;
      text-align: center;
      border-bottom: 1px solid #b2dfdb;
      padding-bottom: 10px;
    }

    .form-label {
      font-weight: 600;
      color: #004d40;
    }

    .form-control {
      border-radius: 0.5rem;
      border: 1px solid #ced4da;
      background-color: rgba(255, 255, 255, 0.8);
      transition: all 0.2s ease-in-out;
    }

    .form-control:focus {
      border-color: #26a69a;
      box-shadow: 0 0 0 0.2rem rgba(38, 166, 154, 0.25);
      background-color: #ffffff;
    }

    .btn-primary {
      background-color: #00796b;
      border: none;
      padding: 10px;
      font-weight: bold;
      border-radius: 0.5rem;
      transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #004d40;
    }

    .btn-outline-primary {
      margin-bottom: 20px;
      font-weight: 500;
      border-radius: 0.5rem;
      color: #00796b;
      border-color: #00796b;
    }

    .btn-outline-primary:hover {
      background-color: rgba(0, 121, 107, 0.1);
    }
  </style>
</head>
<body>
  <div class="glass-card">
    <h2>Formulario de Empleado</h2>
    <a href="listarempleado.php" class="btn btn-outline-primary w-100 mb-4">Ver Listado</a>
    <form action="../../controllers/EmpleadosConroller.php" method="POST">
      <div class="row g-3">
        <div class="col-md-6">
          <label for="ci_empleado" class="form-label">CI Empleado</label>
          <input type="text" class="form-control" id="ci_empleado" name="ci_empleado" value="<?= $data['ci_empleado'] ?>" required>
        </div>
        <div class="col-md-6">
          <label for="nombre" class="form-label">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $data['nombre'] ?>" required>
        </div>
        <div class="col-md-6">
          <label for="apellido" class="form-label">Apellido</label>
          <input type="text" class="form-control" id="apellido" name="apellido" value="<?= $data['apellido'] ?>" required>
        </div>
        <div class="col-md-6">
          <label for="telefono" class="form-label">Teléfono</label>
          <input type="text" class="form-control" id="telefono" name="telefono" value="<?= $data['telefono'] ?>" required>
        </div>
        <div class="col-md-6">
          <label for="direccion" class="form-label">Dirección</label>
          <input type="text" class="form-control" id="direccion" name="direccion" value="<?= $data['direccion'] ?>" required>
        </div>
        <div class="col-md-6">
          <label for="correo" class="form-label">Correo</label>
          <input type="email" class="form-control" id="correo" name="correo" value="<?= $data['correo'] ?>" required>
        </div>
        <div class="col-md-12">
          <label for="id_departamento" class="form-label">Departamento</label>
          <select class="form-control" name="id_departamento" required>
            <option value="">Seleccione un departamento</option>
            <?php foreach ($departamentos as $d): ?>
              <option value="<?= $d['id_departamento'] ?>" <?= $data['id_departamento'] == $d['id_departamento'] ? 'selected' : '' ?>>
                <?= $d['nombre'] ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <?php if (isset($_GET['id'])): ?>
        <input type="hidden" name="accion" value="editar">
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
      <?php else: ?>
        <input type="hidden" name="accion" value="crear">
      <?php endif; ?>

      <div class="mt-4">
        <button type="submit" class="btn btn-primary w-100">Guardar</button>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
