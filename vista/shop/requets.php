<?php
session_start();
if (!isset($_SESSION['cargo']) || $_SESSION['cargo'] != 2) {
    header('location: ../tiendaonline');
    exit;
}

$id_due = $_SESSION['id_due'];
$conn = new mysqli('localhost', 'root', '', 'vetdog'); // Cambia los valores según tu configuración
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener las solicitudes de adopción
$query = "SELECT a.nombre, s.estado, a.id_animal FROM animales a 
          JOIN solicitudes s ON a.id_animal = s.id_animal 
          WHERE s.id_due = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id_due);
$stmt->execute();
$result = $stmt->get_result();
$solicitudes = [];

while ($row = $result->fetch_assoc()) {
    $solicitudes[] = $row;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="meta description">
    <title>Vetdog - Solicitudes de Adopción</title>
    <link rel="shortcut icon" href="../../assets/img/ico.png" type="image/x-icon" />
    <link href="../../../fonts.googleapis.com/css467e.css?family=Muli:300,400,400i,600,700,800%7CWork+Sans:300,400,500,600,700,800"
        rel="stylesheet">
    <link href="../../assets/css/vendor.css" rel="stylesheet">
    <link href="../../assets/css/style.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
</head>

<body>
    <?php include '../Includes/Header_Shop.php'; ?>
    <main class="container mt-5">
        <h2 class="text-center mb-4"><i class="fas fa-paw text-primary"></i> Mis Solicitudes de Adopción</h2>
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="m-0 text-white"><i class="fas fa-receipt"></i> Detalles de Solicitudes</h5>
            </div>
            <div class="card-body">
                <table id="tabla-solicitudes" class="table table-bordered">
                    <thead class="table-primary">
                        <tr>
                            <th class="text-center">Nombre del Animal</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($solicitudes as $solicitud): ?>
                            <tr>
                                <td class="text-center"><?php echo htmlspecialchars($solicitud['nombre']); ?></td>
                                <td class="text-center" style="color: <?php
                                if ($solicitud['estado'] == 'rechazada') echo 'red';
                                elseif ($solicitud['estado'] == 'pendiente') echo 'blue';
                                elseif ($solicitud['estado'] == 'aceptada') echo 'green';
                                ?>">
                                    <?php echo htmlspecialchars($solicitud['estado']); ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($solicitud['estado'] == 'aceptada'): ?>
                                        <a href="certificado.php?id_due=<?php echo $id_due; ?>&id_animal=<?php echo $solicitud['id_animal']; ?>" 
                                           class="btn btn-success" target="_blank">
                                            <i class="fas fa-file-pdf"></i> Generar Certificado
                                        </a>
                                    <?php else: ?>
                                        <button class="btn btn-secondary" disabled data-toggle="tooltip" title="La solicitud debe estar aceptada para generar un certificado.">
                                            <i class="fas fa-file-pdf"></i> Generar Certificado
                                        </button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
    </main>
    <?php include '../Includes/Footer.php'; ?>
    <script>
        $(document).ready(function () {
            $('#tabla-solicitudes').DataTable({
                language: {
                    "sEmptyTable": "No hay datos disponibles en la tabla",
                    "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                    "sInfoEmpty": "Mostrando 0 a 0 de 0 entradas",
                    "sInfoFiltered": "(filtrados de _MAX_ entradas totales)",
                    "sLengthMenu": "Mostrar _MENU_ entradas",
                    "sSearch": "Buscar: ",
                    "sZeroRecords": "No se encontraron resultados",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    }
                }
            });

            // Inicializar tooltips
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>