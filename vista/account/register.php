<?php
session_start();
define('dbhost', 'localhost');
define('dbuser', 'root');
define('dbpass', '');
define('dbname', 'vetdog');

try {
    $connect = new PDO("mysql:host=" . dbhost . "; dbname=" . dbname, dbuser, dbpass);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}

if (isset($_POST["agregar"])) {
    if (empty($_POST['dni_due']) || empty($_POST['nom_due']) || empty($_POST['ape_due']) || empty($_POST['movil']) || empty($_POST['correo']) || empty($_POST['direc']) || empty($_POST['contra'])) {
        echo '<script>swal("¡Información!", "¡No puede enviar datos vacíos!", "info").then();</script>';
        exit;
    } else {
        $dni_due = $_POST['dni_due'];
        $nom_due = $_POST['nom_due'];
        $ape_due = $_POST['ape_due'];
        $movil = $_POST['movil'];
        $fijo = $_POST['fijo'];
        $correo = $_POST['correo'];
        $direc = $_POST['direc'];
        $estado = 1;
        $contra = password_hash($_POST['contra'], PASSWORD_DEFAULT);

        // Verificar si el DNI, móvil o correo ya existen
        $sql = "SELECT dni_due FROM owner WHERE dni_due = :dni_due OR movil = :movil OR correo = :correo";
        $stmt = $connect->prepare($sql);
        $stmt->execute([':dni_due' => $dni_due, ':movil' => $movil, ':correo' => $correo]);

        if ($stmt->rowCount() > 0) {
            echo '<script>swal("¡Error!", "¡Ya existe el usuario a registrar!", "error");</script>';
        } else {
            // Verificar si el usuario ya existe en la tabla veterinarians o admins
            $sql = "SELECT id_vet FROM veterinarian WHERE dnivet = :dni_due OR movil = :movil OR correo = :correo";
            $stmt = $connect->prepare($sql);
            $stmt->execute([':dni_due' => $dni_due, ':movil' => $movil, ':correo' => $correo]);

            if ($stmt->rowCount() > 0) {
                echo '<script>swal("¡Error!", "¡Ya existe el usuario a registrar!", "error");</script>';
            } else {
                // Verificar si el correo ya está en uso por un admin
                $sql = "SELECT id FROM admin WHERE email = :correo";
                $stmt = $connect->prepare($sql);
                $stmt->execute([':correo' => $correo]);

                if ($stmt->rowCount() > 0) {
                    echo '<script>swal("¡Error!", "¡Ya existe el usuario a registrar!", "error");</script>';
                } else {
                    // Insertar nuevo cliente
                    $now = date('Y-m-d H:i:s');
                    $sql2 = "INSERT INTO owner (dni_due, nom_due, ape_due, movil, fijo, correo, direc, estado, contra, fere) 
                            VALUES (:dni_due, :nom_due, :ape_due, :movil, :fijo, :correo, :direc, :estado, :contra, :fere)";
                    $stmt = $connect->prepare($sql2);
                    $stmt->execute([
                        ':dni_due' => $dni_due,
                        ':nom_due' => $nom_due,
                        ':ape_due' => $ape_due,
                        ':movil' => $movil,
                        ':fijo' => $fijo,
                        ':correo' => $correo,
                        ':direc' => $direc,
                        ':estado' => $estado,
                        ':contra' => $contra,
                        ':fere' => $now
                    ]);

                    // Mensaje de éxito
                    echo '<script>swal("¡Registrado!", "Agregado correctamente", "success").then(function() {
                        window.location = "./../login.php";
                    });</script>';

                    $tableID = $connect->lastInsertId();
                    $nameTable = "cliente";
                    $rol = "usuario";
                    $action = "Se creó un cliente";


                }
            }
        }
        // Cerrar la conexión PDO (no es necesario, pero por buenas prácticas)
        $connect = null;
    }
}
?>


<!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
        type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="./../../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="./styles.css" rel="stylesheet">
    <link href="./../../assets/css/themes/all-themes.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/x-icon" href="./../../assets/img/lll.png" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="./../../assets/js/tailwindcss.js"></script>
    <title>Registrar Clientes Administrador | Beatriz Fagundez</title>
</head>



<body style="background-color: #475569">
    <section class="p-8">
        <div class="container-fluid">
            <div class="alert alert-info">
                <strong>Estimado usuario!</strong> Los campos remarcados con <span class="text-danger">*</span> son
                necesarios.
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>REGISTRO DE CLIENTES</h2>
                        </div>

                        <div class="body">
                            <form method="POST" autocomplete="off">
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <label class="control-label">Cédula de identidad<span
                                                class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="dni_due"
                                                    onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"
                                                    maxlength="8" required class="form-control"
                                                    placeholder="Cédula de identidad..." />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="control-label">Nombres<span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="nom_due" required class="form-control"
                                                    placeholder="Nombres..." />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="control-label">Apellidos<span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="ape_due" required class="form-control"
                                                    placeholder="Apellidos..." />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="control-label">Teléfono móvil<span
                                                class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="movil" required
                                                    onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"
                                                    maxlength="11" class="form-control"
                                                    placeholder="Telefono movil..." />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="control-label">Teléfono fijo</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="fijo"
                                                    onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"
                                                    maxlength="11" class="form-control"
                                                    placeholder="Telefono fijo..." />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="control-label">Correo Electrónico<span
                                                class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="email" name="correo" class="form-control"
                                                    placeholder="Correo..." />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="control-label">Dirección<span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="direc" class="form-control"
                                                    placeholder="Dirección..." />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="control-label">Contraseña<span
                                                class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" name="contra" required class="form-control"
                                                    placeholder="Contraseña..." />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="container-fluid" style="text-aling: center">
                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                        <button class="btn bg-red btn-clear"><i class="material-icons">cancel</i>
                                            LIMPIAR </button>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                        <button class="btn bg-green" name="agregar">GUARDAR <i
                                                class="material-icons">save</i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="../../assets/plugins/jquery/jquery.min.js"></script>
    <script src="../../assets/plugins/bootstrap/js/bootstrap.js"></script>
    <script src="../../assets/js/admin.js"></script>
</body>

</html>