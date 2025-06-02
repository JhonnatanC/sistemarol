<?php
require_once '../../models/empleados.php';
$empleadoModel = new Empleado();
$empleados = $empleadoModel->obtenerTodos(); // Debe retornar un array con todos los empleados
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Listado de Empleados</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    
  </style>
</head>
<body>
  <div class="container">
    <div class="btn-volver text-end">
      <a href="formularioempleado.php" class="btn btn-outline-primary">← Regresar al Formulario</a>
    </div>

    <h2>Listado de Empleados</h2>

    <table class="table table-bordered table-hover table-striped shadow-sm">
      <thead>
        <tr>
          <th>CI</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Teléfono</th>
          <th>Dirección</th>
          <th>Correo</th>
          <th>Departamento</th>
          <th>Nombre</th>
          <th>Area</th>
          <th>Acción</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($empleados as $e): ?>
        <tr>
          <td><?= $e['ci_empleado'] ?></td>
          <td><?= $e['nombre'] ?></td>
          <td><?= $e['apellido'] ?></td>
          <td><?= $e['telefono'] ?></td>
          <td><?= $e['direccion'] ?></td>
          <td><?= $e['correo'] ?></td>
          <td><?= $e['id_departamento'] ?></td>
          <td><?= $e['departamento_nombre'] ?></td>
          <td><?= $e['area'] ?></td>
          <td>
            <a href="formularioempleado.php?id=<?= $e['ci_empleado'] ?>" class="btn btn-warning btn-sm">Editar</a>
            <a href="../../controllers/EmpleadosConroller.php?eliminar=<?= $e['ci_empleado'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este empleado?');">Eliminar</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
