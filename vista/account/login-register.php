<?php
session_start();
define('dbhost', 'localhost');
define('dbuser', 'root');
define('dbpass', '');
define('dbname', 'vetdog');

try {
    $connect = new PDO("mysql:host=".dbhost."; dbname=".dbname, dbuser, dbpass);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo $e->getMessage();
}

if (isset($_POST['login'])) {
    $errMsg = '';

    $correo = $_POST['correo'];
    $contra = $_POST['contra'];
    
    if ($correo == '')
        $errMsg = 'Digite su correo';
    if ($contra == '')
        $errMsg = 'Digite su contraseña';
    
    if ($errMsg == '') {
        try {
            $stmt = $connect->prepare('SELECT id_due, nom_due, ape_due, correo, contra, cargo FROM owner WHERE correo = :correo');
            $stmt->execute(array(':correo' => $correo));
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($data == false) {
                $errMsg = "User $correo no encontrado.";
            } else {
                if (password_verify($contra, $data['contra'])) {
                    $_SESSION['id_due'] = $data['id_due'];
                    $_SESSION['nom_due'] = $data['nom_due'];
                    $_SESSION['ape_due'] = $data['ape_due'];
                    $_SESSION['correo'] = $data['correo'];
                    $_SESSION['cargo'] = $data['cargo'];

                    if ($_SESSION['cargo'] == 2) {
                        header('Location: ../shop/shop');
                    }
                    exit;
                } else {
                    $errMsg = 'Contraseña incorrecta.';
                }
            }
        } catch(PDOException $e) {
            $errMsg = $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">
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
</head>

<body>
    <?php 
    include '../Includes/Header.php';
    include '../Includes/Aside.php';
    ?>


    <main>
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../tiendaonline">Home</a></li>
                                    
                                    <li class="breadcrumb-item active" aria-current="page">login register</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="login-register-wrapper pt-40 pb-40">
            <div class="container">
                <div class="member-area-from-wrap">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="login-reg-form-wrap">
                                <h2>Iniciar Sesión</h2>
                                <form action="#" autocomplete="off" method="POST"  role="form">
                                    <div class="single-input-item">
                                        <input type="email" name="correo" value="<?php if(isset($_POST['correo'])) echo $_POST['correo'] ?>" placeholder="Correo electrónico" required />
                                    </div>
                                    <div class="single-input-item">
                                    <input type="password" name="contra" placeholder="Contraseña" required />

                                    </div>
                                    <div class="single-input-item">
                                        <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                            <a href="#" class="forget-pwd">¿Olvidaste tu contraseña?</a>
                                        </div>
                                    </div>
                                    <div class="single-input-item">
                                        <button name='login' type="submit" class="btn btn__bg">Iniciar Sesión</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="login-reg-form-wrap sign-up-form">
                                <h2>Crear cuenta</h2>
                                
                                <form action="#" method="post" autocomplete="off" enctype="multipart/form-data">
                                    
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                                <input type="text" name="nom_due"  placeholder="Nombre completo" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                                <input type="text" name="ape_due"  placeholder="Apellidos" required />
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="single-input-item">
                                        <input type="email" name="correo" placeholder="Correo electrónico" required />
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                                <input name="contra" type="password" placeholder="Contraseña" required />
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="single-input-item">
                                        <button name="agregar" class="btn btn__bg">Crear mi cuenta</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php include '../Includes/Footer.php'; ?>

    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>

    <script src="../../assets/js/vendor.js"></script>
    <script src="../../assets/js/active.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <?php
if (isset($_POST["agregar"])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "vetdog";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $nom_due = $_POST['nom_due'];
    $ape_due = $_POST['ape_due'];
    $correo = $_POST['correo'];
    $contra = password_hash($_POST['contra'], PASSWORD_BCRYPT);

    $sql = "SELECT * FROM owner WHERE correo='$correo'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        ?>
        <script type="text/javascript">
            swal("Oops...!", "Ya existe el correo a agregar!", "error")
        </script>
        <?php
    } else {
        $sql2 = "INSERT INTO owner (nom_due, ape_due, correo, estado, contra, cargo) 
                 VALUES ('$nom_due','$ape_due','$correo',1,'$contra',2)";
        if (mysqli_query($conn, $sql2)) {
            ?>
            <script type="text/javascript">
                swal("¡Registrado!", "¡Registrado correctamente", "success").then(function() {
                    window.location = "login-register";
                });
            </script>
            <?php
        } else {
            ?>
            <script type="text/javascript">
                swal("Oops...!", "No se pudo guardar!", "error")
            </script>
            <?php
        }
    }

    $conn->close();
}
?>

</body>
</html>