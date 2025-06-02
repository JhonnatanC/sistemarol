<?php
    require_once __DIR__ . '/../models/Rol.php' ;

    $rol= new Rol();

 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['accion']) && $_POST['accion']==='crear' ){
    $data = [
        'mes' => $_POST['mes'] ?? null,
        'total_25' => $_POST['total_25'] ?? null,
        'total_50' => $_POST['total_50'] ?? null,
        'total_100' => $_POST['total_100'] ?? null,
        'bonos' => $_POST['bonos'] ?? null,
        'sueldo' => $_POST['sueldo'] ?? null,
        'ingreso_Total' => $_POST['ingreso_Total'] ?? null,
        'iess' => $_POST['iess'] ?? null,
        'multas' => $_POST['multas'] ?? null,
        'atrasos' => $_POST['atrasos'] ?? null,
        'alimentacion' => $_POST['alimentacion'] ?? null,
        'anticipos' => $_POST['anticipos'] ?? null,
        'otros' => $_POST['otros'] ?? null,
        'totalEgreso' => $_POST['totalEgreso'] ?? null,
        'totalneto' => $_POST['totalneto'] ?? null,
        'ci_empleado' => $_POST['ci_empleado'] ?? null
    ];

     $rol->guardar($_POST);
             header('Location:../views/rol/listarrol.php');         
            exit; 
    }
}


?>