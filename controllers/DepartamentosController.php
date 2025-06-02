<?php
require_once __DIR__.'/../models/departamento.php';

$departamento=new Departamento();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['accion']) && $_POST['accion'] === 'editar') {
        $departamento->actualizar($_POST);
        header("Location:../views/departamento/listar.php");
    }else{
        $departamento->crear ($_POST);
        header("Location:../views/departamento/listar.php");
        exit;
    }
    }
    elseif (isset ($_GET['eliminar'])){
        $departamento->eliminar($_GET['eliminar']);
        header("Location:../views/departamento/listar.php");
    }

?>