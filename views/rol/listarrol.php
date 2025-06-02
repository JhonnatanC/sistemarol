<?php
require_once '../../models/rol.php';
$rolModel = new Rol();
$roles = $rolModel->obtenerrol();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Listado de Roles de Empleados</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  
</head>
<body>
  <div class="container">
    <div class="btn-volver text-end">
      <a href="formulario.php" class="btn btn-outline-primary">← Regresar al Formulario</a>
    </div>

    <div class="card">
      <div class="card-header text-center">
        Listado de Roles de Empleados
      </div>
      <div class="card-body table-responsive">
        <table class="table table-bordered table-hover align-middle">
          <thead>
            <tr>
              <th>CI</th>
              <th>Nombre</th>
              <th>Mes</th>
              <th>Hora 25%</th>
              <th>Hora 50%</th>
              <th>Hora 100%</th>
              <th>Bono</th>
              <th>Sueldo</th>
              <th>Total Ingreso</th>
              <th>IESS</th>
              <th>Multas</th>
              <th>Atrasos</th>
              <th>Alimentación</th>
              <th>Anticipo</th>
              <th>Otros</th>
              <th>Total Egreso</th>
              <th>Total a Pagar</th>
              <th>Fecha Registro</th>
              <th>Acción</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($roles as $r): ?>
              <tr>
                <td><?= $r['ci_empleado'] ?></td>
                <td><?= $r['nombre'] . ' ' . $r['apellido'] ?></td>
                <td><?= $r['mes'] ?></td>
                <td><?= $r['hora25'] ?></td>
                <td><?= $r['hora50'] ?></td>
                <td><?= $r['hora100'] ?></td>
                <td><?= $r['bono'] ?></td>
                <td><?= $r['sueldo'] ?></td>
                <td><?= $r['totalIngreso'] ?></td>
                <td><?= $r['iess'] ?></td>
                <td><?= $r['multas'] ?></td>
                <td><?= $r['atrasos'] ?></td>
                <td><?= $r['alimentacion'] ?></td>
                <td><?= $r['anticipo'] ?></td>
                <td><?= $r['otros'] ?></td>
                <td><?= $r['totalEgreso'] ?></td>
                <td><?= $r['totalPagar'] ?></td>
                <td><?= $r['fecha_regitro'] ?></td>
                <td>
                  <div class="btn-group" role="group">
                    <a href="formulario.php?id=<?= $r['id_rol'] ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="../../controllers/RolController.php?eliminar=<?= $r['id_rol'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este rol?');">Eliminar</a>
                    <a href="../../controllers/ReporteRoles.php?id=<?=$r['id_rol']?>"class="btn btn-info btn-sm" target="_blank">Rol Inividual</a>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
