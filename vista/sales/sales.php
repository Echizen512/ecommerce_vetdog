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

    <!-- Start Header Area -->
    <header class="header-area">
        <!-- main header start -->
        <div class="main-header d-none d-lg-block">
            <!-- header top start -->
            <div class="header-top">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="welcome-message">
                                <p>Bienvenidos</p>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="header-top-settings">
                                <ul class="nav align-items-center">
                                    <li class="account-settings">
                                    <?php echo ucfirst($_SESSION['correo']); ?>
                                        <i class="fa fa-angle-down"></i>
                                        <ul class="dropdown-list account-list">
                                            <!---<li><a href="my-account">mi cuenta</a></li> -->
                                            <li><a href="../sales/sales.php">Compras</a></li>
                                            <li><a href="../shop/salir">cerrar sesion</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header top end -->

            <!-- header middle area start -->
            <div class="header-middle-area">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- start logo area -->
                        <div class="col-lg-3">
                            <div class="logo">
                                <a href="shop">
                                    <img src="../../assets/img/logo/image(1).png" alt="">
                                </a>
                            </div>
                        </div>
                        <!-- start logo area -->

                        <!-- start search box area -->
                        <div class="col-lg-6">
                            <div class="search-box-wrapper">
                                <div class="search-box-inner-wrap">
                                    <form class="search-box-inner">
                                        <div class="search-field-wrap">
                                            <input type="text" class="search-field" placeholder="Más de 50.000 productos ¡encuéntralos aquí!">
                                        </div>
                                        
                                        <div class="search-select-box">
                                            
                                        </div>

                                        <div class="search-btn">
                                            <button><i class="ion-ios-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- start search box end -->

                        <!-- mini cart area start -->
                        <div class="col-lg-3 ml-auto">
                            <div class="header-configure-area">
                                <ul class="nav justify-content-end">
                                    <li>
                                        <a href="#">
                                            <i class="ion-android-favorite-outline"></i>
                                            <span class="notification">0</span>
                                        </a>
                                    </li>
                                    <li class="mini-cart-wrap">
                                        <a href="cart">
                                            <i class="ion-bag"></i>
                                            <span class="notification"><?php 
                            echo (empty($_SESSION['CARRITO'])) ? 0 : count($_SESSION['CARRITO']);
                        ?></span>
                                        </a>
                                        

                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- mini cart area end -->
                    </div>
                </div>
            </div>
            <!-- header middle area end -->

            <!-- main menu area start -->
            <div class="main-menu-area theme-color-2 sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="category-toggle-wrap">
                                <div class="category-toggle">
                                    <i class="ion-android-menu"></i>
                                    Categorías
                                    <span><i class="ion-android-arrow-dropdown"></i></span>
                                </div>

                                <nav class="category-menu">
                                    <ul class="categories-list">
                               <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = 'SELECT * FROM category';
                foreach ($db->query($sql) as $row) {
                    ?>   

                    <li><a href="#"><?php echo $row['nomcate']; ?></a></li>
                    <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>               
                                    </ul>
                                </nav>

                            </div>
                        </div>

                         <div class="col-lg-7">
                            <div class="main-menu home-main">
                                <!-- main menu navbar start -->
                                <nav class="desktop-menu">
                                    <ul>
                                        
                                        <li>
                                            <a href="#">perros <i class="fa fa-angle-down"></i></a>
                                            <ul class="megamenu dropdown">
                                                <li class="mega-title"><a href="#">Alimentos perros</a>
                                                    <ul>
             <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '6'";
                foreach ($db->query($sql) as $row) {
                    ?>
                                                               
                                                        <li>
                                                            <a href="#"><?php echo $row['nomcate']; ?></a>
                                                        </li>

                <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>
                                                        
                                                    </ul>
                                                </li>

                                                <li class="mega-title"><a href="#">Cuidado e higiene</a>
                                                    <ul>
                                                        <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '7'";
                foreach ($db->query($sql) as $row) {
                    ?>


                    <li>
                        <a href="#"><?php echo $row['nomcate']; ?></a>
                    </li>
                <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>                                        
        </ul>
                                                </li>


                                                <li class="mega-title"><a href="#">Farmacia</a>
                                                    <ul>
                                                        <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '3'";
                foreach ($db->query($sql) as $row) {
                    ?>


                    <li>
                        <a href="#"><?php echo $row['nomcate']; ?></a>
                    </li>
                <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>                                        
        </ul>
                                                </li>


                                                <li class="mega-title"><a href="#">Accesorios</a>
                                                    <ul>
                                                        <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '2'";
                foreach ($db->query($sql) as $row) {
                    ?>


                    <li>
                        <a href="#"><?php echo $row['nomcate']; ?></a>
                    </li>
                <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>                                        
        </ul>
                                                </li>

                                            </ul>
                                        </li>

                                        
                                        <li>
                                            <a href="#">gatos <i class="fa fa-angle-down"></i></a>
                                            <ul class="megamenu dropdown">
                                                <li class="mega-title"><a href="#">Alimentos gatos</a>
                                                    <ul>
             <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '6'";
                foreach ($db->query($sql) as $row) {
                    ?>
                                                               
                                                        <li>
                                                            <a href="#"><?php echo $row['nomcate']; ?></a>
                                                        </li>

                <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>
                                                        
                                                    </ul>
                                                </li>

                                                <li class="mega-title"><a href="#">Cuidado e higiene</a>
                                                    <ul>
                                                        <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '7'";
                foreach ($db->query($sql) as $row) {
                    ?>


                    <li>
                        <a href="#"><?php echo $row['nomcate']; ?></a>
                    </li>
                <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>                                        
        </ul>
                                                </li>


                                                <li class="mega-title"><a href="#">Farmacia</a>
                                                    <ul>
                                                        <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '3'";
                foreach ($db->query($sql) as $row) {
                    ?>


                    <li>
                        <a href="#"><?php echo $row['nomcate']; ?></a>
                    </li>
                <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>                                        
        </ul>
                                                </li>


                                                <li class="mega-title"><a href="#">Accesorios</a>
                                                    <ul>
                                                        <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '2'";
                foreach ($db->query($sql) as $row) {
                    ?>


                    <li>
                        <a href="#"><?php echo $row['nomcate']; ?></a>
                    </li>
                <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>                                        
        </ul>
                                                </li>

                                            </ul>
                                        </li>


                                       
                                    </ul>
                                </nav>
                                <!-- main menu navbar end -->
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="contact-top">
                                <div class="contact-top-icon">
                                    <img src="../../assets/img/icon/download.png" alt="">
                                </div>
                                <div class="contact-top-info">
                                    <p>Llámanos ahora</p>
                                    <a href="#">0412-4773077</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- main menu area end -->
        </div>
        <!-- main header start -->

        <!-- mobile header start -->
        <div class="mobile-header d-lg-none d-md-block sticky">
            <!--mobile header top start -->
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="mobile-header-top">
                            <div class="header-top-settings">
                                <ul class="nav align-items-center justify-content-center">
                                    <li class="account-settings">
                                        <?php echo ucfirst($_SESSION['correo']); ?>
                                        <i class="fa fa-angle-down"></i>
                                        <ul class="dropdown-list account-list">
                                           
                                          
                                            <li><a href="my-account">mi cuenta</a></li>
                                            <li><a href="../sales/sales.php">Ventas</a></li>
                                            <li><a href="salir">cerrar sesion</li>
                                        </ul>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile-main-header">
                            <div class="mobile-logo">
                                <a href="shop">
                                    <img src="../../assets/img/logo/image(1).png" alt="Vetdog Logo">
                                </a>
                            </div>
                            <div class="mobile-menu-toggler">
                                <div class="mini-cart-wrap">
                                    <a href="cart">
                                        <i class="ion-bag"></i>
                                        <span class="notification"><?php 
                            echo (empty($_SESSION['CARRITO'])) ? 0 : count($_SESSION['CARRITO']);
                        ?></span>
                                    </a>
                                </div>
                                <div class="mobile-menu-btn">
                                    <div class="off-canvas-btn">
                                        <i class="ion-android-menu"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="category-toggle-wrap">
                            <div class="category-toggle">
                                <i class="ion-android-menu"></i>
                                Categorías
                                <span><i class="ion-android-arrow-dropdown"></i></span>
                            </div>
                            
                           <nav class="category-menu">
                                <ul class="categories-list">
  <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = 'SELECT * FROM category';
                foreach ($db->query($sql) as $row) {
                    ?>                                 
                                    <li><a href="#"><?php echo $row['nomcate']; ?></a></li>

   <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>                                  
                                    
                                </ul>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
            <!-- mobile header top start -->
        </div>
        <!-- mobile header end -->
    </header>
    <!-- end Header Area -->

    <!-- off-canvas menu start -->
    <aside class="off-canvas-wrapper">
        <div class="off-canvas-overlay"></div>
        <div class="off-canvas-inner-content">
            <div class="btn-close-off-canvas">
                <i class="ion-android-close"></i>
            </div>

            <div class="off-canvas-inner">
                <!-- search box start -->
                <div class="search-box-offcanvas">
                    <form>
                        <input type="text" placeholder="Más de 50.000 productos ¡encuéntralos aquí!">
                        <button class="search-btn"><i class="ion-ios-search-strong"></i></button>
                    </form>
                </div>
                <!-- search box end -->

                <!-- mobile menu start -->
                <div class="mobile-navigation">

                    <!-- mobile menu navigation start -->
                    <nav>
                        <ul class="mobile-menu">
                           
                            <li class="menu-item-has-children"><a href="#">perros</a>
                                <ul class="megamenu dropdown">
                                    <li class="mega-title has-children"><a href="#">Alimentos perros</a>
                                        <ul class="dropdown">
                                            <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '6'";
                foreach ($db->query($sql) as $row) {
                    ?>
                                            <li>
                                                <a href="#"><?php echo $row['nomcate']; ?></a>
                                            </li>
<?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>
                                            
                                        </ul>
                                    </li>
                                    <li class="mega-title has-children"><a href="#">Cuidado e higiene</a>
                                        <ul class="dropdown">
                                            <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '7'";
                foreach ($db->query($sql) as $row) {
                    ?>    

                                            <li><a href="#"><?php echo $row['nomcate']; ?></a></li>
                <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?> 
                                        </ul>
                                    </li>
                                    <li class="mega-title has-children"><a href="#">Farmacia</a>
                                        <ul class="dropdown">
                                            <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '3'";
                foreach ($db->query($sql) as $row) {
                    ?>
                                            <li><a href="#"><?php echo $row['nomcate']; ?></a></li>

                                             <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>
                                            
                                        </ul>
                                    </li>
                                    <li class="mega-title has-children"><a href="#">Accesorios</a>
                                        <ul class="dropdown">
                                            <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '2'";
                foreach ($db->query($sql) as $row) {
                    ?> 
                                            <li><a href="#"><?php echo $row['nomcate']; ?></a></li>
                     <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>                        
                                        </ul>
                                    </li>
                                </ul>
                            </li>


                            <li class="menu-item-has-children"><a href="#">gatos</a>
                                <ul class="megamenu dropdown">
                                    <li class="mega-title has-children"><a href="#">Alimentos gatos</a>
                                        <ul class="dropdown">
                                            <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '6'";
                foreach ($db->query($sql) as $row) {
                    ?>
                                            <li>
                                                <a href="#"><?php echo $row['nomcate']; ?></a>
                                            </li>
<?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>
                                            
                                        </ul>
                                    </li>
                                    <li class="mega-title has-children"><a href="#">Cuidado e higiene</a>
                                        <ul class="dropdown">
                                            <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '7'";
                foreach ($db->query($sql) as $row) {
                    ?>    

                                            <li><a href="#"><?php echo $row['nomcate']; ?></a></li>
                <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?> 
                                        </ul>
                                    </li>
                                    <li class="mega-title has-children"><a href="#">Farmacia</a>
                                        <ul class="dropdown">
                                            <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '3'";
                foreach ($db->query($sql) as $row) {
                    ?>
                                            <li><a href="#"><?php echo $row['nomcate']; ?></a></li>

                                             <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>
                                            
                                        </ul>
                                    </li>
                                    <li class="mega-title has-children"><a href="#">Accesorios</a>
                                        <ul class="dropdown">
                                            <?php
            //incluimos el fichero de conexion
            include_once('../config/dbconect.php');

            $database = new Connection();
            $db = $database->open();
            try{    
                $sql = "SELECT products.id_prod, products.codigo, category.id_cate, category.nomcate, products.foto, products.nompro, products.peso, supplier.id_prove, supplier.nomprove, supplier.ruc, supplier.direcc, supplier.tele, supplier.pais, supplier.corre,products.descp, products.preciC, products.precV, products.stock, products.estado, products.fere FROM products INNER JOIN category ON products.id_cate =category.id_cate INNER JOIN supplier ON products.id_prove = supplier.id_prove  WHERE category.id_cate =  '2'";
                foreach ($db->query($sql) as $row) {
                    ?> 
                                            <li><a href="#"><?php echo $row['nomcate']; ?></a></li>
                     <?php 
                }
            }
            catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
            }

            //Cerrar la Conexion
            $database->close();

        ?>                        
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            

                            
                           
                        </ul>
                    </nav>
                    <!-- mobile menu navigation end -->
                </div>
                <!-- mobile menu end -->

                <!-- offcanvas widget area start -->
                <div class="offcanvas-widget-area">
                    <div class="off-canvas-contact-widget">
                        <ul>
                            <li><i class="fa fa-mobile"></i>
                                <a href="#">0412-4773077</a>
                            </li>
                            <li><i class="fa fa-envelope-o"></i>
                                <a href="#">vetdogg@gmail.com</a>
                            </li>
                        </ul>
                    </div>
                    <div class="off-canvas-social-widget">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        
                    </div>
                </div>

                <!-- offcanvas widget area end -->
            </div>
        </div>
    </aside>
    <!-- off-canvas menu end -->

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
