<?php

require_once __DIR__ . '/../config/database.php';

class Rol
{

    private $db;
    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function obtenerTodos()
    {
        return $this->db->query("SELECT * FROM empleado")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerrol() {
        return $this->db->query("SELECT 	e.ci_empleado, e.nombre, e.apellido,
        r.id_rol,
        r.mes,
        r.hora25,
        r.hora50,
        r.hora100,
        r.bono,
        r.sueldo,
        r.totalIngreso,
        r.iess,
        r.multas,
        r.atrasos,
        r.alimentacion,
        r.anticipo,
        r.otros,
        r.totalEgreso,
        r.totalPagar,
        r.fecha_regitro
    FROM rol r
    INNER JOIN empleado e ON e.ci_empleado =r.ci_empleado")->fetchAll(PDO::FETCH_ASSOC);
}


    public function guardar($data)
    { 
        $stmt = $this->db->prepare("INSERT INTO rol (
                mes, hora25, hora50, hora100, 
                bono, sueldo, totalIngreso,
                iess, multas, atrasos, alimentacion,
                 anticipo, otros,
                totalEgreso, totalPagar, ci_empleado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ");
        return $stmt->execute([
            $data['mes'],
            $data['total_25'],
            $data['total_50'],
            $data['total_100'],
            $data['bonos'],
            $data['sueldo'],
            $data['ingreso_Total'],
            $data['iess'],
            $data['multas'],
            $data['atrasos'],
            $data['alimentacion'],
            $data['anticipos'],
            $data['otros'],
            $data['totalEgreso'],
            $data['totalneto'],
            $data['ci_empleado']
        ]);
    }





    public function obtenerPorId($id){
        $stmt = $this->db->prepare("SELECT
    e.ci_empleado, 
    e.nombre, 
    e.apellido,
    r.id_rol,
    r.mes,
    r.hora25,
    r.hora50,
    r.hora100,
    r.bono,
    r.sueldo,
    r.totalIngreso,
    r.iess,
    r.multas,
    r.atrasos,
    r.alimentacion,
    r.anticipo,
    r.otros,
    r.totalEgreso,
    r.totalPagar,
    r.fecha_regitro
FROM rol r
INNER JOIN empleado e ON e.ci_empleado = r.ci_empleado 
WHERE r.id_rol = ?;");
$stmt->execute([$id]);
return $stmt->fetch(PDO::FETCH_ASSOC);
        

    }







}
