<?php
require_once __DIR__.'/../config/database.php';

class Empleado {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function crear($data) {
        $stmt = $this->db->prepare("INSERT INTO empleado (ci_empleado, nombre, apellido, telefono, direccion, correo, id_departamento) VALUES (?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([
            $data['ci_empleado'],
            $data['nombre'],
            $data['apellido'],
            $data['telefono'],
            $data['direccion'],
            $data['correo'],
            $data['id_departamento']
        ]);
    }

    public function obtenerTodos() {
        return $this->db->query("SELECT e.ci_empleado, e.nombre, e.apellido, e.telefono, e.correo, e.direccion, d.nombre AS departamento_nombre, d.area, d.id_departamento
        FROM empleado e
        INNER JOIN departamento d
        ON e.id_departamento = d.id_departamento;")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId($ci_empleado) {
        $stmt = $this->db->prepare("SELECT * FROM empleado WHERE ci_empleado = ?");
        $stmt->execute([$ci_empleado]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($data) {
        $stmt = $this->db->prepare("UPDATE empleado SET nombre = ?, apellido = ?, telefono = ?, direccion = ?, correo = ?, id_departamento = ? WHERE ci_empleado = ?");
        return $stmt->execute([
            $data['nombre'],
            $data['apellido'],
            $data['telefono'],
            $data['direccion'],
            $data['correo'],
            $data['id_departamento'],
            $data['ci_empleado']
        ]);
    }

    public function eliminar($ci_empleado) {
        $stmt = $this->db->prepare("DELETE FROM empleado WHERE ci_empleado = ?");
        return $stmt->execute([$ci_empleado]);
    }
}
?>
