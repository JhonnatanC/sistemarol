<?php
require_once __DIR__.'/../models/empleados.php';

$empleado = new Empleado();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['accion']) && $_POST['accion'] === 'editar') {
        $empleado->actualizar($_POST);
        header("Location: ../views/empleado/listarempleado.php");
        exit;
    } else {
        $empleado->crear($_POST);
        header("Location: ../views/empleado/listarempleado.php");
        exit;
    }
} elseif (isset($_GET['eliminar'])) {
    $empleado->eliminar($_GET['eliminar']);
    header("Location: ../views/empleado/listarempleado.php");
    exit;
}
?>
