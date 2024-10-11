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

// Modificado: Agregar campos a la consulta
$query = "SELECT id_venta, fecha, numfact, estado, total FROM venta WHERE id_due = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id_due);
$stmt->execute();
$result = $stmt->get_result();

$compras = [];
while ($row = $result->fetch_assoc()) {
    // Formatear la fecha a un formato más legible
    $row['fecha'] = date("d-m-Y", strtotime($row['fecha']));
    $compras[] = $row;
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
    <title>Vetdog - Tienda de productos para tu mascota</title>
    <link rel="shortcut icon" href="../../assets/img/ico.png" type="image/x-icon" />
    <link href="../../../fonts.googleapis.com/css467e.css?family=Muli:300,400,400i,600,700,800%7CWork+Sans:300,400,500,600,700,800" rel="stylesheet">
    <link href="../../assets/css/vendor.css" rel="stylesheet">
    <link href="../../assets/css/style.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
</head>
<body>

<?php include '../Includes/Header.php'; ?>
<?php include '../Includes/Aside.php'; ?>

<main class="container mt-5">
    <h2 class="text-center mb-4"><i class="fas fa-shopping-cart text-primary"></i> Mis Compras</h2>
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5 class="m-0 text-white"><i class="fas fa-receipt"></i> Detalles de Compras</h5>
        </div>
        <div class="card-body">
            <table id="tabla-compras" class="table table-bordered">
                <thead class="table table-primary">
                    <tr>
                        <th class="text-center">ID Venta</th>
                        <th class="text-center">Fecha</th>
                        <th class="text-center">Número de Factura</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Total <i class="fas fa-money-bill-wave text-success"></i></th>
                        <th class="text-center">Factura <i class="fas fa-file-invoice-dollar"></i></th> <!-- Nueva columna -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($compras as $compra): ?>
                        <tr>
                            <td class="text-center"><?php echo $compra['id_venta']; ?></td>
                            <td class="text-center"><?php echo $compra['fecha']; ?></td>
                            <td class="text-center"><?php echo $compra['numfact']; ?></td>
                            <td class="text-center"><?php echo $compra['estado']; ?></td>
                            <td class="text-center"><?php echo $compra['total'].' $'; ?></td>
                            <td class="text-center">
                                <a href="generar_pdf.php?id_venta=<?php echo $compra['id_venta']; ?>" class="btn btn-info" target="_blank">
                                    <i class="fas fa-print"></i> Imprimir
                                </a>
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
    $(document).ready(function() {
        $('#tabla-compras').DataTable({
            language: {
                "sEmptyTable": "No hay datos disponibles en la tabla",
                "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                "sInfoEmpty": "Mostrando 0 a 0 de 0 entradas",
                "sInfoFiltered": "(filtrados de _MAX_ entradas totales)",
                "sLengthMenu": "Mostrar _MENU_ entradas",
                "sLoadingRecords": "Cargando...",
                "sProcessing": "Procesando...",
                "sSearch": "Buscar: <i class='fas fa-search'></i>",
                "sZeroRecords": "No se encontraron resultados",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        });
    });
</script>

</body>
</html>
