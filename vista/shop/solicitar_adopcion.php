<?php
session_start();

if (!isset($_SESSION['cargo']) || $_SESSION['cargo'] != 2) {
    header('location: ../tiendaonline');
    exit();
}

$id_due = $_SESSION['id_due'];

include_once('../config/dbconect.php');
$database = new Connection();
$db = $database->open();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $data = json_decode(file_get_contents("php://input"));
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            echo json_encode(['success' => false, 'message' => 'Error en el JSON: ' . json_last_error_msg()]);
            exit();
        }

        $id_animal = $data->id_animal;

        if (empty($id_animal)) {
            echo json_encode(['success' => false, 'message' => 'ID de animal no puede estar vacío.']);
            exit();
        }

        $sql = 'INSERT INTO solicitudes (id_due, id_animal, estado) VALUES (:id_due, :id_animal, "pendiente")';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id_due', $id_due, PDO::PARAM_INT);
        $stmt->bindValue(':id_animal', $id_animal, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Fallo al ejecutar la consulta.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Error de conexión: ' . $e->getMessage()]);
    }

    $database->close();
    exit(); 
}
?>
