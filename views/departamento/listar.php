<?php
require_once '../../models/departamento.php';
$departamento = new Departamento();
$departamento = $departamento->obtenerTodos();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Listado de Departamentos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
 <style>
   


   
  </style>

</head>
<body>
  <div class="container">
    <div class="btn-volver text-end">
      <a href="formulario.php" class="btn btn-outline-primary">← Regresar al Formulario</a>
    </div>

    <h2>Listado de Departamentos</h2>

    <table class="table table-bordered table-hover table-striped shadow-sm">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Ubicación</th>
          <th>Área</th>
          <th>Acción</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($departamento as $d): ?>
        <tr>
          <td><?= $d['id_departamento'] ?></td>
          <td><?= $d['nombre'] ?></td>
          <td><?= $d['ubicacion'] ?></td>
          <td><?= $d['area'] ?></td>
          <td>
            <a href="formulario.php?id=<?= $d['id_departamento'] ?>" class="btn btn-warning btn-sm">Editar</a>
            <a href="../../controllers/DepartamentosController.php?eliminar=<?= $d['id_departamento'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar estos datos?');">Elimina r</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
