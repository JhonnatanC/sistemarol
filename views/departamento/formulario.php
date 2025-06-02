<?php
require_once '../../models/Departamento.php';

$departamento = new Departamento();

$data = ['id_departamento'=>'', 'nombre'=>'', 'ubicacion'=>'', 'area'=>''];

if (isset($_GET['id'])) {
    $data = $departamento->obtenerPorId($_GET['id']);
}
?>
<!DOCTYPE html>
<html lang="es">  
<head>
  <meta charset="UTF-8">
  <title>Formulario Departamento</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
      background-color: #f4f6f9;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      padding: 50px 20px;
      color: #333;
    }

    .container {
      max-width: 700px;
    }

    .card {
      background: #ffffff;
      border-radius: 1rem;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      padding: 40px 30px;
      border: none;
    }

    h2 {
      text-align: center;
      font-weight: 700;
      color: #0d6efd;
      margin-bottom: 30px;
      border-bottom: 1px solid #dee2e6;
      padding-bottom: 15px;
    }

    .form-label {
      font-weight: 600;
      margin-bottom: 5px;
    }

    .form-control {
      border-radius: 8px;
      padding: 10px;
      border: 1px solid #ced4da;
      transition: all 0.2s ease-in-out;
    }

    .form-control:focus {
      border-color: #0d6efd;
      box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
    }

    .btn-primary {
      background-color: #0d6efd;
      border: none;
      padding: 12px;
      font-weight: bold;
      border-radius: 8px;
      width: 100%;
    }

    .btn-primary:hover {
      background-color: #0b5ed7;
    }

    .btn-outline-primary {
      color: #0d6efd;
      border: 1px solid #0d6efd;
      margin-bottom: 20px;
      border-radius: 8px;
      width: 100%;
    }

    .btn-outline-primary:hover {
      background-color: #0d6efd;
      color: #fff;
    }
  </style>


</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <h2>Formulario de Departamento</h2>
          <div class="btn-volver">
            <a href="listar.php" class="btn btn-outline-primary w-100">Ver  Listado</a>
          </div>
          <form action="../../controllers/DepartamentosController.php" method="POST">
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $data['nombre'] ?>" required>
            </div>
            <div class="mb-3">
              <label for="ubicacion" class="form-label">Ubicación</label>
              <input type="text" class="form-control" id="ubicacion" name="ubicacion" value="<?= $data['ubicacion'] ?>" required>
            </div>
            <div class="mb-3">
              <label for="area" class="form-label">Área</label>
              <input type="text" class="form-control" id="area" name="area" value="<?= $data['area'] ?>" required>
            </div>
            
             <?php if (isset($_GET['id'])): ?>

              <input type="hidden" name="accion" value="editar">
              <input type="hidden" name="id_departamento" value="<?= $_GET['id'] ?>">
              <?php endif; ?>
            
              
            <button type="submit" class="btn btn-primary w-100">Guardar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
